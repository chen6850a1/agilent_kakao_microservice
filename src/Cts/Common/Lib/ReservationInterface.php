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
     * @param array $params
     * @return array
     */
    public function create(array $params): array;

    /**
     * 
     * @param string $name
     * @param int $id
     * @param array $params
     * @return array
     */
    public function update(string $name, int $id, array $params): array;

    /**
     * 
     * @return array
     */
    public function getMyReservation(): array;
}
