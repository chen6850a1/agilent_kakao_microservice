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
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function fetch(): array;
    
    /**
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getList(): array;

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
    public function get(int $id): array;

    /**
     * 
     * @param array $params
     * @example {
     *      title:string,
     *      src:file,
     *      link:string
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
     * 
     * @param int $id
     * @param array $params
     * @example {
     *      title:string,
     *      src:file,
     *      link:string
     * }
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function update(int $id, array $params): array;

    /**
     * 
     * @param int $id
     * @param array $params
     * @example {
     *      order:string|int,
     *      operator:string eg. +|-
     * }
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function updateOrder(int $id, array $params): array;

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
    public function delete(int $id): array;

    /**
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function publish(): array;
}
