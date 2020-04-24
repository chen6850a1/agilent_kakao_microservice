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
use Swoft\Log\Helper\CLog;

/**
 * Aws sns helper
 *
 * @since 2.0
 *
 * @Bean(name="AwsSqs",scope=Bean::PROTOTYPE)
 */
class AwsSqs
{
    private $client;
    private $aws_acount;

    public function __construct()
    {
        $this->client=new SqsClient([
            'version'=> '2012-11-05',
            'region' => 'ap-northeast-1'
        ]);
        $this->aws_acount=config("aws.arn");
    }

    /**
     * @param $self_service_name
     * @param $service_name
     * @param $event_type
     * @return string||null
     */
    public function create($self_service_name,$service_name,$event_type){
        $queueName=config("aws.name").$self_service_name."_".$service_name."_".$event_type;
        $topicName=config("aws.name").$service_name;
        CLog::info("queueName=$queueName");
        $result=$this->client->createQueue([
            "QueueName"=>$queueName,
            'Attributes' => [
                "Policy"=>$this->createPolicy($queueName,$topicName),
                "ReceiveMessageWaitTimeSeconds"=>20,//轮训等待时间
                'DelaySeconds' => 5,
                'MaximumMessageSize' => 4096 // 4 KB
            ]
        ]);
        Clog::info($topicName);
        CLog::info($result);
        CLog::info("Create AWS SQS:".config("aws.name").$queueName);

        $sns=new AwsSns();
        if($sns->subscribe("arn:aws:sqs:".$this->aws_acount.$queueName,"arn:aws:sns:".$this->aws_acount.$topicName,$event_type)){
            return $result->get("QueueUrl");
        }
        return false;
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


    public function ReceiveMessage($queueUrl){
        $result = $this->client->receiveMessage(array(
            'AttributeNames' => ['SentTimestamp'],
            'MaxNumberOfMessages' => 1,
            'MessageAttributeNames' => ['All'],
            'QueueUrl' => $queueUrl, // REQUIRED
            'WaitTimeSeconds' => 20,
        ));
        return $result->get('Messages');
    }

    public function deleteMessage($queueUrl,$message){
        $result = $this->client->deleteMessage([
            'QueueUrl' => $queueUrl, // REQUIRED
            'ReceiptHandle' =>$message['ReceiptHandle'] // REQUIRED
        ]);
    }
}