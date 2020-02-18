<?php declare(strict_types=1);

namespace Cts\Common\Event;

use Swoft\Event\Annotation\Mapping\Listener;
use Swoole\Process;
use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * Class MyProcess
 *
 * @Bean()
 */
class DistributedProcess
{
    public function create(): Process
    {
        return new Process([$this, 'handle']);
    }

    public function handle(Process $process)
    {
        CLog::info('MyProcess started.');

        // 用户进程实现了广播功能，循环接收管道消息，并发给服务器的所有连接
        while (true) {
            $msg = $process->read();
            foreach($server->connections as $conn) {
                $server->send($conn, $msg);
            }
        }
    }
}