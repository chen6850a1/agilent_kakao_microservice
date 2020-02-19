<?php
/**
 * Created by PhpStorm.
 * User: hongch02
 * Date: 2020/1/23
 * Time: 20:59
 */

namespace Cts\Common;

use Swoft\Rpc\Client\Client as ServiceClient;
use Swoft\Rpc\Client\Pool as ServicePool;

class RpcConfig
{
    public static function getConfig(){
        return [
            'user'              => [
                'class'   => ServiceClient::class,
                'host'    => '172.17.0.1',
                'port'    => '19999',
                'setting' => [
                    'timeout'         => 0.5,
                    'connect_timeout' => 1.0,
                    'write_timeout'   => 10.0,
                    'read_timeout'    => 0.5,
                ],
                'packet'  => bean('rpcClientPacket')
            ],
            'user.pool'         => [
                'class'  => ServicePool::class,
                'client' => bean('user'),
            ],
            'kakao'              => [
                'class'   => ServiceClient::class,
                'host'    => '172.17.0.1',
                'port'    => '19998',
                'setting' => [
                    'timeout'         => 0.5,
                    'connect_timeout' => 1.0,
                    'write_timeout'   => 10.0,
                    'read_timeout'    => 0.5,
                ],
                'packet'  => bean('rpcClientPacket')
            ],
            'kakao.pool'         => [
                'class'  => ServicePool::class,
                'client' => bean('kakao'),
            ]
        ];
    }
}