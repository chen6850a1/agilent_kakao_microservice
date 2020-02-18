<?php
/**
 * Created by PhpStorm.
 * User: hongch02
 * Date: 2020/1/28
 * Time: 22:08
 */

namespace Cts\Common\Aws;

use Swoft\Bean\Annotation\Mapping\Bean;
use Aws\Sns\SnsClient;

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

    public function __construct()
    {
        $this->client=new SnsClient([
            'version'=> '2010-03-31',
            'region' => 'ap-southeast-1'
        ]);
    }

    public function create($name){
        $result=$this->client->createTopic([
            "Name"=>"agilent_aws_dev_service_".$name
        ]);
    }

    public function subscribe($sqs_arn,$topic_arn,$event_type){
        $result = $this->client->subscribe([
            'Protocol' => "sqs",
            'Endpoint' => $sqs_arn,
            'ReturnSubscriptionArn' => true,
            'TopicArn' => $topic_arn,
            'Attributes'=>[
                "FilterPolicy"=>'{"event_type":["'.$event_type.'"]}'
            ]
        ]);
    }

}