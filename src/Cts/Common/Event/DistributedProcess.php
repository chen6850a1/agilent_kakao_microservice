<?php declare(strict_types=1);

namespace Cts\Common\Event;

use Cts\Common\Aws\AwsSqs;
use Swoft\Bean\BeanFactory;
use Swoft\Event\Annotation\Mapping\Listener;
use Swoft\Log\Helper\CLog;
use Swoole\Process;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Concern\PrototypeTrait;

/**
 * Class MyProcess
 *
 * @Bean(scope=Bean::PROTOTYPE)
 *
 * @since 2.0
 */
class DistributedProcess
{
    use PrototypeTrait;

    private $queueUrl;
    private $eventHandle;

    /**
     * Create a new collection.
     *
     * @param string $sqsTopic
     * @param $handle
     *
     * @return static
     */
    public static function new(string $queueUrl,$handle): self
    {
        $self        = self::__instance();
        $self->queueUrl = $queueUrl;
        $self->eventHandle=$handle;
        return $self;
    }

    public function create(): Process
    {
        return new Process([$this, 'handle']);
    }

    public function handle(Process $process)
    {
        CLog::info('Aws sqs :started ('.$this->queueUrl.")");
        $awsSqs=BeanFactory::getBean("AwsSqs");
        // 用户进程实现了广播功能，循环接收管道消息，并发给服务器的所有连接
        while (true) {
            /** @var AwsSqs $awsSqs */
            $messages=$awsSqs->ReceiveMessage($this->queueUrl);
            if(!empty($messages)){
                foreach ($messages as $message){
                    $body=\GuzzleHttp\json_decode($message["Body"],true);
                    $data=\GuzzleHttp\json_decode($body["Message"],true);
                    call_user_func($this->eventHandle,$data);
                    $awsSqs->deleteMessage($this->queueUrl,$message);
                }
            }
        }
    }
}