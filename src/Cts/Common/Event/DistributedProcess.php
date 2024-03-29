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
    public static function new(string $queueUrl, $handle, $server): self
    {
        $self = self::__instance();
        $self->queueUrl = $queueUrl;
        $self->eventHandle = $handle;
        $self->server = $server;
        return $self;
    }

    public function setContext($data){
        $traceid = ArrayHelper::get($data, "traceid", "");
        $user = ArrayHelper::get($data, "user", []);
        context()->set("traceid", $traceid);
        context()->set("user", $user);
    }

    public function run(\Swoft\Process\Process $process): void
    {
        CLog::info('Aws sqs :started (' . $this->queueUrl . ")");
        $awsSqs = BeanFactory::getBean("AwsSqs");
        $time = 0;
        // 用户进程实现了广播功能，循环接收管道消息，并发给服务器的所有连接
        while (true) {
            /** @var AwsSqs $awsSqs */
            $messages = $awsSqs->ReceiveMessage($this->queueUrl);
            if (!empty($messages)) {
                Log::info(serialize($messages));
                foreach ($messages as $message) {
                    $body = json_decode($message["Body"], true);
                    $data = json_decode($body["Message"], true);
                    $event_type=ArrayHelper::get($body,"MessageAttributes.event_type.Value",ArrayHelper::get($message,"MessageAttributes.event_type.StringValue"));
                    if(!ArrayHelper::has($this->eventHandle,$event_type)){
                        $awsSqs->deleteMessage($this->queueUrl,$message);
                    }else{
                        $handle = $this->eventHandle[$event_type];
                        $this->setContext($data);
                        $result = call_user_func($handle, $data,$message);
                        if(is_array($result)&& ArrayHelper::get($result,"needHandle")===true){
                            Log::info("Sns change message visibility");
                            $awsSqs->changeMessageVisibility($this->queueUrl,ArrayHelper::get($message,"ReceiptHandle"),ArrayHelper::get($result,"delay_time",60));
                        }else{
                            Log::info("Sns Delete complute");
                            $awsSqs->deleteMessage($this->queueUrl,$message);
							
							//判断是否有回调函数,有的话执行回调告知结果  example ["service_sr","setImportSrSurveyStatus"]
                            $callbackFun=ArrayHelper::get($data,"callbackFun");
                            $rpc=BeanFactory::getBean("RpcServerList");
                            $class=$callbackFun[0];
                            call_user_func([$rpc->$class,$callbackFun[1]],$result);
                        }
                    }
                }
                Log::info("Sns complute");
                if (memory_get_usage() > 120 * 1024 * 1024) {
                    Log::info("Memory big,restart process.");
                    break;
                }
            }
        }
    }
}
