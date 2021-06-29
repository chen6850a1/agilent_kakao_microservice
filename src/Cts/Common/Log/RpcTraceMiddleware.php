<?php declare(strict_types=1);


namespace Cts\Common\Log;


use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Log\Helper\Log;
use Swoft\Rpc\Server\Contract\MiddlewareInterface;
use Swoft\Rpc\Server\Contract\RequestHandlerInterface;
use Swoft\Rpc\Server\Contract\RequestInterface;
use Swoft\Rpc\Server\Contract\ResponseInterface;

/**
 * Class RpcTraceMiddleware
 *
 * @since 2.0
 *
 * @Bean()
 */
class RpcTraceMiddleware implements MiddlewareInterface
{
    /**
     * @param RequestInterface        $request
     * @param RequestHandlerInterface $requestHandler
     *
     * @return ResponseInterface
     */
    public function process(RequestInterface $request, RequestHandlerInterface $requestHandler): ResponseInterface
    {
        $this->startRpc($request);
        $response = $requestHandler->handle($request);
        $this->endRpc($response);

        return $response;
    }

    public function startRpc(RequestInterface $request)
    {

        context()->set('startTime', microtime(true));
        context()->set('version', $request->getVersion());
        context()->set('interface', $request->getInterface());
        context()->set('method', $request->getMethod());
        $params = [
            'query' => $request->getParams(),
        ];
        context()->set('params', $params);
        $user= $request->getExtKey('user',["type"=>"","uid"=>0]);
        context()->set('appInfo', [
            'env' => config('env'),
            'name' => config('name'),
            'version' => config('version'),
            "user"=>$user
        ]);
        Log::info(sprintf("【%s】服务，RPC 请求开始", config('service', 'swoft')));
    }

    public function endRpc(ResponseInterface $response)
    {
        //计算耗时时间
        $cost = sprintf('%.2f', (microtime(true) - context()->get('startTime')) * 1000);
        context()->set('cost', $cost . 'ms');

        $serializeData=serialize($response->getData());
        if(strlen($serializeData)>4500){
            $serializeData=substr($serializeData, 0, 4500);
        }

        Log::info(sprintf("【%s】服务服务器，输出结果【%s】", config('service', 'swoft'),$serializeData));
        Log::info(sprintf("【%s】服务服务器，RPC 请求结束", config('service', 'swoft')));
    }
}
