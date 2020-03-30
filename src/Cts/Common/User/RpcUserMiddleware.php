<?php declare(strict_types=1);


namespace Cts\Common\User;


use Swlib\Http\Exception\ClientException;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Log\Helper\CLog;
use Swoft\Log\Helper\Log;
use Swoft\Rpc\Server\Contract\MiddlewareInterface;
use Swoft\Rpc\Server\Contract\RequestHandlerInterface;
use Swoft\Rpc\Server\Contract\RequestInterface;
use Swoft\Rpc\Server\Contract\ResponseInterface;
use Swoft\Stdlib\Helper\ArrayHelper;

/**
 * Class RpcTraceMiddleware
 *
 * @since 2.0
 *
 * @Bean()
 */
class RpcUserMiddleware implements MiddlewareInterface
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
        $response=$this->endRpc($response);

        return $response;
    }

    public function startRpc(RequestInterface $request)
    {
        $user= $request->getExtKey('user',["type"=>"","uid"=>0]);
        context()->set('user', $user);
    }

    public function endRpc(ResponseInterface $response){
        $data=$response->getData();
        CLog::info(serialize($data));

        if(!ArrayHelper::has($data,"status")){
            CLog::info(serialize($data));
            $response->setData(["status"=>true,"data"=>$data]);
        }
        return $response;
    }
}
