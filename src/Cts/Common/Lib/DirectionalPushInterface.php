<?php

declare(strict_types=1);

namespace Cts\Common\Lib;

/**
 * Class DirectionalPushInterface
 *
 * @since 2.0
 */
interface DirectionalPushInterface {

    /**
     *  推送列表
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function list(): array;

    /**
     *  推送详情
     *  @param int $id  推送id
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function detail(int $id): array;

    /**
     *  再次推送
     *  @param array $param 多个参数
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function pushNotification(array $param): array;

    /**
     *  归档
     *  @param array $recordIds
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function filedData(array $recordIds): array;

    /**
     *  获取树形结构
     *  @param int $type  类型0:自助服务，3：视频集锦
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getTree(int $type): array;

    /**
     *  保存并推送
     *  @param array $param
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function savePush(array $param): array;

    /**
     * 自动推送list
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function autoPushList(): array;

    /**
     * 导入excel
     * @param int $type 类型：0:普通推送导入excel，1：自动推送导入excel
     * @param array $excelData  导入的excel数组文件
     * @return array
     */
    public function importExcel(int $type, array $excelData):array ;

}
