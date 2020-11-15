<?php declare(strict_types=1);

namespace Cts\Common\Event;

use Cts\Common\Aws\AwsSqs;
use Swoft\Bean\BeanFactory;
use Swoft\Event\Annotation\Mapping\Listener;
use Swoft\Log\Helper\CLog;
use Swoft\Log\Helper\Log;
use Swoft\Process\ProcessEvent;
use Swoft\Process\Contract\ProcessInterface;
use Swoft\Process\UserProcess;
use Swoft\Stdlib\Helper\ArrayHelper;
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
class DistributedProcess extends UserProcess
{
    use PrototypeTrait;

    private $queueUrl;
    private $eventHandle;
    private $server;

    /**
     * Create a new collection.
     *
     * @param string $sqsTopic
     * @param $handle
     *
     * @return static
     */
    public static function new(string $queueUrl,$handle,$server): self
    {
        $self        = self::__instance();
        $self->queueUrl = $queueUrl;
        $self->eventHandle=$handle;
        $self->server=$server;
        return $self;
    }

    public function run(\Swoft\Process\Process $process): void
    {
        CLog::info('Aws sqs :started ('.$this->queueUrl.")");
        $awsSqs=BeanFactory::getBean("AwsSqs");
        // 用户进程实现了广播功能，循环接收管道消息，并发给服务器的所有连接
        while (true) {
            /** @var AwsSqs $awsSqs */
            $messages=$awsSqs->ReceiveMessage($this->queueUrl);
            if(!empty($messages)){
                Log::info(serialize($messages));
                $eventHandle=$this->eventHandle;
                $queueUrl=$this->queueUrl;
                sgo(function() use ($messages,$awsSqs,$eventHandle,$queueUrl){
                    foreach ($messages as $message){
                        $body=json_decode($message["Body"],true);
                        $data=json_decode($body["Message"],true);
                        $handle=$eventHandle;
                        $traceid=ArrayHelper::get($data,"traceid","");
                        context()->set("traceid",$traceid);
                        call_user_func($handle,$data);
                        $awsSqs->deleteMessage($queueUrl,$message);
                    }
                });
                Log::info("Sns complute");
            }
        }
    }
}