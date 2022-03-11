<?php

declare(strict_types=1);

namespace Cts\Common\Exception\Handler;

use Cts\Common\Exception\SfdcLoginException;
use Swoft\Error\Annotation\Mapping\ExceptionHandler;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\Exception\Handler\AbstractHttpErrorHandler;
use Throwable;

/**
 * Class SfdcLoginExceptionHandler
 *
 * @ExceptionHandler(LoginException::class)
 */
class SfdcLoginExceptionHandler extends AbstractHttpErrorHandler {

    /**
     * @param Throwable $e
     * @param Response  $response
     *
     * @return Response
     */
    public function handle(Throwable $e, Response $response): Response {
        return $response->redirect('/wecom/h5/sfdc-login');
    }

}
