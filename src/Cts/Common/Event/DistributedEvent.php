<?php declare(strict_types=1);

namespace Cts\Common\Event;

use Cts\Common\Aws\AwsSns;
use Cts\Common\Aws\AwsSqs;
use Cts\Common\ConstParam;
use Swoft\Bean\BeanFactory;
use Swoft\Event\Annotation\Mapping\Listener;
use Swoft\Event\EventHandlerInterface;
use Swoft\Event\EventInterface;
use Swoft\Log\Helper\CLog;
use Swoft\Server\ServerEvent;

/**
 * Class AttachMyProcessHandler
 *
 * @Listener(ServerEvent::BEFORE_START)
 */
class DistributedEvent implements EventHandlerInterface
{
    /**
     * @param EventInterface $event
     */
    public function handle(EventInterface $event): void
    {
        //不在AWS 环境里  关闭注册事件
        if(empty(config("aws.name"))){
            return;
        }
        //注册事件
        $this->regEvent();

        //监听事件
        $this->listenEvent($event);

    }

    public function regEvent(){
        CLog::info("start regEvent");
        $self_service_name=config("service","no_def");
        $awsSns=BeanFactory::getBean("AwsSns");
        $awsSns->create($self_service_name);
    }

    public function listenEvent(EventInterface $event){
        CLog::info("start listenEvent");
        $distributed_event_listen=EventRegister::getEventListenList();
        $self_service_name=config("service","no_def");
        $awsSqs=BeanFactory::getBean("AwsSqs");

        $swooleServer =  $event->getTarget()->getSwooleServer();
        //创建队列
        foreach ($distributed_event_listen as $service_name=>$service){
            foreach ($service as $event_type=>$handle){
                CLog::info("self_service_name=$self_service_name;service_name=$service_name;event_type=$event_type");
                $queueUrl=$awsSqs->create($self_service_name,$service_name,$event_type);
                if(!empty($queueUrl)){
                    $process =DistributedProcess::new($queueUrl,$handle);
                    $swooleServer->addProcess($process->create());
                }
            }
        }
        //创建进程监听队列消息
    }
}