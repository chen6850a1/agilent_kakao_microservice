<?php

declare(strict_types=1);

namespace Cts\Common\Lib;

/**
 * Class SrInterface
 *
 * @since 2.0
 */
interface SrInterface {

    /**
     * @param array $params
     * @example {
     *      ContactId:string
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function get(array $params): array;

    /**
     * @param array $params
     * @example {
     *      sr_status:string
     *      sr_detection:string|int
     *      sr_category:string|int
     *      customer_name:string
     *      ContactId:string
     *      AccountId:string
     *      IobjectId:string
     *      service_team_id:string
     *      tier2_specialist_id:string
     *      description:string
     *      notes:string
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function create(array $params): array;

    /**
     * @param array $params
     * @return array
     */
    public function createDgg(array $params): array;

    /**
     * @param array $params
     * @return array
     */
    public function createDsrDgg(array $params): array;

    /**
     *
     * @param int $uid
     * @param string $srId
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getUserHistory(int $uid = 0, string $srId = ''): array;

    /**
     * @return array
     */
    public function getLastHistory(): array;

    /**
     * @param int $id
     * @param array $params
     * @example {
     *      serial_no:string
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getHistory(array $params): array;

    /**
     *
     * @param array $params
     * @example {
     *      keyword:string
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function historyFilter(array $params): array;

    /**
     *
     * @param array $params
     * @example {
     *      SrId:string
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function historyDetails(array $params): array;

    /**
     *
     * @param array $params
     * @example {
     *      survey_id:string,
     *      service_request_id:string
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getSurvey(array $params): array;

    /**
     *
     * @param array $params
     * @example {
     *      survey_id:string,
     *      service_request_id:string
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getSurveyList(array $params): array;

    /**
     *
     * @param array $params
     * @example {
     *      d:{}
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function submitSurvey(array $params): array;

    /**
     *
     * @param string $startDate
     * @param string $endDate
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function surveyExport(string $startDate, string $endDate): array;

    /**
     *
     * @param array $params
     * @example {
     *      service_request_id:string,
     *      object_id:string
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getBqInfo(array $params): array;

    /**
     *
     * @param array $params
     * @example {
     *      object_id:string
     * }
     *
     * @return string pdf
     */
    public function getBqPdf(array $params);

    /**
     * 
     * @param string $bqId
     * @param int $isSafety
     * @param string $shareId
     * 
     * @return string pdf
     */
    public function getSignBqPdf(string $bqId, int $isSafety, string $shareId);

    /**
     * 
     * @param array $params
     * @example {
     *      bq_id:string,
     *      signature:string,
     *      safety_statement:array
     * }
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function genPdf(array $params): array;

    /**
     * 
     * @param string $bqId
     * @param int $isSafety
     * @param string $shareId
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function previewPdf(string $bqId, int $isSafety,string $shareId);

    /**
     * 
     * @param string $bqId
     * @return array
     */
    public function fillInvoiceRemind(string $bqId): array;

    /**
     *
     * @param array $params
     * @example {
     *      bq_id:string
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function bqConfirm(array $params): array;

    /**
     * 
     * @param string $bqId
     * @param array $invoice
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function fillInvoice(string $bqId, array $invoice): array;

    /**
     * 
     * @param array $params
     * @example {
     *      bq_id:string,
     *      signature:string,
     *      safety_statement:array
     * }
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function fillSafetyStatement(array $params): array;

    /**
     *
     * @param string $startDate
     * @param string $endDate
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function bqExport(string $startDate, string $endDate): array;

    /**
     * 
     * @param array $params
     * @example:{
     *      page:string|int,
     *      pageSize:string|int,
     *      srId:string,
     *      bqId:string,
     *      orderBy:string,
     *      direction:string eg.asc|desc
     * }
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getBqPdfList(array $params): array;

    /**
     * 
     * @param int $bqConfirmedId
     * @param int $type
     */
    public function openPdf(int $bqConfirmedId, int $type);

    /**
     *
     * @param int $notificationId
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getIframeDataByNotificationId($notificationId): array;

    /**
     *
     * @param string $srId
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getIframeDataBySrId($srId): array;

    /**
     *
     * @param string $headerStatus
     * @param string $startDate
     * @param string $endDate
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getByHeaderStatusAndTimeInterval(string $headerStatus, string $startDate, string $endDate): array;

    /**
     *
     * @param string $srId
     * @param string $headerStatus
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getBySrIdAndHeaderStatus(string $srId, string $headerStatus): array;

    /**
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getLatestService(): array;

    /**
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getUnread(): array;

    /**
     *
     * @param string $objectId
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function checkIfSrClosedHasBeenPushed(string $objectId): array;

    /**
     *
     * @param array $params
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function pushNotification(array $params): array;
	
	
	/**
     *
     * @param array $params
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getNotificationListByUidSrid(int $uid,string $srid): array;

    /**
     * 
     * @param array $params
     * @example:{
     *      serial_no:string,
     *      service_request_id:string,
     *      header_status:string,
     *      msg_type:int 0-仅文本 1-快递单号 2-pdf 3-视频,
     *      msg_extra:string
     *      msg_body:string
     *      msg_note:string
     * }
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function pushSendToRepair(array $params): array;

    /**
     *
     * @param string $startDate
     * @param string $endDate
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function notificationExport(string $startDate, string $endDate, int $type): array;

    /**
     *
     * @param string $contactId
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getLastSrInfoByContactId(string $contactId): array;

    /**
     * 
     * @param string $mailNo
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getTracking(string $mailNo): array;

    /**
     * 
     * @return array
     */
    public function syncStrFiles(): array;

    /**
     * 
     * @param string $bqId
     * @return array
     */
    public function updateTriggerResend(string $bqId): array;

    /**
     *
     * @param array $params
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getStrFiles(array $params): array;

    /**
     *
     * @param array $params
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getStrFilesByIds(array $params): array;

    /**
     *
     * @param array $params
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getStrFileContent(int $id): array;

    /**
     *
     * @param array $params
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function createStrFiles(array $params): array;

    /**
     *
     * @param int $id
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function deleteStrFile(int $id): array;

    /**
     * 
     * @param string $bqId
     * @return array
     */
    public function getAttachments(string $bqId): array;

    /**
     * @param array $params
     * @return array
     */
    public function submitIr(array $params): array;

    /**
     * @param array $params
     * @return array
     */
    public function irHistory(array $params): array;

    /**
     * @param array $params
     * @return array
     */
    public function irOppHistory(array $params): array;

    /**
     * @param array $params
     * @return array
     */
    public function irEmployee(array $params): array;

    /**
     *
     * @param array $excelData
     * @param array $type
     * @return array
     */
    public function importIrEmployeeData(array $excelData , array $type): array;

    /**
     * @param array $params
     * @return array
     */
    public function irSubmitFastUp(array $params): array;

    /**
     * @param array $params
     * @return array
     */
    public function irSubmitFastOpp(array $params): array;

    /**
     *
     * @return array
     */
    public function irProductLine(): array;

    /**
     * @param array $params
     * @return array
     */
    public function irProduct(array $params): array;

    /**
     * @param array $params
     * @return array
     */
    public function irSendMail(array $params): array;

    /**
     * @param array $params
     * @return array
     */
    public function irGetRtucLink(array $params): array;

    /**
     * @return array
     */
    public function irTags(): array;
    
}
