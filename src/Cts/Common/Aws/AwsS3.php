<?php

namespace Cts\Common\Aws;

use Aws\S3\S3Client;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Log\Helper\Log;
use Swoft\Stdlib\Helper\ArrayHelper;
use Swoft\Bean\BeanFactory;
use Swoft\Co;

/**
 * Aws S3 helper
 *
 * @since 2.0
 *
 * @Bean(name="AwsS3",scope=Bean::REQUEST)
 */
class AwsS3 {

    private $client;
    private $bucketName;
    private $domainName;
    public $uploadDir = 'web/upload_file/';

    public function __construct() {
        $this->client = new S3Client([
            'version' => '2006-03-01',
            'region' => 'ap-northeast-1'
        ]);
        $this->bucketName = config("aws.s3_bucket");
        $this->domainName = config("aws.s3_domain");
    }

    public static function new(string $uploadDir = ''): self {
        /** @var AwsS3 $awsS3 */
        $awsS3 = BeanFactory::getRequestBean("AwsS3", (string) Co::tid());
        $awsS3->uploadDir = !empty($uploadDir) ? $uploadDir : 'web/upload_file/';
        return $awsS3;
    }

    public function upoloadFile($fileName, $url, $content_type = "application/octet-stream") {
        Log::info($fileName);
        Log::info($url);
        $result = $this->client->putObject([
            'Bucket' => $this->bucketName,
            'Key' => $this->uploadDir . $fileName,
            'ContentType' => $content_type,
            'SourceFile' => $url
        ]);
        Log::info($result);
        return $this->getDomainUrl() . $fileName;
    }

    public function upoloadFileByData($fileName, $data, $flag = false) {
        $res = $this->client->putObject([
            'Bucket' => $this->bucketName,
            'Key' => $this->uploadDir . $fileName,
            'Body' => $data
        ]);
        if ($flag) {
            return $res->toArray();
        } else {
            return $this->getDomainUrl() . $fileName;
        }
    }

    public function getDomainUrl() {
        return $this->domainName . "/" . $this->uploadDir;
    }

    public function listObjects($maxKeys = 1000, $prefix = '') {
        $objects = [];
        $startAfter = '';
        do {
            $xmlResponse = $this->client->listObjectsV2([
                'Bucket' => $this->bucketName,
                'MaxKeys' => $maxKeys,
                'Prefix' => $this->uploadDir . $prefix,
                'StartAfter' => $startAfter
            ]);
            $result = $xmlResponse->toArray();

            if (!isset($result['Contents'])) {
                break;
            }
            if (isset($result['Contents']['Key'])) { //当只有一个文件返回时 变为数组
                $result['Contents'] = [$result['Contents']];
            }

            foreach ($result['Contents'] as $content) {
                $objects[] = $content['Key'];
                $startAfter = $content['Key'];
            }

            $isTruncated = ArrayHelper::get($result, 'IsTruncated');
        } while (!empty($isTruncated));

        return $objects;
    }

    public function getObject($fileName) {
        $result = $this->client->getObject([
                    'Bucket' => $this->bucketName,
                    'Key' => $this->uploadDir . $fileName
                ])->toArray();
        $content = ArrayHelper::get($result, 'Body', '');
        return $content;
    }

    public function deleteObject($fileName) {
        $result = $this->client->deleteObject([
                    'Bucket' => $this->bucketName,
                    'Key' => $this->uploadDir . $fileName
                ])->toArray();
        return $result;
    }

}
