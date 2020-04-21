<?php

declare(strict_types=1);

namespace Cts\Common\Aspect;

use Swoft\Aop\Annotation\Mapping\Aspect;
use Swoft\Aop\Annotation\Mapping\PointBean;
use Swoft\Aop\Annotation\Mapping\PointExecution;
use Swoft\Aop\Annotation\Mapping\AfterReturning;
use Swoft\Aop\Annotation\Mapping\AfterThrowing;
use Swoft\Aop\Point\JoinPoint;
use Swoft\Log\Helper\CLog;
use Swoft\Log\Helper\Log;
use Swoft\Rpc\Packet;
use Swoft\Rpc\Protocol;
use Swoft\Rpc\Response;
use Swoft\Stdlib\Helper\ArrayHelper;
use Swoft\Validator\Exception\ValidatorException;
use Throwable;

/**
 * @Aspect(order=1)
 *
 * @PointExecution(
 *     include={"Swoft\\Rpc\\Packet\\JsonPacket::encode"},
 *     exclude={}
 * )
 *
 */
class RpcRequestAspect {

    /**
     * 返回通知
     *
     * @AfterReturning()
     *
     * @param JoinPoint $joinPoint
     *
     * @return mix
     */
    public function afterReturnAdvice(JoinPoint $joinPoint) {

        $args = $joinPoint->getArgs();
        /** @var Protocol $protocol */
        $protocol=$args[0];

        Log::info(sprintf("RPC请求【%s】",$protocol->getInterface().":".$protocol->getMethod().":".$protocol->getVersion()));

        return $joinPoint->getReturn();
    }

    /**
     * 异常通知
     *
     * @AfterThrowing()
     *
     * @param Throwable $throwable
     */
    public function afterThrowingAdvice(Throwable $throwable) {
        return [
            'status' => false,
            'error' => $throwable->getMessage()
        ];
    }

}
