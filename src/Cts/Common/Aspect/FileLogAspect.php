<?php


namespace Cts\Common\Aspect;

//使用 @Aspect 标注让其成为一个切面，切点为使用 @Log 注解标注的方法
use App\Annotation\Parser\LogRegister;
use Swoft\Aop\Annotation\Mapping\Around;
use Swoft\Aop\Annotation\Mapping\Aspect;
use Swoft\Aop\Annotation\Mapping\PointExecution;
use Swoft\Aop\Point\ProceedingJoinPoint;

/**
 * @Aspect(order=1)
 * @PointExecution(
 *     include={"FileHandler::handleBatch"},
 *     exclude={}
 * )
 */
class FileLogAspect
{
    /**
     * @Around()
     *
     * @param ProceedingJoinPoint $joinPoint
     *
     * @return mixed
     * @throws ApiException
     */
    public function around(ProceedingJoinPoint $joinPoint)
    {
        return false;
    }
}
