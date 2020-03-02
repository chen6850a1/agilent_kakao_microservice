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
                'host'    => 'service-user.kakao-eservice-local',
                'port'    => '19999',
                'setting' => [
                    'timeout'         => 0.5,
                    'connect_timeout' => 1.0,
                    'write_timeout'   => 10.0,
                    'read_timeout'    => 0.5,
                ],
                'packet'  => bean('rpcClientPacket'),
                'extender' =>bean(\Cts\Common\RpcExtender::class)
            ],
            'user.pool'         => [
                'class'  => ServicePool::class,
                'client' => bean('user'),
            ],
            'kakao'              => [
                'class'   => ServiceClient::class,
                'host'    => 'service-kakao.kakao-eservice-local',
                'port'    => '19999',
                'setting' => [
                    'timeout'         => 0.5,
                    'connect_timeout' => 1.0,
                    'write_timeout'   => 10.0,
                    'read_timeout'    => 0.5,
                ],
                'packet'  => bean('rpcClientPacket'),
                'extender' =>bean(\Cts\Common\RpcExtender::class)
            ],
            'kakao.pool'         => [
                'class'  => ServicePool::class,
                'client' => bean('kakao'),
            ],
            'admin_user' => [
                'class' => ServiceClient::class,
                'host' => 'service-kakao.kakao-eservice-local',
                'port' => '19999',
                'setting' => [
                    'timeout' => 0.5,
                    'connect_timeout' => 1.0,
                    'write_timeout' => 10.0,
                    'read_timeout' => 0.5,
                ],
                'packet' => bean('rpcClientPacket')
            ],
            'admin_user.pool' => [
                'class' => ServicePool::class,
                'client' => bean('admin_user'),
            ],
            'sr' => [
                'class' => ServiceClient::class,
                'host' => 'service-kakao.kakao-eservice-local',
                'port' => '19999',
                'setting' => [
                    'timeout' => 0.5,
                    'connect_timeout' => 1.0,
                    'write_timeout' => 10.0,
                    'read_timeout' => 0.5,
                ],
                'packet' => bean('rpcClientPacket')
            ],
            'sr.pool' => [
                'class' => ServicePool::class,
                'client' => bean('sr'),
            ],
            'reservation' => [
                'class' => ServiceClient::class,
//                'host' => env('SWOFT_DOMAIN', '127.0.0.1'),
//                'port' => env('SWOFT_PORT', 19999),
                'host' => 'service-kakao.kakao-eservice-local',
                'port' => '19999',
                'setting' => [
                    'timeout' => 0.5,
                    'connect_timeout' => 1.0,
                    'write_timeout' => 10.0,
                    'read_timeout' => 0.5,
                ],
                'packet' => bean('rpcClientPacket')
            ],
            'reservation.pool' => [
                'class' => ServicePool::class,
                'client' => bean('reservation'),
            ]
        ];
    }
}