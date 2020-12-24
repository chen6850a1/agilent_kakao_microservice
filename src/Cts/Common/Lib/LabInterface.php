<?php

declare(strict_types=1);

namespace Cts\Common\Lib;

/**
 * Class SrInterface
 *
 * @since 2.0
 */
interface LabInterface {

    /**
     * 
     * @param array $params
     * @example:{
     *      page:string|int,
     *      pageSize:string|int,
     *      region:int,
     *      keyword:string,
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
    public function getList(array $params): array;

    /**
     * 
     * @param array $idList
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getQrCodes(array $idList): array;

    /**
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
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function activate(int $id): array;

    /**
     * 
     * @param int $id
     * @param array $params
     * @example:{
     *      customer_name:string,
     *      customer_address:string,
     *      keyword_logic:int,
     *      keyword:string,
     *      installation_finished_date:string,
     *      engineer:string,
     *      mobile:string,
     *      email:string,
     *      salesman_info:string,
     *      online_edition_installation_info:string,
     *      subscribenet_account:string,
     *      subscribenet_password:string,
     *      software_serial_no:string,
     *      contacts:array [
     *          [
     *              id:int, id字段如果没有是新增
     *              lab_id:int,
     *              name:string,
     *              department:string,
     *              job:string,
     *              mobile:string,
     *              email:string,
     *              is_deleted:int 0|1
     *          ],
     *          [
     *              id:int,
     *              lab_id:int,
     *              name:string,
     *              department:string,
     *              job:string,
     *              mobile:string,
     *              email:string,
     *              is_deleted:int 0|1
     *          ] 第二组可选
     *      ],
     *      attachments:array [
     *          [
     *              id:int, id字段如果没有是新增
     *              lab_id:int,
     *              name:string,
     *              url:string,
     *              size:string, 单位MB
     *              is_deleted:int 0|1
     *          ],
     *          [
     *              id:int,
     *              lab_id:int,
     *              name:string,
     *              url:string,
     *              size:string,
     *              is_deleted:int 0|1
     *          ],
     *          ...
     *      ]
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
     * @param string $objectId
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function saveObjectId(int $id, string $objectId): array;

    /**
     * 
     * @param array $params
     * @example:{
     *      page:string|int,
     *      pageSize:string|int,
     *      lab_id:int,
     *      keyword:string,
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
    public function getMaintenanceList(array $params): array;

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
    public function getMaintenance(int $id): array;

    /**
     * 
     * @param array $params
     * @example {
     *      lab_id:int,
     *      name:string,
     *      content:string
     * }
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function createMaintenance(array $params): array;

    /**
     * 
     * @param int $id
     * @param string $content
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function updateMaintenance(int $id, string $content): array;

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
    public function deleteMaintenance(int $id): array;

    /**
     * 
     * @param array $idList
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function batchDeleteMaintenance(array $idList): array;

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
    public function getLabInfo(int $id): array;
}
