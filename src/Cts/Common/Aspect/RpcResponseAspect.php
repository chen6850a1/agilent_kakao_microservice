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
use Swoft\Rpc\Packet;
use Swoft\Rpc\Response;
use Swoft\Stdlib\Helper\ArrayHelper;
use Swoft\Validator\Exception\ValidatorException;
use Throwable;

/**
 * @Aspect(order=1)
 *
 * @PointExecution(
 *     include={"Swoft\\Rpc\\Packet\\JsonPacket::decodeResponse"},
 *     exclude={}
 * )
 *
 *
 */
class RpcResponseAspect {

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
        /** @var Response $response */
        $response = $joinPoint->getReturn();
        $data=$response->getResult();
        if(ArrayHelper::getValue($data,"status",true)===false&& !ArrayHelper::getValue($data,"no_error",false)){
            throw new ValidatorException(ArrayHelper::getValue($data,"error","error info"));
        }
        return $response;
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
