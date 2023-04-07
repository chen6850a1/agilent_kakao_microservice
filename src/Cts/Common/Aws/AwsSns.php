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
use Swoft\Log\Helper\Log;
use Swoole\Exception;

/**
 * Aws sns helper
 *
 * @since 2.0
 *
 * @Bean(name="AwsSns",scope=Bean::REQUEST)
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

    public function subscribe($sqs_arn,$listenAllService){
        foreach($listenAllService as $services=>$events){
            try{
                $FilterPolicy=new \stdClass();
                foreach ($events as $event_name){
                    $FilterPolicy->event_type[]=$event_name;
                }

                $result = $this->client->subscribe([
                    'Protocol' => "sqs",
                    'Endpoint' => $sqs_arn,
                    'ReturnSubscriptionArn' => true,
                    'TopicArn' => "arn:aws:sns:".$this->aws_acount.config("aws.name").$services,
                    'Attributes'=>[
                        "FilterPolicy"=>json_encode($FilterPolicy)
                    ]
                ]);
                CLog::info($result);
            }catch (AwsException $e){
                CLog::info("sns subscribe fail".json_encode([
                    'Protocol' => "sqs",
                    'Endpoint' => $sqs_arn,
                    'ReturnSubscriptionArn' => true,
                    'TopicArn' => "arn:aws:sns:".$this->aws_acount.config("aws.name").$services,
                    'Attributes'=>[
                        "FilterPolicy"=>json_encode($FilterPolicy)
                    ]
                ]));
                CLog::info($e->getMessage());
                return false;
            }
        }
        return true;
    }



    public function trigger($event_type,$data){
        if(!config("aws.name")){
            return false;
        }

        $messageData=["data"=>$data,"traceid"=>context()->get('traceid', ''),"user"=>context()->get("user",[])];
        $jsonData=\GuzzleHttp\json_encode($messageData);

        $targetArn="arn:aws:sns:".$this->aws_acount.config("aws.name").config("service");
        CLog::info($targetArn);
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
        Log::info($result);
        return $result;
    }

    public function pushSmsMessage($tel,$message){
        $info = $this->client->publish([
            'Message' => "[agilent]".$message, //必填
            'MessageAttributes' => [
                'AWS.SNS.SMS.SenderID' => [
                    'DataType' => 'String', // REQUIRED
                    'StringValue' => 'mySenderID',
                ],
                'AWS.SNS.SMS.MaxPrice' => [
                    'DataType' => 'Number', // REQUIRED
                    'StringValue' => '0.50',
                ],
                'AWS.SNS.SMS.SMSType' => [
                    'DataType' => 'String', // REQUIRED
                    'StringValue' => 'Transactional',
                ]
            ],
            //'MessageStructure' => 'MessageStructure', //参数可选
            'PhoneNumber' => $tel, //必填
        ]);
        CLog::info($info->__toString());
        return $info;
    }

}