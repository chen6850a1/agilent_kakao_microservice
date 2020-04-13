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
                    'timeout'         => 10.0,
                    'connect_timeout' => 10.0,
                    'write_timeout'   => 10.0,
                    'read_timeout'    => 10.0,
                ],
                'packet'  => bean('rpcClientPacket'),
                'extender' =>bean(\Cts\Common\RpcExtender::class)
            ],
            'user.pool'         => [
                'class'  => ServicePool::class,
                'client' => bean('user'),
            ],
            'jitterbit'              => [
                'class'   => ServiceClient::class,
                'host'    => 'service-jitterbit.kakao-eservice-local',
                'port'    => '19998',
                'setting' => [
                    'timeout'         => 120.0,
                    'connect_timeout' => 120.0,
                    'write_timeout'   => 120.0,
                    'read_timeout'    => 120.0,
                ],
                'packet'  => bean('rpcClientPacket'),
                'extender' =>bean(\Cts\Common\RpcExtender::class)
            ],
            'jitterbit.pool'         => [
                'class'  => ServicePool::class,
                'client' => bean('jitterbit'),
            ],
            'kakao'              => [
                'class'   => ServiceClient::class,
                'host'    => 'service-kakao.kakao-eservice-local',
                'port'    => '19997',
                'setting' => [
                    'timeout'         => 10.0,
                    'connect_timeout' => 10.0,
                    'write_timeout'   => 10.0,
                    'read_timeout'    => 10.0,
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
                'host' => 'service-admin-user.kakao-eservice-local',
                'port' => '19996',
                'setting' => [
                    'timeout' => 10.0,
                    'connect_timeout' => 10.0,
                    'write_timeout' => 10.0,
                    'read_timeout' => 10.0,
                ],
                'packet' => bean('rpcClientPacket'),
                'extender' =>bean(\Cts\Common\RpcExtender::class)
            ],
            'admin_user.pool' => [
                'class' => ServicePool::class,
                'client' => bean('admin_user'),
            ],
            'sr' => [
                'class' => ServiceClient::class,
                'host' => 'service-sr.kakao-eservice-local',
                'port' => '19995',
                'setting' => [
                    'timeout' => 10.0,
                    'connect_timeout' => 10.0,
                    'write_timeout' => 10.0,
                    'read_timeout' => 10.0,
                ],
                'packet' => bean('rpcClientPacket'),
                'extender' =>bean(\Cts\Common\RpcExtender::class)
            ],
            'sr.pool' => [
                'class' => ServicePool::class,
                'client' => bean('sr'),
            ],
            'reservation' => [
                'class' => ServiceClient::class,
                'host' => 'service-reservation.kakao-eservice-local',
                'port' => '19994',
                'setting' => [
                    'timeout' => 10.0,
                    'connect_timeout' => 10.0,
                    'write_timeout' => 10.0,
                    'read_timeout' => 10.0,
                ],
                'packet' => bean('rpcClientPacket'),
                'extender' =>bean(\Cts\Common\RpcExtender::class)
            ],
            'reservation.pool' => [
                'class' => ServicePool::class,
                'client' => bean('reservation'),
            ],
            'slider' => [
                'class' => ServiceClient::class,
                'host' => 'service-slider.kakao-eservice-local',
                'port' => '19993',
                'setting' => [
                    'timeout' => 10.0,
                    'connect_timeout' => 10.0,
                    'write_timeout' => 10.0,
                    'read_timeout' => 10.0,
                ],
                'packet' => bean('rpcClientPacket'),
                'extender' =>bean(\Cts\Common\RpcExtender::class)
            ],
            'slider.pool' => [
                'class' => ServicePool::class,
                'client' => bean('slider'),
            ],
            'instrument'              => [
                'class'   => ServiceClient::class,
                'host'    => 'service-instrument.kakao-eservice-local',
                'port'    => '19992',
                'setting' => [
                    'timeout'         => 10.0,
                    'connect_timeout' => 10.0,
                    'write_timeout'   => 10.0,
                    'read_timeout'    => 10.0,
                ],
                'packet'  => bean('rpcClientPacket'),
                'extender' =>bean(\Cts\Common\RpcExtender::class)
            ],
            'instrument.pool'         => [
                'class'  => ServicePool::class,
                'client' => bean('instrument'),
            ],
            'notification'              => [
                'class'   => ServiceClient::class,
                'host'    => 'service-instrument.kakao-eservice-local',
                'port'    => '19991',
                'setting' => [
                    'timeout'         => 10.0,
                    'connect_timeout' => 10.0,
                    'write_timeout'   => 10.0,
                    'read_timeout'    => 10.0,
                ],
                'packet'  => bean('rpcClientPacket'),
                'extender' =>bean(\Cts\Common\RpcExtender::class)
            ],
            'notification.pool'         => [
                'class'  => ServicePool::class,
                'client' => bean('notification'),
            ],
        ];
    }
}