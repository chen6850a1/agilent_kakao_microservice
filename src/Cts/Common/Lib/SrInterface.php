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
     * 
     * @return array
     */
    public function get(array $params): array;

    /**
     * @param array $params
     * 
     * @return array
     */
    public function create(array $params): array;

    /**
     * @param int $id
     * @param array $params
     * 
     * @return bool
     */
    public function getHistory(array $params): array;

    /**
     * 
     * @param array $params
     * @return array
     */
    public function historyFilter(array $params): array;

    /**
     * 
     * @param array $params
     * @return array
     */
    public function historyDetails(array $params): array;

    /**
     * 
     * @param array $params
     * @return array
     */
    public function getSurvey(array $params): array;

    /**
     * 
     * @param array $params
     * @return array
     */
    public function submitSurvey(array $params): array;

    /**
     * 
     * @param array $params
     * @return array
     */
    public function getBqInfo(array $params): array;

    /**
     * 
     * @param array $params
     */
    public function getBqPdf(array $params);

    /**
     * 
     * @param array $params
     * @return array
     */
    public function bqConfirm(array $params): array;

    /**
     * 
     * @param array $params
     * @return array
     */
    public function pushNotification(array $params): array;
}
