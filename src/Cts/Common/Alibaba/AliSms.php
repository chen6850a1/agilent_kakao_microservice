<?php

namespace Cts\Common\Alibaba;

use AlibabaCloud\SDK\Dysmsapi\V20170525\Dysmsapi;
use Darabonba\OpenApi\Models\Config;
use AlibabaCloud\SDK\Dysmsapi\V20170525\Models\SendSmsRequest;
use AlibabaCloud\Tea\Utils\Utils\RuntimeOptions;
use AlibabaCloud\Tea\Tea;
use AlibabaCloud\Tea\Utils\Utils;
use AlibabaCloud\Tea\Console\Console;
use \Exception;
use AlibabaCloud\Tea\Exception\TeaError;
use Swoft\Log\Helper\CLog;
use Swoft\Log\Helper\Log;
use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * ali sms
 *
 * @since 2.0
 *
 * @Bean(name="AliSms",scope=Bean::REQUEST)
 */
class AliSms {
    private $client;

    public function __construct() {
        $config = new Config([
            // 必填，您的 AccessKey ID
            "accessKeyId" => config("aws_params.ali.sms.accessKeyId"),
            // 必填，您的 AccessKey Secret
            "accessKeySecret" => config("aws_params.ali.sms.accessKeySecret"),
        ]);
        // 访问的域名
        $config->endpoint = "dysmsapi.aliyuncs.com";
        $this->client = new Dysmsapi($config);
    }

    /**
     *
     * @param $tel string 手机号
     * @param $templateCode string 短信模版
     * @param $templateParam string 短信参数
     * @return bool
     */
    public function pushSmsMessage($tel, $templateCode = '', $templateParam = []) {
        Log::info("ali start push message:");
        Log::info($tel);
        Log::info($templateCode);
        Log::info('templateParam:',serialize($templateParam));
        $sendSmsRequest = new SendSmsRequest(
            [
                "phoneNumbers" => $tel, //手机号(区号可加可不加)
                "signName" => "安捷伦",
                "templateCode" => $templateCode,
                "templateParam" => empty($templateParam) ? "{}" : json_encode($templateParam, JSON_UNESCAPED_UNICODE)
            ]
        );
        $runtime = new RuntimeOptions([]);
        try {
            $resp = $this->client->sendSmsWithOptions($sendSmsRequest, $runtime);
            Log::info("ali sms send success:" . serialize($resp->body));
            return true;
        } catch (Exception $error) {
            Log::info('ali sms send fail:',serialize($error->getMessage()));
            return false;
        }
    }
}
