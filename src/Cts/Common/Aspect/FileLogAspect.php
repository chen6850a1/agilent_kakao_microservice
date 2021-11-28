<?php


namespace Cts\Common\Aspect;

//使用 @Aspect 标注让其成为一个切面，切点为使用 @Log 注解标注的方法
use App\Annotation\Parser\LogRegister;
use Swoft\Aop\Annotation\Mapping\Around;
use Swoft\Aop\Annotation\Mapping\Aspect;
use Swoft\Aop\Annotation\Mapping\Before;
use Swoft\Aop\Annotation\Mapping\PointExecution;
use Swoft\Aop\Point\ProceedingJoinPoint;
use Swoft\Aop\Proxy;
use Swoft\Bean\BeanFactory;
use Swoft\Context\Context;
use Swoft\Db\DB;
use Swoft\Log\Handler\FileHandler;
use Swoft\Log\Helper\CLog;
use Swoft\Log\Logger;
use Swoft\Stdlib\Helper\ArrayHelper;
/**
 * @Aspect(order=1)
 * @PointExecution(
 *     include={"FileHandler::handleBatch"},
 *     exclude={}
 * )
 */
class NoticeLoggerAspect
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
