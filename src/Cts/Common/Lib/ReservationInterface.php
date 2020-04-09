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
     * @param string $name eg. installation|pm|oq
     * @param array $params
     * @example:{
     *      page:string|int,
     *      pageSize:string|int,
     *      keyword:string,
     *      orderBy:string,
     *      direction:string eg.asc|desc,
     *      status:string|int,
     *      responseFormat:string eg. csv|json
     * }
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getList(string $name, array $params): array;

    /**
     * 
     * @param string $name eg. installation|pm|oq
     * @param int $id
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function get(string $name, int $id): array;

    /**
     * 
     * @param array $params
     * @example:{
     *      type:string|int,
     *      expected_date:string,
     *      mobile:string,
     *      name:string,
     *      company:string,
     *      order_no:string,
     *      instrument_type:string,
     *      additional_information:string,
     *      images:array,
     *      serial_no:string,
     *      configration_information:string
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
     * @param string $name eg. installation|pm|oq
     * @param int $id
     * @param array $params
     * @example {
     *      status:string|int
     * }
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function update(string $name, int $id, array $params): array;

    /**
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function countMyReservation(): array;

    /**
     * 
     * @param array $params
     * @example {
     *      page:int,
     *      tab:0|1
     * }
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getMyReservation(array $params): array;

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
    public function getMyReservationDetails(int $id): array;

    /**
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getCalendar(): array;
}
