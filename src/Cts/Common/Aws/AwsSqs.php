<?php
/**
 * Created by PhpStorm.
 * User: hongch02
 * Date: 2020/1/28
 * Time: 22:08
 */

namespace Cts\Common\Aws;

use Aws\Exception\AwsException;
use Aws\Sqs\SqsClient;
use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * Aws sns helper
 *
 * @since 2.0
 *
 * @Bean("AwsSqs")
 */
class AwsSqs
{
    private $client;
    private $aws_acount;

    public function __construct()
    {
        $this->client=new SqsClient([
            'version'=> '2012-11-05',
            'region' => 'ap-southeast-1'
        ]);
        $this->aws_acount=env("AWS_ACCOUNT","ap-southeast-1:417656858312:");
    }

    public function create($name,$topicName,$event_type){
        $queueName="agilent_aws_dev_service_".$name;

        $result=$this->client->createQueue([
            "QueueName"=>$queueName,
            'Attributes' => [
                "Policy"=>$this->createPolicy($queueName,$topicName),
                'DelaySeconds' => 5,
                'MaximumMessageSize' => 4096 // 4 KB
            ]
        ]);
        $sns=new AwsSns();
        $sns->subscribe("arn:aws:sqs:".$this->aws_acount.$queueName,"arn:aws:sns:".$this->aws_acount.$topicName,$event_type);
    }

    public function createPolicy($queueName,$topicName){
        $Statement=new \stdClass();
        $Statement->Sid="Sid".time();
        $Statement->Effect="Allow";
        $Principal=new \stdClass();
        $Principal->AWS="*";
        $Statement->Principal=$Principal;
        $Statement->Action="SQS:SendMessage";
        $Statement->Resource="arn:aws:sqs:".$this->aws_acount.$queueName;

        $ArnEquals=new \stdClass();
        $ArnEquals->{"aws:SourceArn"}="arn:aws:sns:".$this->aws_acount.$topicName;
        $Condition=new \stdClass();
        $Condition->ArnEquals=$ArnEquals;

        $Statement->Condition=$Condition;


        $obj=new \stdClass();
        $obj->Version="2012-10-17";
        $obj->Id="sns_pulish_sqs".$queueName;
        $obj->Statement=[$Statement];
        return \GuzzleHttp\json_encode($obj);
    }
}