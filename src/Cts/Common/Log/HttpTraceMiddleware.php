<?php declare(strict_types=1);


namespace Cts\Common\Log;


use Psr\Http\Message\ServerRequestInterface;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Log\Helper\CLog;
use Swoft\Log\Helper\Log;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Swoft\Http\Server\Contract\MiddlewareInterface;

/**
 * Class HttpTraceMiddleware
 *
 * @since 2.0
 *
 * @Bean()
 */
class HttpTraceMiddleware implements MiddlewareInterface
{
    /**
     * @param ServerRequestInterface        $request
     * @param RequestHandlerInterface $requestHandler
     *
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $requestHandler): ResponseInterface
    {
        $this->startRequest($request);
        $response = $requestHandler->handle($request);
        $this->endRequest();

        return $response;
    }

    public function startRequest(ServerRequestInterface $request) {
        context()->set('startTime', microtime(true));
        context()->set('interface', $request->getUri()->getPath());
        context()->set('method', $request->getMethod());
        $traceid = uniqid(config('app_name', ''));
        context()->set('traceid', $traceid);

        $data=$request->input();
        $params = [
            'query' => $data
        ];
        context()->set('params', $params);

        context()->set('appInfo', [
            'env'     => config('env'),
            'name'    => config('service'),
            'version' => config('version'),
        ]);

        Log::info('Http接口请求开始');
    }

    public function endRequest() {
        //计算整个请求耗时
        $cost         = sprintf('%.2f', (microtime(true)-context()->get('startTime')) * 1000);
        context()->set('cost', $cost . 'ms');

        //记录请求参数
        $params = [
            'query' => context()->getRequest()->input(),
            'header' => context()->getRequest()->getHeaders(),
            'sql'  => context()->get('sql', '无')
        ];
        context()->set('params', $params);

        Log::info('Http接口请求结束');
    }
}
