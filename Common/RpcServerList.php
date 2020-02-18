<?php
/**
 * Created by PhpStorm.
 * User: hongch02
 * Date: 2020/1/23
 * Time: 13:19
 */

namespace Cts\Common;

use Cts\Common\Lib\UserInterface;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Rpc\Client\Annotation\Mapping\Reference;

/**
 * Class RpcProvider
 *
 * @since 2.0
 *
 * @Bean("RpcServerList")
 */
class RpcServerList
{
    /**
     * @Reference(pool="user.pool")
     *
     * @var UserInterface
     */
    public $service_user;


}