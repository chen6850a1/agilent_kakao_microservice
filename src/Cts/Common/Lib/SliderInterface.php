<?php

declare(strict_types=1);

namespace Cts\Common\Lib;

/**
 * Class ReservationInterface
 *
 * @since 2.0
 */
interface SliderInterface {

    /**
     * 
     * @return array
     */
    public function getList(): array;

    /**
     * 
     * @param int $id
     * @return array
     */
    public function get(int $id): array;

    /**
     * 
     * @param array $params
     * @return array
     */
    public function create(array $params): array;

    /**
     * 
     * @param int $id
     * @param array $params
     * @return array
     */
    public function update(int $id, array $params): array;

    /**
     * 
     * @param int $id
     * @param array $params
     * @return array
     */
    public function updateOrder(int $id, array $params): array;

    /**
     * 
     * @param int $id
     * @return array
     */
    public function delete(int $id): array;

    /**
     * 
     * @return array
     */
    public function publish(): array;
}
