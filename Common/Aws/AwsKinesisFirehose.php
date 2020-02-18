<?php
/**
 * Created by PhpStorm.
 * User: hongch02
 * Date: 2020/2/2
 * Time: 13:06
 */

namespace Cts\Common\Aws;
use Aws\Firehose\FirehoseClient;
use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * Aws sns helper
 *
 * @since 2.0
 *
 * @Bean("AwsKinesis")
 */
class AwsKinesisFirehose
{
    private $client;

    public function __construct()
    {
        $this->client=new FirehoseClient([
            'version'=> '2015-08-04',
            'region' => 'ap-southeast-1'
        ]);
    }

    public function put($content){
        $name = "chen-kakao-kinesis-firehose";
        echo $content."\r\n";
        try {
            $result = $this->client->putRecord([
                'DeliveryStreamName' => $name,
                'Record' => [
                    'Data' => $content,
                ],
            ]);
            var_dump($result);
        } catch (AwsException $e) {
            // output error message if fails
            echo $e->getMessage();
            echo "\n";
        }
    }


}