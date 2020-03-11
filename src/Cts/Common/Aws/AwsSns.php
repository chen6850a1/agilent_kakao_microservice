<?php
/**
 * Created by PhpStorm.
 * User: hongch02
 * Date: 2020/1/28
 * Time: 22:08
 */

namespace Cts\Common\Aws;

use Aws\Exception\AwsException;
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
 * @Bean("AwsSns")
 */
class AwsSns
{
    private $client;
    private $aws_acount;

    public function __construct()
    {
        $this->client=new SnsClient([
            'version'=> '2010-03-31',
            'region' => 'ap-northeast-1'
        ]);
        $this->aws_acount=config("aws.arn");
    }

    public function create($name){
        $result=$this->client->createTopic([
            "Name"=>config("aws.name").$name
        ]);
        CLog::info($result);
        CLog::info("Create AWS SNS:".config("aws.name").$name);
    }

    public function subscribe($sqs_arn,$topic_arn,$event_type){
        try{
            $result = $this->client->subscribe([
                'Protocol' => "sqs",
                'Endpoint' => $sqs_arn,
                'ReturnSubscriptionArn' => true,
                'TopicArn' => $topic_arn,
                'Attributes'=>[
                    "FilterPolicy"=>'{"event_type":["'.$event_type.'"]}'
                ]
            ]);
            CLog::info($result);
            return true;
        }catch (AwsException $e){
            CLog::info($e->getMessage());
            return false;
        }
    }


    public function trigger($event_type,$data){
        $messageData=["data"=>$data];
        $jsonData=\GuzzleHttp\json_encode($messageData);

        $targetArn="arn:aws:sns:".$this->aws_acount.config("aws.name").config("service");

        $result=$this->client->publish([
            'Message'=>$jsonData,
            "TargetArn"=>$targetArn,
            "MessageAttributes"=>[
                "event_type"=>[
                    "DataType"=>"String",
                    "StringValue"=>$event_type
                ]
            ]
        ]);
    }

}