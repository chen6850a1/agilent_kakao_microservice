<?php
/**
 * Created by PhpStorm.
 * User: AndrewLuo
 * Date: 3/10/2021
 * Time: 1:56 PM
 */

namespace Cts\Common\Aws;

use Aws\Athena\AthenaClient;
use Aws\Credentials\Credentials;
use Swoft\Log\Helper\Log;
use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * AwsAthena helper
 *
 * @since 2.0
 *
 * @Bean(name="AwsAthena",scope=Bean::REQUEST)
 */
class AwsAthena
{
    private $client;
    private $databaseName;
    private $outputS3Location;
    private $catalog;

    public function __construct(){

        $options = [
            'region' => 'ap-northeast-1',
            'version' => 'latest'
        ];

        $this->client=new AthenaClient($options);
        $this->databaseName = config("aws.athena.databaseName");
        $this->outputS3Location = config("aws.athena.outputS3Location");
        $this->catalog = config("aws.athena.catalog");
		
    }
	
    public function getDataBySql($sql){
        Log::info($sql);
        //start client
        $athenaClient = $this->client;

        //start query
        $startQueryResponse = $athenaClient->startQueryExecution([
            'QueryExecutionContext' => [
                'Catalog' => $this->catalog,
                'Database' => $this->databaseName,
            ],
            'QueryString' => $sql,
            'ResultConfiguration' => [
                'OutputLocation' => $this->outputS3Location
            ]
        ]);
        $queryExecutionId = $startQueryResponse->get('QueryExecutionId');
        Log::info($queryExecutionId);

        //wait query result
        $flag = true;
        $errorMessage = array();
        $waitForSucceeded = function () use ($athenaClient, $queryExecutionId, &$waitForSucceeded,&$flag,&$errorMessage) {
            $getQueryExecutionResponse = $athenaClient->getQueryExecution([
                'QueryExecutionId' => $queryExecutionId
            ]);
            //var_dump($getQueryExecutionResponse);
            $status = $getQueryExecutionResponse->get('QueryExecution')['Status']['State'];
            Log::info($status);
            print("[waitForSucceeded] State=$status\n");
            if($status === 'FAILED'){
                $flag = false;
                $status = $getQueryExecutionResponse->get('QueryExecution')['Status']['StateChangeReason'];
                Log::info($status);
                print("[waitForSucceeded] State=$status\n");
                $errorMessage['error'] = $status;
                return $errorMessage;
            } else {
                return $status === 'SUCCEEDED' || $waitForSucceeded();
            }
        };
        $waitForSucceeded();

        //get result
        $getQueryResultsResponse = $athenaClient->getQueryResults([
            'QueryExecutionId' => $queryExecutionId
        ]);
        Log::info($getQueryResultsResponse);

        //stop query execution
        $athenaClient->stopQueryExecution([
            'QueryExecutionId' => $queryExecutionId
        ]);

        if($flag){
            return $getQueryResultsResponse->get('ResultSet');
        }else{
            return $errorMessage;
        }
    }
}