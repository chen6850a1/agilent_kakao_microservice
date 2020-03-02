<?php

declare(strict_types=1);

namespace Cts\Common\Lib;

/**
 * Class ReservationInterface
 *
 * @since 2.0
 */
interface ReservationInterface {

    /**
     * 
     * @param string $name
     * @param array $params
     * @return array
     */
    public function getList(string $name, array $params): array;

    /**
     * 
     * @param string $name
     * @param int $id
     * @return array
     */
    public function get(string $name, int $id): array;

    /**
     * 
     * @param int $kakaoUid
     * @param array $params
     * @return array
     */
    public function create(int $kakaoUid, array $params): array;

    /**
     * 
     * @param string $name
     * @param int $id
     * @param int $adminUid
     * @param array $params
     * @return array
     */
    public function update(string $name, int $id, int $adminUid, array $params): array;

    /**
     * 
     * @param int $uid
     * @return array
     */
    public function getMyReservation(int $uid): array;
}
