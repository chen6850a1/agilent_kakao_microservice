<?php
/**
 * Created by PhpStorm.
 * User: hongch02
 * Date: 2020/2/2
 * Time: 13:06
 */

namespace Cts\Common\Aws;
use Aws\Exception\AwsException;
use Aws\Firehose\FirehoseClient;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Log\Helper\CLog;

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
    private $kinesis_name="";

    public function __construct()
    {
        $this->client=new FirehoseClient([
            'version'=> '2015-08-04',
            'region' => 'ap-southeast-1'
        ]);
        $this->kinesis_name=config("aws.kinesis","");
    }

    public function put($content){
        if(!empty($this->kinesis_name)){
            try {
                $result = $this->client->putRecord([
                    'DeliveryStreamName' => $this->kinesis_name,
                    'Record' => [
                        'Data' => $content,
                    ],
                ]);
            } catch (AwsException $e) {
                // output error message if fails
                echo $e->getMessage();
                echo "\n";
            }
        }else{
            if(strlen($content)<5000){
                CLog::info($content);
            }else{
                CLog::info(substr($content, 0, 5000));
			}

        }
    }


}