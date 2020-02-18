<?php declare(strict_types=1);

namespace Cts\Common\Event;

use Cts\Common\Aws\AwsSns;
use Cts\Common\Aws\AwsSqs;
use Swoft\Event\Annotation\Mapping\Listener;
use Swoft\Event\EventHandlerInterface;
use Swoft\Event\EventInterface;
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
        echo "start reg event";
        //注册事件
        $this->regEvent();

        //监听事件
        $this->listenEvent();

//        $swooleServer = $event->target->getSwooleServer();
//
//        $process = bean(MyProcess::class);
//
//        $swooleServer->addProcess($process->create());
    }

    public function regEvent(){
        $distributed_event=config("distributed_event",[]);
        $self_service_name=config("service","no_def");
        $awsSns=new AwsSns();
        foreach($distributed_event as $service){
            $awsSns->create($self_service_name."_".$service);
        }
    }

    public function listenEvent(){
        $distributed_event_listen=config("distributed_event_listen",[]);
        $self_service_name=config("service","no_def");
        $awsSqs=new AwsSqs();

        foreach ($distributed_event_listen as $service_name=>$service){
            foreach ($service as $event_type=>$handle){
                $topicName="agilent_aws_dev_service_".$self_service_name."_";
                $awsSqs->create($self_service_name."_".$service_name."_".$event_type,$topicName.$service_name,$event_type);
            }
        }
    }
}