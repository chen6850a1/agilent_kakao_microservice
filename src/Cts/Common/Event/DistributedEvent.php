<?php declare(strict_types=1);

namespace Cts\Common\Event;

use Cts\Common\Aws\AwsSns;
use Cts\Common\Aws\AwsSqs;
use Cts\Common\ConstParam;
use Swoft\Bean\BeanFactory;
use Swoft\Co;
use Swoft\Event\Annotation\Mapping\Listener;
use Swoft\Event\EventHandlerInterface;
use Swoft\Event\EventInterface;
use Swoft\Log\Error;
use Swoft\Log\Helper\CLog;
use Swoft\Log\Helper\Log;
use Swoft\Process\Process;
use Swoft\Process\ProcessEvent;
use Swoft\Process\UserProcess;
use Swoft\Server\ServerEvent;
use Swoft\Stdlib\Helper\PhpHelper;
use Swoole\Process as SwooleProcess;

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

        //创建死信队列
        $this->createDieQueue($event);

        //监听事件
        $this->listenEvent($event);

    }

    public function createDieQueue(){
        $awsSqs=BeanFactory::getBean("AwsSqs");
        $awsSqs->createDieQueue();
    }

    public function regEvent(){
        CLog::info("start regEvent");
        $self_service_name=config("service","no_def");
        $awsSns=BeanFactory::getRequestBean("AwsSns",(string)Co::tid());
        $awsSns->create($self_service_name);
    }

    public function listenEvent(EventInterface $event){
        CLog::info("start listenEvent");
        $distributed_event_listen=EventRegister::getEventListenList();
        $self_service_name=config("service","no_def");
        /** @var AwsSqs $awsSqs */
        $awsSqs=BeanFactory::getBean("AwsSqs");
        $awsSns=BeanFactory::getRequestBean("AwsSns",(string)Co::tid());

        $server = $event->getTarget();
        $swooleServer =  $server->getSwooleServer();
        $listenAllService=[];
        $listen_handler=[];
        //创建队列
        foreach ($distributed_event_listen as $service_name=>$service){
            $awsSns->create($service_name);
            $allEvent=[];
            foreach ($service as $event_type=>$handle){
                $listen_handler[$event_type]=$handle;
                //送修的自循环暂时不i需改
                if(strpos($event_type,"self_sqs_")!==0){
                    $listenAllService[$service_name][]=$event_type;
                }else{
                    $queueUrl=$awsSqs->create($self_service_name,$service_name,$event_type);
                    if(!empty($queueUrl)){
                        $process =DistributedProcess::new($queueUrl,$listen_handler,$server);
                        $callBack=[$process,"run"];
                        $this->addProcess($callBack,$server,"AwsEventProcess");
                    }
                }
            }
        }
        $queueUrl=$awsSqs->createNewBetch($self_service_name,$listenAllService);
        if(!empty($queueUrl)){
            $process =DistributedProcess::new($queueUrl,$listen_handler,$server);
            $callBack=[$process,"run"];
            $this->addProcess($callBack,$server,"AwsEventProcess");
        }
        //创建进程监听队列消息
    }

    public function addProcess($callback, $server, $name){
        $function = function (SwooleProcess $swProcess) use ($callback, $server, $name) {
            $process = Process::new($swProcess);

            // Before
            \Swoft::trigger(ProcessEvent::BEFORE_USER_PROCESS, null, $server, $process, $name);

            try {// Run
                PhpHelper::call($callback, $process);
            } catch (\Throwable $e) {
                CLog::error('User process fail(%s %s %d)!', $e->getFile(), $e->getMessage(), $e->getLine());
            }

            // After
            \Swoft::trigger(ProcessEvent::AFTER_USER_PROCESS);
        };

        $process = new SwooleProcess($function, false, 1, true);
        $server->getSwooleServer()->addProcess($process);
    }
}