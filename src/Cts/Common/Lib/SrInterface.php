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
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getProductIdListForRepair(): array;

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
}
