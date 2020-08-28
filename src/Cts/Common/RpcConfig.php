<?php

namespace Cts\Common;

use Swoft\Rpc\Client\Client as ServiceClient;
use Swoft\Rpc\Client\Pool as ServicePool;

class RpcConfig {

    public static function getConfig() {
        $env = env("SWOFT_ENV", "local");
        $rpc_domain = "";
        switch ($env) {
            case "dev":
                $rpc_domain = "rpc.dev.kakao.service.agilent.com";
                break;
            case "qa":
                $rpc_domain = "rpc.tst.kakao.service.agilent.com";
                break;
            case "stg":
                $rpc_domain = "rpc.stg.kakao.service.agilent.com";
                break;
            case "prd":
                $rpc_domain = "rpc.prd.kakao.service.agilent.com";
                break;
            default:
                $rpc_domain = "localhost";
                break;
        }


        return [
            'user' => [
                'class' => ServiceClient::class,
                'host' => $rpc_domain,
                'port' => '19999',
                'setting' => [
                    'timeout' => 120.0,
                ],
                'packet' => bean('rpcClientPacket'),
                'extender' => bean(\Cts\Common\RpcExtender::class)
            ],
            'user.pool' => [
                'class' => ServicePool::class,
                'client' => bean('user'),
            ],
            'jitterbit' => [
                'class' => ServiceClient::class,
                'host' => $rpc_domain,
                'port' => '19998',
                'setting' => [
                    'timeout' => 300.0,
                ],
                'packet' => bean('rpcClientPacket'),
                'extender' => bean(\Cts\Common\RpcExtender::class)
            ],
            'jitterbit.pool' => [
                'class' => ServicePool::class,
                'client' => bean('jitterbit'),
            ],
            'kakao' => [
                'class' => ServiceClient::class,
                'host' => $rpc_domain,
                'port' => '19997',
                'setting' => [
                    'timeout' => 120.0
                ],
                'packet' => bean('rpcClientPacket'),
                'extender' => bean(\Cts\Common\RpcExtender::class)
            ],
            'kakao.pool' => [
                'class' => ServicePool::class,
                'client' => bean('kakao'),
            ],
            'admin_user' => [
                'class' => ServiceClient::class,
                'host' => $rpc_domain,
                'port' => '19996',
                'setting' => [
                    'timeout' => 120.0,
                ],
                'packet' => bean('rpcClientPacket'),
                'extender' => bean(\Cts\Common\RpcExtender::class)
            ],
            'admin_user.pool' => [
                'class' => ServicePool::class,
                'client' => bean('admin_user'),
            ],
            'sr' => [
                'class' => ServiceClient::class,
                'host' => $rpc_domain,
                'port' => '19995',
                'setting' => [
                    'timeout' => 120.0
                ],
                'packet' => bean('rpcClientPacket'),
                'extender' => bean(\Cts\Common\RpcExtender::class)
            ],
            'sr.pool' => [
                'class' => ServicePool::class,
                'client' => bean('sr'),
            ],
            'reservation' => [
                'class' => ServiceClient::class,
                'host' => $rpc_domain,
                'port' => '19994',
                'setting' => [
                    'timeout' => 120.0
                ],
                'packet' => bean('rpcClientPacket'),
                'extender' => bean(\Cts\Common\RpcExtender::class)
            ],
            'reservation.pool' => [
                'class' => ServicePool::class,
                'client' => bean('reservation'),
            ],
            'slider' => [
                'class' => ServiceClient::class,
                'host' => $rpc_domain,
                'port' => '19993',
                'setting' => [
                    'timeout' => 120.0
                ],
                'packet' => bean('rpcClientPacket'),
                'extender' => bean(\Cts\Common\RpcExtender::class)
            ],
            'slider.pool' => [
                'class' => ServicePool::class,
                'client' => bean('slider'),
            ],
            'instrument' => [
                'class' => ServiceClient::class,
                'host' => $rpc_domain,
                'port' => '19992',
                'setting' => [
                    'timeout' => 120.0
                ],
                'packet' => bean('rpcClientPacket'),
                'extender' => bean(\Cts\Common\RpcExtender::class)
            ],
            'instrument.pool' => [
                'class' => ServicePool::class,
                'client' => bean('instrument'),
            ],
            'notification' => [
                'class' => ServiceClient::class,
                'host' => $rpc_domain,
                'port' => '19991',
                'setting' => [
                    'timeout' => 120.0
                ],
                'packet' => bean('rpcClientPacket'),
                'extender' => bean(\Cts\Common\RpcExtender::class)
            ],
            'notification.pool' => [
                'class' => ServicePool::class,
                'client' => bean('notification'),
            ],
            'guide' => [
                'class' => ServiceClient::class,
                'host' => $rpc_domain,
                'port' => '19990',
                'setting' => [
                    'timeout' => 120.0
                ],
                'packet' => bean('rpcClientPacket'),
                'extender' => bean(\Cts\Common\RpcExtender::class)
            ],
            'guide.pool' => [
                'class' => ServicePool::class,
                'client' => bean('guide'),
            ],
            'lab' => [
                'class' => ServiceClient::class,
                'host' => $rpc_domain,
                'port' => '19989',
                'setting' => [
                    'timeout' => 120.0
                ],
                'packet' => bean('rpcClientPacket'),
                'extender' => bean(\Cts\Common\RpcExtender::class)
            ],
            'purchase.pool' => [
                'class' => ServicePool::class,
                'client' => bean('purchase'),
            ],
            'purchase' => [
                'class' => ServiceClient::class,
                'host' => $rpc_domain,
                'port' => '19993',
                'setting' => [
                    'timeout' => 120.0
                ],
                'packet' => bean('rpcClientPacket'),
                'extender' => bean(\Cts\Common\RpcExtender::class)
            ],
            'lab.pool' => [
                'class' => ServicePool::class,
                'client' => bean('lab'),
            ],
            'wechat' => [
                'class' => ServiceClient::class,
                'host' => $rpc_domain,
                'port' => '19988',
                'setting' => [
                    'timeout' => 120.0
                ],
                'packet' => bean('rpcClientPacket'),
                'extender' => bean(\Cts\Common\RpcExtender::class)
            ],
            'wechat.pool' => [
                'class' => ServicePool::class,
                'client' => bean('wechat'),
            ]
        ];
    }

}
