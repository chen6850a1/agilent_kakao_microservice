<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace Cts\Common\Lib;

/**
 * Class UserInterface
 *
 * @since 2.0
 */
interface JitterbitInterface
{


    /**
     * 绑定用户
     * @param array $data
     * @example:{
     *      unionid:string,
     *      tel:string,
     *      CountryCode:string,
     * }
     *
     * @return array
     * @example error:{
     *      status:false,
     *      error:string
     * }
     *
     * @example success:{
     *       status:true,
     *      data: {"ReturnStatus":"UB001",
     *              "oktaUserId":"00ummhsm35cDp866r0h7",
     *              "mobilePhone":"13774494464",
     *              "crmContactId":"0102660157",
     *              "crmContactName":"\u9648 hong",
     *              "crmContactGuid":"462046B086021ED9ABD474F934EBCA3F",
     *              "crmAccountId":"0070484237",
     *              "crmAccountName":"\u676d\u5dde\u5b87\u7530\u79d1\u6280\u6709\u9650\u516c\u53f8",
     *              "crmAccountGuid":"0025B5A3305A1ED590B14B646B9799B6"}
     *      }
     */
    public function bindUser(array $data): array;


    /**
     * 查询用户
     * @param array $data
     * @example:{
     *      unionid:string
     * }
     *
     * @return array
     * @example error:{
     *      status:false,
     *      error:string
     * }
     *
     * @example success:{
     *      status:true,
     *      data: {"ReturnStatus":"SU01",
     *              "oktaUserId":"00ummhsm35cDp866r0h7",
     *              "mobilePhone":"13774494464",
     *              "crmContactId":"0102660157",
     *              "crmContactName":"\u9648 hong",
     *              "crmContactGuid":"462046B086021ED9ABD474F934EBCA3F",
     *              "crmAccountId":"0070484237",
     *              "crmAccountName":"\u676d\u5dde\u5b87\u7530\u79d1\u6280\u6709\u9650\u516c\u53f8",
     *              "crmAccountGuid":"0025B5A3305A1ED590B14B646B9799B6"}
     *      }
     */
    public function checkUserByUnionid(array $data): array;

    /**
     * 解绑用户
     * @param array $data
     * @example:{
     *      unionid:string,
     *      ContactGuid:string
     * }
     *
     * @return array
     * @example error:{
     *      status:false,
     *      error:string
     * }
     *
     * @example success:{
     *      status:true,
     *      data: {"ReturnStatus":"SU01",
     *              "oktaUserId":"00ummhsm35cDp866r0h7",
     *              "mobilePhone":"13774494464",
     *              "crmContactId":"0102660157",
     *              "crmContactName":"\u9648 hong",
     *              "crmContactGuid":"462046B086021ED9ABD474F934EBCA3F",
     *              "crmAccountId":"0070484237",
     *              "crmAccountName":"\u676d\u5dde\u5b87\u7530\u79d1\u6280\u6709\u9650\u516c\u53f8",
     *              "crmAccountGuid":"0025B5A3305A1ED590B14B646B9799B6"}
     *      }
     */
    public function unbindUser(array $data): array;


    /**
     * 获取服务历史
     * @param array $data
     * @example:[
     *  "contactId" => "102660157",
     *  "serialNo" => "",
     *  "timePeriod" => "3"
     * ]
     *
     * @return array
     * @example error:{
     *      status:false,
     *      error:string
     * }
     *
     * @example success:{
     *      status:true,
     *      data: {
     *  "results": [{
     *    "queryStatus": {
     *    "returnStatus": "SH001",
     *    "statusResult": {
     *    "results": [{
     *    "srId": "8102525341",
     *    "creationDate": "19.03.2020",
     *    "servconfId": null,
     *    "surveyid": null,
     *    "surveySubmitted": "N",
     *    "srDesc": "This is a test",
     *   "serialNo": "DEABJ00634",
     *   "srStatus": "WIP"
     *  }]}}}]}
     */
    public function getSrHistory(array $data): array;


    /**
     * 获取suvery
     * @param array $data
     * @example:[
     *  "surveyId" => "ZWECHATSRQ_SURVEY1",
     *  "servicereqId" => "8102370691"
     * ]
     *
     * @return array
     * @example error:{
     *      status:false,
     *      error:string
     * }
     *
     * @example {
     * "results": [
     * {
     * "surveyId": "ZWECHATSRQ_SURVEY1",
     * "servicereqId": "8102370691",
     * "surveyVersion": "0000000001",
     * "display": null,
     * "returnStatus": "SQ001",
     * "questionsSet": {
     * "results": [
     * {
     * "questionId": "id_52667026b0021ed79dd319be87c40011",
     * "questionDesc": "流程简便性",
     * "answerId": "id_52667026b0021ed79dd3218228134008",
     * "answerStyle": "RadioButton",
     * "answerType": "SingleChoice",
     * "answervaluesSet": {
     * "results": [
     * {
     * "answerId": "id_52667026b0021ed79dd3218228134008",
     * "value": "很差",
     * "valueid": "id_52667026b0021ed79dd321e2d01bc008",
     * "valueSelected": null
     * },
     * {
     * "answerId": "id_52667026b0021ed79dd3218228134008",
     * "value": "较差",
     * "valueid": "id_52667026b0021ed79dd325f745094019",
     * "valueSelected": null
     * },
     * {
     * "answerId": "id_52667026b0021ed79dd3218228134008",
     * "value": "一般",
     * "valueid": "id_52667026b0021ed79dd32b7b39b2000c",
     * "valueSelected": null
     * },
     * {
     * "answerId": "id_52667026b0021ed79dd3218228134008",
     * "value": "较好",
     * "valueid": "id_52667026b0021ed79dd32c89d111400c",
     * "valueSelected": null
     * },
     * {
     * "answerId": "id_52667026b0021ed79dd3218228134008",
     * "value": "很好",
     * "valueid": "id_52667026b0021ed79dd32dda275f400c",
     * "valueSelected": null
     * }
     * ]
     * }
     * },
     * {
     * "questionId": "id_52667026b0021ed79dd31b4124b20010",
     * "questionDesc": "技术能力",
     * "answerId": "id_52667026b0021ed79dd32f2aaf8cc0a0",
     * "answerStyle": "RadioButton",
     * "answerType": "SingleChoice",
     * "answervaluesSet": {
     * "results": [
     * {
     * "answerId": "id_52667026b0021ed79dd32f2aaf8cc0a0",
     * "value": "很差",
     * "valueid": "id_52667026b0021ed79dd32f737af340a0",
     * "valueSelected": null
     * },
     * {
     * "answerId": "id_52667026b0021ed79dd32f2aaf8cc0a0",
     * "value": "较差",
     * "valueid": "id_52667026b0021ed79dd331cf4e6c4019",
     * "valueSelected": null
     * },
     * {
     * "answerId": "id_52667026b0021ed79dd32f2aaf8cc0a0",
     * "value": "一般",
     * "valueid": "id_52667026b0021ed79dd332e77ca24019",
     * "valueSelected": null
     * },
     * {
     * "answerId": "id_52667026b0021ed79dd32f2aaf8cc0a0",
     * "value": "较好",
     * "valueid": "id_52667026b0021ed79dd3343920690019",
     * "valueSelected": null
     * },
     * {
     * "answerId": "id_52667026b0021ed79dd32f2aaf8cc0a0",
     * "value": "很好",
     * "valueid": "id_52667026b0021ed79dd3353ea3c4c019",
     * "valueSelected": null
     * }
     * ]
     * }
     * },
     * {
     * "questionId": "id_52667026b0021ed79dd31d1fe2a00011",
     * "questionDesc": "响应速度",
     * "answerId": "id_52667026b0021ed79dd3366eeab8401a",
     * "answerStyle": "RadioButton",
     * "answerType": "SingleChoice",
     * "answervaluesSet": {
     * "results": [
     * {
     * "answerId": "id_52667026b0021ed79dd3366eeab8401a",
     * "value": "很差",
     * "valueid": "id_52667026b0021ed79dd336ca0407401a",
     * "valueSelected": null
     * },
     * {
     * "answerId": "id_52667026b0021ed79dd3366eeab8401a",
     * "value": "较差",
     * "valueid": "id_52667026b0021ed79dd3385ccb35c01a",
     * "valueSelected": null
     * },
     * {
     * "answerId": "id_52667026b0021ed79dd3366eeab8401a",
     * "value": "一般",
     * "valueid": "id_52667026b0021ed79dd3394852ec40a0",
     * "valueSelected": null
     * },
     * {
     * "answerId": "id_52667026b0021ed79dd3366eeab8401a",
     * "value": "较好",
     * "valueid": "id_52667026b0021ed79dd33a8e8fee00a0",
     * "valueSelected": null
     * },
     * {
     * "answerId": "id_52667026b0021ed79dd3366eeab8401a",
     * "value": "很好",
     * "valueid": "id_52667026b0021ed79dd33b93fc6480a0",
     * "valueSelected": null
     * }
     * ]
     * }
     * },
     * {
     * "questionId": "id_52667026b0021ed79dd31f6ca52c8010",
     * "questionDesc": "服务态度",
     * "answerId": "id_52667026b0021ed79dd33cf55b244011",
     * "answerStyle": "RadioButton",
     * "answerType": "SingleChoice",
     * "answervaluesSet": {
     * "results": [
     * {
     * "answerId": "id_52667026b0021ed79dd33cf55b244011",
     * "value": "很差",
     * "valueid": "id_52667026b0021ed79dd33e03d80b401a",
     * "valueSelected": null
     * },
     * {
     * "answerId": "id_52667026b0021ed79dd33cf55b244011",
     * "value": "较差",
     * "valueid": "id_52667026b0021ed79dd33f594e8f800c",
     * "valueSelected": null
     * },
     * {
     * "answerId": "id_52667026b0021ed79dd33cf55b244011",
     * "value": "一般",
     * "valueid": "id_52667026b0021ed79dd3404ff699400c",
     * "valueSelected": null
     * },
     * {
     * "answerId": "id_52667026b0021ed79dd33cf55b244011",
     * "value": "较好",
     * "valueid": "id_52667026b0021ed79dd341cb009b8003",
     * "valueSelected": null
     * },
     * {
     * "answerId": "id_52667026b0021ed79dd33cf55b244011",
     * "value": "很好",
     * "valueid": "id_52667026b0021ed79dd342d9013f4003",
     * "valueSelected": null
     * }
     * ]
     * }
     * },
     * {
     * "questionId": "id_52667026b0021ed79dd3495683c7c011",
     * "questionDesc": "备注",
     * "answerId": "id_52667026b0021ed79dd352c1450c0008",
     * "answerStyle": "Field",
     * "answerType": "Text",
     * "answervaluesSet": {
     * "results": [
     * {
     * "answerId": "id_52667026b0021ed79dd352c1450c0008",
     * "value": "请详细说说您对本次服务的体验吧！您的反馈将成为我们不断改进的",
     * "valueid": "id_52667026b0021ed79dd352c1450c0008",
     * "valueSelected": null
     * }
     * ]
     * }
     * }
     * ]
     * }
     * }
     * ]
     * }
     */
    public function getSrSuvery(array $data): array;

    /**
     * 获取suvery 带答案
     * @param array $data
     * @example:[
     *  "surveyId" => "ZWECHATSRQ_SURVEY1",
     *  "servicereqId" => "8102370691"
     * ]
     *
     * @return array
     * @example error:{
     *      status:false,
     *      error:string
     * }
     *
     * @example {
     * "results": [
     * {
     * "surveyId": "ZWECHATSRQ_SURVEY1",
     * "servicereqId": "8102370691",
     * "surveyVersion": "0000000001",
     * "display": null,
     * "returnStatus": "SQ001",
     * "questionsSet": {
     * "results": [
     * {
     * "questionId": "id_52667026b0021ed79dd319be87c40011",
     * "questionDesc": "流程简便性",
     * "answerId": "id_52667026b0021ed79dd3218228134008",
     * "answerStyle": "RadioButton",
     * "answerType": "SingleChoice",
     * "answervaluesSet": {
     * "results": [
     * {
     * "answerId": "id_52667026b0021ed79dd3218228134008",
     * "value": "很好",
     * "valueid": "id_52667026b0021ed79dd32dda275f400c",
     * "valueSelected": "X"
     * }
     * ]
     * }
     * },
     * {
     * "questionId": "id_52667026b0021ed79dd31b4124b20010",
     * "questionDesc": "技术能力",
     * "answerId": "id_52667026b0021ed79dd32f2aaf8cc0a0",
     * "answerStyle": "RadioButton",
     * "answerType": "SingleChoice",
     * "answervaluesSet": {
     * "results": [
     * {
     * "answerId": "id_52667026b0021ed79dd32f2aaf8cc0a0",
     * "value": "很好",
     * "valueid": "id_52667026b0021ed79dd3353ea3c4c019",
     * "valueSelected": "X"
     * }
     * ]
     * }
     * },
     * {
     * "questionId": "id_52667026b0021ed79dd31d1fe2a00011",
     * "questionDesc": "响应速度",
     * "answerId": "id_52667026b0021ed79dd3366eeab8401a",
     * "answerStyle": "RadioButton",
     * "answerType": "SingleChoice",
     * "answervaluesSet": {
     * "results": [
     * {
     * "answerId": "id_52667026b0021ed79dd3366eeab8401a",
     * "value": "很好",
     * "valueid": "id_52667026b0021ed79dd33b93fc6480a0",
     * "valueSelected": "X"
     * }
     * ]
     * }
     * },
     * {
     * "questionId": "id_52667026b0021ed79dd31f6ca52c8010",
     * "questionDesc": "服务态度",
     * "answerId": "id_52667026b0021ed79dd33cf55b244011",
     * "answerStyle": "RadioButton",
     * "answerType": "SingleChoice",
     * "answervaluesSet": {
     * "results": [
     * {
     * "answerId": "id_52667026b0021ed79dd33cf55b244011",
     * "value": "很好",
     * "valueid": "id_52667026b0021ed79dd342d9013f4003",
     * "valueSelected": "X"
     * }
     * ]
     * }
     * },
     * {
     * "questionId": "id_52667026b0021ed79dd3495683c7c011",
     * "questionDesc": "备注",
     * "answerId": "id_52667026b0021ed79dd352c1450c0008",
     * "answerStyle": "Field",
     * "answerType": "Text",
     * "answervaluesSet": {
     * "results": [
     * {
     * "answerId": "id_52667026b0021ed79dd352c1450c0008",
     * "value": "请详细说说您对本次服务的体验吧！您的反馈将成为我们不断改进的",
     * "valueid": "id_52667026b0021ed79dd352c1450c0008",
     * "valueSelected": "-"
     * }
     * ]
     * }
     * }
     * ]
     * }
     * }
     * ]
     * }
     */
    public function getSrSuveryAnswer(array $data): array;


    /**
     * 更新bq
     * @param array $data
     * @example:[
     * "budgetoryquoteId" => "3000202879",
     * "uniondid" => "o4b3ejqpp-zsAaIYG87J_BCoSDS4",
     * "accountId"=>"0070366204",
     * "contactId"=>"0102230462"
     * ]
     *
     * @return array
     * @example error:{
     *      status:false,
     *      error:string
     * }
     *
     * @example success:{
     * "d_BqStatus": "BQ003",
     * "d_BudgetoryquoteId": "3000202879",
     * "d_WechatId": "o4b3ejqpp-zsAaIYG87J_BCoSDS4",
     * "d_AccountId": "0070366204",
     * "d_ContactId": "0102230462"
     * }
     */
    public function updateSrBq(array $data): array;


    /**
     * 查看PDF等文件
     * @param array $data
     * @example:[
     * "objectId" => "6901511753"
     * ]
     *
     * @return array
     * @example error:{
     *      status:false,
     *      error:string
     * }
     *
     * @example success:[
     * {
     * "evMime": "application/pdf",
     * "evMsg": null,
     * "evXstring": 二进制字符串,需要base64_decode后
     * }
     * ]
     */
    public function getSrCfd(array $data): array;

    /**
     * 提交suvery
     * @param array $data
     * @example:[
     * 'surveyId' => 'ZWECHATSRQ_SURVEY1',
     * 'servicereqId' => '8102370691',
     * 'surveyVersion' => '0000000001',
     * 'questionsSet' => [
     * [
     * 'questionId' => 'id_52667026b0021ed79dd319be87c40011',
     * 'questionDesc' => '流程简便性',
     * 'answerId' => 'id_52667026b0021ed79dd3218228134008',
     * 'answervaluesSet' => [
     * [
     * 'answerId' => 'id_52667026b0021ed79dd3218228134008',
     * 'value' => '5 Star',
     * 'valueid' => 'id_52667026b0021ed79dd32dda275f400c',
     * 'valueSelected' => 'X',
     * ],
     * ],
     * ],
     * [
     * 'questionId' => 'id_52667026b0021ed79dd31b4124b20010',
     * 'questionDesc' => '技术能力',
     * 'answerId' => 'id_52667026b0021ed79dd32f2aaf8cc0a0',
     * 'answervaluesSet' => [
     * [
     * 'answerId' => 'id_52667026b0021ed79dd32f2aaf8cc0a0',
     * 'value' => '5 Star',
     * 'valueid' => 'id_52667026b0021ed79dd3353ea3c4c019',
     * 'valueSelected' => 'X',
     * ],
     * ],
     * ],
     * [
     * 'questionId' => 'id_52667026b0021ed79dd31d1fe2a00011',
     * 'questionDesc' => '响应速度',
     * 'answerId' => 'id_52667026b0021ed79dd3366eeab8401a',
     * 'answervaluesSet' => [
     * [
     * 'answerId' => 'id_52667026b0021ed79dd3366eeab8401a',
     * 'value' => '5 Star',
     * 'valueid' => 'id_52667026b0021ed79dd33b93fc6480a0',
     * 'valueSelected' => 'X',
     * ],
     * ],
     * ],
     * [
     * 'questionId' => 'id_52667026b0021ed79dd31f6ca52c8010',
     * 'questionDesc' => '服务态度',
     * 'answerId' => 'id_52667026b0021ed79dd33cf55b244011',
     * 'answervaluesSet' => [
     * [
     * 'answerId' => 'id_52667026b0021ed79dd33cf55b244011',
     * 'value' => '5 Star',
     * 'valueid' => 'id_52667026b0021ed79dd342d9013f4003',
     * 'valueSelected' => 'X',
     * ],
     * ],
     * ],
     * [
     * 'questionId' => 'id_52667026b0021ed79dd3495683c7c011',
     * 'questionDesc' => '备注',
     * 'answerId' => 'id_52667026b0021ed79dd352c1450c0008',
     * 'answervaluesSet' => [
     * [
     * 'answerId' => 'id_52667026b0021ed79dd352c1450c0008',
     * 'value' => '',
     * 'valueid' => 'id_52667026b0021ed79dd352c1450c0008',
     * ],
     * ],
     * ],
     * ],
     * ]
     *
     * @return array
     * @example error:{
     *      status:false,
     *      error:string
     * }
     *
     * @example success: {
     * "d_SurveyId": "ZWECHATSRQ_SURVEY1",
     * "d_ServicereqId": "8102370691",
     * "d_SurveyVersion": "0000000001",
     * "d_Display": null,
     * "d_ReturnStatus": "SS001"
     * }
     */
    public function submitSrSuvery(array $data): array;

    /**
     * 检测序列号
     * @param array $data
     * @example:[
     * "sn"=>"DEBAY00405",
     * "ContactGuid"=>"462046B086021EEA9BB23F5BF2D8CC22",
     * "contactId"=>"0102660499",
     * "AccountGuid"=>"4C0DA7DE9AC61403E1000000821D946B",
     * "accountId"=>"0070240577"
     * ]
     *
     * @return array
     * @example error:{
     *      status:false,
     *      error:string
     * }
     *
     * @example success: [
     * status:true,
     * data:{
     * "d": {
     * "Response": {
     * "City": null,
     * "IobjectGuid": "0025B5A331A91EE5ACD4F771867751DE",
     * "PostalCode": null,
     * "RegionDesc": null,
     * "ReturnStatus": "SV001",
     * "ProductGuid": "D8FFFD5328B3F804E1000000821D20CE",
     * "SerialNo": "DEBAY00405",
     * "IobjectId": "0000000000000000000000000000400001590307",
     * "ProductId": "G7120A",
     * "ProductDesc": "1290 Infinity II 高速泵",
     * "CpName": null,
     * "ShipToId": null,
     * "ShipToName": null,
     * "CustomerRating": null,
     * "Street": null
     * },
     * "AccountGuid": "4C0DA7DE9AC61403E1000000821D946B",
     * "ContactGuid": "462046B086021EEA9BB23F5BF2D8CC22",
     * "ContactId": "0102660499",
     * "SerialNo": "DEBAY00405",
     * "AccountId": "0070240577"
     * }
     * }
     * ]
     */
    public function checkSn(array $data): array;


    /**
     * 检测序列号
     * @param array $data
     * @example:[
     * "data"=>"XXXXXXX",
     * ]
     *
     * @return array
     * @example error:{
     *      status:false,
     *      error:string
     * }
     *
     * @example success: [
     * status:true,
     * }
     * ]
     */
    public function notificationHandle(array $data): array;
}
