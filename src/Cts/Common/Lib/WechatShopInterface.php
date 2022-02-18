<?php

declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace Cts\Common\Lib;

/**
 * Interface WechatShopInterface
 * @since 2.0
 * @package Cts\Common\Lib
 */
interface WechatShopInterface
{
    /**
     * @return array
     * @example {
     *  status:true|false,
     *  data:string
     * }
     */
    public function syncAwsImages():array;


    /**
     * @param int $pid
     * @return array
     * @return array
     * @example {
     *  status:true|false,
     *  data:{
     *      folder:string  => [
     *          id:int,
     *          name:string,
     *          type:int,
     *          level:int,
     *          path:string
     *
     * ]
     * }
     * }
     */
    public function getAwsImages(int $pid):array;

    /**
     * @return array
     * @example {
     *  status:true|false,
     *  data:{
     *      [
     *      id:int,
     *      name:string,
     *      serial_number:string,
     *      created_at:date,
     *      created_by:string,
     *      updated_at:string,
     *      updated_by:string
     *      ]
     *  }
     * }
     */
    public function getServiceGroups():array;


    /**
     * @param array $params
     *  @example {
     *      pid: int
     *
     * }
     * @return array
     * @example {
     *  status:true|false,
     *  data:string
     * }
     */
    public function createShopGoods(array $params):array;

    /**
     * @param array $params
     *  @example {
     *      pid: int,
     *      catalogue_name:string,
     *      type:int,
     *      sid:int
     *
     * }
     * @return array
     * @example {
     *  status:true|false,
     *  data:string
     * }
     */
    public function createShopFolder(array $params):array;


    /**
     * @param array $params
     * @example {
     *      id: int,
     *      catalogue_name:string,
     *      sid:int
     *
     * }
     * @return array
     * @example {
     *  status:true|false,
     *  data:{
     *      id:int,
     *      parent_id:int,
     *      catalogue_name:string,
     *      service_group_id:int,
     *      is_deleted:int,
     *      sort,
     *      type,
     *      created_at:string,
     *      created_by:string,
     *      updated_at:string,
     *      updated_by:string
     * }
     * }
     */
    public function updateShopFolder(array $params):array;


    /**
     * @param int $id
     * @return array
     * @example {
     *  status:true|false,
     *  data:string
     * }
     */
    public function deleteShopFolder(int $id):array;


    /**
     * @param array $params
     * @example {
     *      id: int
     * }
     * @return array
     * @example {
     *  status:true|false,
     *  data:[
     *      id:int,
     *      parent_id:int,
     *      catalogue_name:string,
     *      service_group:[
     *          sid:int,
     *          name:string,
     *      ],
     * ]
     * }
     */
    public function getShopFolderDetails(int $id):array;


    /**
     * @param int $folderId1
     * @param int $folderId2
     * @return array
     * @example {
     *  status:true|false,
     *  data:string
     * }
     */
    public function updatefolderPriority(int $folderId1, int $folderId2):array;

    /**
     * @param int $goodsId1
     * @param int $goodsId2
     * @return array
     * @example {
     *  status:true|false,
     *  data:string
     */
    public function updateGoodsPriority(int $goodsId1, int $goodsId2):array;


    /**
     * @param array $params
     * @example {
     *       id: int
     *       page: int
     *       pageSize: int
     *       keyword: string
     *       orderBy: string
     *       direction: string
     *       type: int
     * }
     * @return array
     * @example {
     *  [
     *      status: true| false
     *      folder_id_path: string
     *      folder_name_path: string
     *      list:[
     *          {
     *              id: int,
     *              parent_id: int,
     *              service_group_id: int,
     *              service_group_name: string,
     *              catalogue_name: string,
     *              type:int,
     *              updated_at: string,
     *              updated_by: string
     *          }
     *      or  商品
     *          {
     *
     *          }
     *      ]
     * ]
     * }
     */
    public function getShopFolderList(array $params):array;


    /**
     * @param array $params
     * @example {
     *      template_alias_name:string
     *      template_type:string
     * }
     * @return array
     * @emample {
     *      status: true| false
     *      data:{
     *          id:int,
     *          template_alias_name:string,
     *          template_type:int,
     *          template_name:string
     *          created_at:string,
     *          created_by:string,
     *          created_at:string,
     *          created_by:string,
     * }
     *
     *
     * }
     */
    public function createGoodsTemplate(array $params):array;


    /**
     * @param array $params
     * @example {
     *      id:int
     *      template_alias_name:string
     * }
     * @return array
     * @emample {
     *      status: true| false
     *      data:0 | 1
     * }
     */
    public function updateGoodsTemplate(array $params):array;

    /**
     * @param int $id
     * @return array
     */
    public function deleteGoodsTemplate(int $id):array;

    /**
     * @param int $id
     * @return array
     *      data:{
     *          id:int,
     *          template_alias_name:string,
     *          template_name:string,
     *          template_type:int,
     *          isDeleted: int,
     *          created_at:string,
     *          created_by:string,
     *          created_at:string,
     *          created_by:string,
     * }
     */
    public function getGoodsTemplate(int $id):array;

    /**
     * @param array $params
     * @example {
     *       page: int
     *       pageSize: int
     *       keyword: string
     *       orderBy: string
     *       direction: string
     *       return_type:int
     * }
     * @return array
     * @emample {
     *      status:true|false,
     *      data:{
     *          total_num:int,
     *          total_pages:int
     *          list: [
     *          id:int,
     *          template_alias_name:string,
     *          template_type:int,
     *          template_name:string,
     *          isDeleted: int,
     *          created_at:string,
     *          created_by:string,
     *          created_at:string,
     *          created_by:string,
     *          ]
     *      }
     *      or
     *
     *      data:{
     *      [
     *          id:int,
     *          template_alias_name:string,
     *          template_type:int,
     *          template_name:string,
     *          isDeleted: int,
     *          created_at:string,
     *          created_by:string,
     *          created_at:string,
     *          created_by:string,
     *          ]
     *      }
     * }
     */
    public function getGoodsTemplateList(array $params):array;

    /**
     * 获取单个商品信息
     *
     * @param int $id
     * @return array
     */
    public function getGoodsInfo(int $id):array;
}
