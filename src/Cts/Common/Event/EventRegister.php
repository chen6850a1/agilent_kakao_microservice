<?php declare(strict_types=1);


namespace Cts\Common\Event;

/**
 * Class AspectRegister
 *
 * @since 2.0
 */
class EventRegister
{
    /**
     * @var array
     */
    private static $distributed_event_listen = [];

    /**
     * Register aspect
     *
     * @param string $className
     * @param int    $order
     */
    public static function registerEventListen(string $server_name,string $event_type,$handle): void
    {
        self::$distributed_event_listen[$server_name][$event_type] = $handle;
    }


    /**
     * @return array
     */
    public static function getEventListenList(): array
    {
        return self::$distributed_event_listen;
    }
}