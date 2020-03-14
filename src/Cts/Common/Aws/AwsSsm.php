<?php
/**
 * Created by PhpStorm.
 * User: hongch02
 * Date: 2020/1/28
 * Time: 22:08
 */

namespace Cts\Common\Aws;

use Aws\Exception\AwsException;
use Aws\Ssm\SsmClient;
use Cts\Common\ConstParam;
use Swoft\Bean\Annotation\Mapping\Bean;
use Aws\Sns\SnsClient;
use Swoft\Log\Helper\CLog;
use Swoole\Exception;

/**
 * Aws sns helper
 *
 * @since 2.0
 *
 * @Bean("AwsSsm")
 */
class AwsSsm
{
    private $client;


    public function __construct()
    {
        $this->client=new SsmClient([
            'version'=> '2014-11-06',
            'region' => 'ap-northeast-1'
        ]);

    }

    public function getParmas($name,$isDecryption=false){
        $result = $this->client->getParameters([
            'Names' => [$name], // REQUIRED
            'WithDecryption' => $isDecryption,
        ]);
        return $result->get("Parameters");
    }


}