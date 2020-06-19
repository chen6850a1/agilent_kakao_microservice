<?php
/**
 * Created by PhpStorm.
 * User: hongch02
 * Date: 6/26/2019
 * Time: 8:36 AM
 */

namespace Cts\Common\Aws;

use Aws\S3\S3Client;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Log\Helper\CLog;


/**
 * Aws S3 helper
 *
 * @since 2.0
 *
 * @Bean(name="AwsS3",scope=Bean::REQUEST)
 */
class AwsS3
{
    private $client;
    private $bucketName;
    private $domainName;

    const UPLOAD_DIR="web/upload_file/";

    public function __construct()
    {
        $this->client=new S3Client([
            'version'=> '2006-03-01',
            'region' => 'ap-northeast-1'
        ]);
        $this->bucketName=config("aws.s3_bucket");
        $this->domainName=config("aws.s3_domain");
    }

    public function upoloadFile($fileName,$url,$content_type="application/octet-stream"){
        CLog::info($fileName);
        CLog::info($url);
        $result=$this->client->putObject([
            'Bucket' => $this->bucketName,
            'Key'    => self::UPLOAD_DIR.$fileName,
            'ContentType'=>$content_type,
            'SourceFile'   => $url
        ]);
        CLog::info($result);
        return $this->getDomainUrl().$fileName;
    }

    public function upoloadFileByData($fileName,$data){
        $this->client->putObject([
            'Bucket' => $this->bucketName,
            'Key'    => self::UPLOAD_DIR.$fileName,
            'Body'=>$data
        ]);
        return $this->getDomainUrl().$fileName;
    }

    public function getDomainUrl(){
        return $this->domainName."/".self::UPLOAD_DIR;
    }


}