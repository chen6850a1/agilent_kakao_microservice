<?php

declare(strict_types=1);

namespace Cts\Common\Lib;

/**
 * Class AdminUserInterface
 *
 * @since 2.0
 */
interface AdminUserInterface {

    /**
     * 
     * @param array $param
     * @example:{
     *      account:string,
     *      password:string
     * }
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function login(array $param): array;

    /**
     * 
     * @param array $params
     * @example:{
     *      password:string
     * }
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function changePassword(array $params): array;

    /**
     * 
     * @param array $params
     * @example:{
     *      page:string|int,
     *      pageSize:string|int,
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
    public function getList(array $params): array;

    /**
     * 
     * @param int $uid
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function get(int $uid): array;

    /**
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getAuthority(): array;

    /**
     * 
     * @param array $params
     * @example {
     *      account:string,
     *      access:string eg.[1,4,8,11]
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
     * @param int $uid
     * @param array $params
     * @example {
     *      access:string eg.[1,4,8,11]
     * }
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function update(int $uid, array $params): array;

    /**
     * 
     * @param int $uid
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function reset(int $uid): array;

    /**
     * 
     * @param int $uid
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function delete(int $uid): array;

    /**
     * 
     * @param int $uid
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getInfoByUid(int $uid): array;

    /**
     *
     * @param array $uidArr
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getArrInfoByUid(array $uidArr): array;

    /**
     * 
     * @param array $params
     * @example {
     *      page:1,
     *      pageSize:10,
     *      keyword:test,
     *      orderBy:created_at,
     *      direction:asc|desc,
     * }
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getEngineerApplicationList(array $params): array;

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
    public function getEngineerApplication(int $id): array;

    /**
     * 
     * @param array $params
     * @example {
     *      name:zhang san,
     *      account:mail address
     * }
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function engineerApply(array $params): array;

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
    public function engineerApprove(int $id): array;

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
    public function engineerRefuse(int $id): array;
}
