<?php


namespace Cts\Common;


use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Log\Helper\CLog;
use Swoft\Rpc\Client\Contract\ExtenderInterface;

/**
 * Class Extender
 *
 * @since 2.0
 *
 * @Bean()
 */
class RpcExtender implements ExtenderInterface
{
    public function getExt(): array
    {
        if (!$traceid = context()->get('traceid', '')) {
            $traceid = uniqid(config('app_name', ''));
            context()->set('traceid', $traceid);
        }

        if (!$spanid = context()->get('spanid', '')) {
            $spanid = config('app_name', '');
            context()->set('spanid', $spanid);
        }

        $parentid = context()->get('parentid', '');

        $user = context()->get('user');

        return [
            'traceid' => $traceid,
            'spanid' => $spanid,
            'parentid' => $parentid,
            'user'=>$user
        ];
    }
}
