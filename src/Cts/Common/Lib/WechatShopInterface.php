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
     *      pid: int,
     *      template_id:int,
     *      catalogue_type:int
     *      template_type:int,
     *      service_group_id:int,
     *      title:string,
     *      sub_title:string,
     *      priority:int,
     *      base_view:int,
     *      base_number_of_wish:int,
     *      is_published:int,
     *      is_replace:int,
     *      replace_link:string,
     *      related_goods_id:array,
     *      aws_img_url:array,
     *      goods_description: {
     *      [
     *          description_title:string,
     *          description_content:string,
     *      ]},
     * 部件号
     *      consumables_part_filters:[
     *              {
     *              filter_key:string
     *              filter_value:array
     *          }]
     *      parts:{
     *          [
     *                  part_number :string,
     *                  price:double,
     *                  part_title:string,
     *                  simple_description:string,
     *                  img_src:string,
     *                  consumables_part_filter:{
     *                  [
     *                      filter_key:string
     *                      filter_value:string
     *                  ]
     *                  goods_description_part:{
     *                  [
     *                      description_title:string,
     *                      description_content:string,
     *                  ]},
     *         ]
     *      }
     *
     * 服务类
     *      package_service:{
     *          [
     *              package_name:string,
     *              price:double,
     *              package_title:string,
     *              simple_description:string,
     *              img_src:array,
     *              goods_description_service:{
     *              [
     *                      description_title:string,
     *                      description_content:string,
     *              ]},
     *  ]
     * }
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
     *  data:string
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
     * @param int $pid
     * @return array
     * @example {
     *  status:true|false,
     *  data:string
     */
    public function updateGoodsPriority(int $goodsId1, int $goodsId2,int $pid):array;


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
     *
     *          [
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
     * }
     * }
     */
    public function getGoodsTemplateList(array $params):array;


    /**
     * @param array $params
     * @example {
     *       Cid: int
     *       id: int
     * }
     * @return array
     * @emample {
     *      status:true|false,
     *      data:{
     *          is_deleted:int
     * }
     */
    public function deleteShopGoods(array $params):array;

    /**
     * @param array $params
     * @example {
     *      goods_id: int,
     *      template_id:int,
     *      catalogue_type:int
     *      template_type:int,
     *      service_group_id:int,
     *      title:string,
     *      sub_title:string,
     *      priority:int,
     *      base_view:int,
     *      base_number_of_wish:int,
     *      is_published:int,
     *      is_replace:int,
     *      replace_link:string,
     *      related_goods_id:array,
     *      aws_img_url:[
     *        {
     *          "id":int,
     *          "url":string
     * }
     * ],
     *      goods_description: {
     *
     *          [
     *          description_id:int
     *          description_title:string,
     *          description_content:string,
     *      ]},
     * 部件号
     *      consumables_part_filters:{[
     *              filter_id:int
     *              filter_key:string
     *              filter_value:array
     *          ]}
     *      parts:{
     *          [
     *                  part_id:int
     *                  part_number :string,
     *                  price:double,
     *                  part_title:string,
     *                  simple_description:string,
     *                  img_src:{
     *                      "img_id":int,
     *                      "src":string
     *                  },
     *                  consumables_part_filter:{
     *                  [
     *                      filter_mapping_id:int
     *                      filter_key:string
     *                      filter_value:string
     *                  ]
     *                  goods_description_part:{
     *                  [
     *                      description_part_id:int
     *                      description_title:string,
     *                      description_content:string,
     *                  ]},
     *         ]
     *      }
     *
     * 服务类
     *      package_service:{
     *          [
     *              package_id:ing
     *              package_name:string,
     *              price:double,
     *              package_title:string,
     *              simple_description:string,
     *              img_src:[
     *               {
     *               "id":int,
     *               "url":string
     *              }
     *              goods_description_service:{
     *              [
     *                      description_package_id:int
     *                      description_title:string,
     *                      description_content:string,
     *              ]},
     *  ]
     * }
     * @return array
     */
    public function updateShopGoods(array $params):array;


    /**
     * @param array $params
     * @example {
     *       page: int
     *       pageSize: int
     *       keyword: string
     *       orderBy: string
     *       direction: string
     *       type: int
     * }
     * @return array
     * @example {
     *
     * }
     */
    public function getShopGoodsList(array $params):array;


    /**
     * @param $goodsId
     * @return array
     * @example {
     *      goods_id: int,
     *      template_id:int,
     *      catalogue_type:int
     *      template_type:int,
     *      service_group_id:int,
     *      title:string,
     *      sub_title:string,
     *      priority:int,
     *      base_view:int,
     *      base_number_of_wish:int,
     *      is_published:int,
     *      is_replace:int,
     *      replace_link:string,
     *      related_goods_id:array,
     *      aws_img_url:[
     *        {
     *          "id":int,
     *          "url":string
     * }
     * ],
     *      goods_description: {
     *
     *          [
     *          description_id:int
     *          description_title:string,
     *          description_content:string,
     *      ]},
     * 部件号
     *      consumables_part_filters:{[
     *              filter_id:int
     *              filter_key:string
     *              filter_value:array
     *          ]}
     *      parts:{
     *          [
     *                  part_id:int
     *                  part_number :string,
     *                  price:double,
     *                  part_title:string,
     *                  simple_description:string,
     *                  img_src:{
     *                      "img_id":int,
     *                      "src":string
     *                  },
     *                  consumables_part_filter:{
     *                  [
     *                      filter_mapping_id:int
     *                      filter_key:string
     *                      filter_value:string
     *                  ]
     *                  goods_description_part:{
     *                  [
     *                      description_part_id:int
     *                      description_title:string,
     *                      description_content:string,
     *                  ]},
     *         ]
     *      }
     *
     */
    public function getShopGoodsDetails($goodsId):array;

    /**
     * @param $goodsId
     * @param int $pid
     * @return array
     *  @example {
     *      pid: int,
     *      template_id:int,
     *      catalogue_type:int
     *      template_type:int,
     *      service_group_id:int,
     *      title:string,
     *      sub_title:string,
     *      priority:int,
     *      base_view:int,
     *      base_number_of_wish:int,
     *      is_published:int,
     *      is_replace:int,
     *      replace_link:string,
     *      related_goods_id:array,
     *      aws_img_url:array,
     *      goods_description: {
     *      [
     *          description_title:string,
     *          description_content:string,
     *      ]},
     * 部件号
     *      consumables_part_filters:[
     *              {
     *              filter_key:string
     *              filter_value:array
     *          }]
     *      parts:{
     *          [
     *                  part_number :string,
     *                  price:double,
     *                  part_title:string,
     *                  simple_description:string,
     *                  img_src:string,
     *                  consumables_part_filter:{
     *                  [
     *                      filter_key:string
     *                      filter_value:string
     *                  ]
     *                  goods_description_part:{
     *                  [
     *                      description_title:string,
     *                      description_content:string,
     *                  ]},
     *         ]
     *      }
     *
     * 服务类
     *      package_service:{
     *          [
     *              package_name:string,
     *              price:double,
     *              package_title:string,
     *              simple_description:string,
     *              img_src:array,
     *              goods_description_service:{
     *              [
     *                      description_title:string,
     *                      description_content:string,
     *              ]},
     *  ]
     * }
     *
     * }
     */
    public function getShopGoodsCopy($goodsId,int  $pid):array;


    /**
     * @param int $goodsId
     * @param int $pid
     * @param int $type
     * @return array
     */
    public function  addShopGoodsMapping(int $goodsId,int  $pid,int $type):array;


    /**
     * 获取单个商品信息
     *
     * @param int $id
     * @return array
     */
    public function getGoodsInfo(int $id):array;
}