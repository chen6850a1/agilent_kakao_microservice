<?php

declare(strict_types=1);

namespace Cts\Common\Lib;

/**
 * Class OrderInterface
 *
 * @since 2.0
 */
interface OrderInterface {

    /**
     * 
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
    public function getList(array $params): array;

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
     * @example:{
     *      
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
    public function update(int $id, array $params): array;
}
