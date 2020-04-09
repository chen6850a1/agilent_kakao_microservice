<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace Cts\Common\Exception\Handler;

use Swoft\Error\Annotation\Mapping\ExceptionHandler;
use Swoft\Log\Debug;
use Swoft\Log\Helper\CLog;
use Swoft\Rpc\Error;
use Swoft\Rpc\Server\Exception\Handler\RpcErrorHandler;
use Swoft\Rpc\Server\Response;
use Swoft\Validator\Exception\ValidatorException;
use Throwable;

/**
 * Class RpcValidExceptionHandler
 *
 * @since 2.0
 *
 * @ExceptionHandler(ValidatorException::class)
 */
class RpcValidExceptionHandler extends RpcErrorHandler
{
    /**
     * @param Throwable $e
     * @param Response  $response
     *
     * @return Response
     */
    public function handle(Throwable $e, Response $response): Response
    {
        $response->setData(["status"=>false,"error"=> config("service").":".$e->getMessage()]);
        // Debug is true
        return $response;
    }
}
