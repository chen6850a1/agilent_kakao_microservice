<?php declare(strict_types=1);

namespace Cts\Common\Log;

use Cts\Common\Aws\AwsSns;
use Cts\Common\Aws\AwsSqs;
use Cts\Common\ConstParam;
use Swoft\Bean\BeanFactory;
use Swoft\Db\DbEvent;
use Swoft\Event\Annotation\Mapping\Listener;
use Swoft\Event\EventHandlerInterface;
use Swoft\Event\EventInterface;
use Swoft\Log\Error;
use Swoft\Log\Helper\CLog;
use Swoft\Log\Helper\Log;
use Swoft\Process\Process;
use Swoft\Process\ProcessEvent;
use Swoft\Process\UserProcess;
use Swoft\Redis\RedisEvent;
use Swoft\Server\ServerEvent;
use Swoft\Stdlib\Helper\PhpHelper;
use Swoft\SwoftEvent;
use Swoole\Process as SwooleProcess;

/**
 * Class AttachMyProcessHandler
 *
 * @Listener(RedisEvent::AFTER_COMMAND)
 */
class RedisExecutEvent implements EventHandlerInterface
{
    /**
     * @param EventInterface $event
     */
    public function handle(EventInterface $event): void
    {
        Log::info("redis run method:".$event->getParam(0).";params=".serialize($event->getParam(1)).";result=".serialize($event->getParam(2)));
    }

}