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
interface WechatShopInterface {

    /**
     * @return array
     * @example {
     *  status:true|false,
     *  data:string
     * }
     */
    public function syncAwsImages(): array;

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
    public function getAwsImages(int $pid): array;

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
    public function createShopGoods(array $params): array;

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
    public function createShopFolder(array $params): array;

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
    public function updateShopFolder(array $params): array;

    /**
     * @param int $id
     * @return array
     * @example {
     *  status:true|false,
     *  data:string
     * }
     */
    public function deleteShopFolder(int $id): array;

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
    public function getShopFolderDetails(int $id): array;

    /**
     * @param int $folderId
     * @param string $move
     * @return array
     * @example {
     *  status:true|false,
     *  data:string
     */
    public function updatefolderPriority(int $folderId, string $move): array;

    /**
     * @param int $goodsId
     * @param string $move
     * @param int $pid
     * @return array
     * @example {
     *  status:true|false,
     *  data:string
     */
    public function updateGoodsPriority(int $goodsId, string $move, int $pid): array;

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
    public function getShopFolderList(array $params): array;

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
    public function createGoodsTemplate(array $params): array;

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
    public function updateGoodsTemplate(array $params): array;

    /**
     * @param int $id
     * @return array
     */
    public function deleteGoodsTemplate(int $id): array;

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
    public function getGoodsTemplate(int $id): array;

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
    public function getGoodsTemplateList(array $params): array;

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
    public function deleteShopGoods(array $params): array;

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
    public function updateShopGoods(array $params): array;

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
    public function getShopGoodsList(array $params): array;

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
    public function getShopGoodsDetails($goodsId): array;

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
    public function getShopGoodsCopy($goodsId, int $pid): array;

    /**
     * @param int $goodsId
     * @param int $pid
     * @param int $type
     * @return array
     */
    public function addShopGoodsMapping(int $goodsId, int $pid, int $type): array;

    /**
     * 获取单个商品信息
     *
     * @param int $id
     * @param int $partId
     * @param int $packageId
     * @return array
     */
    public function getGoodsInfo(int $id, int $partId, int $packageId): array;

    /**
     * @param int $goodsId
     * @return array
     * @emample {
     *      status:true|false,
     *      data:[
     *         {
     *             id:int,
     *             goods_id:int,
     *             type:int,
     *             part_package_id:int,
     *             modify_place:string,
     *             modify_before:string,
     *             modify_after:string,
     *             created_at:string,
     *             created_by:string,
     *             updated_at:string,
     *             updated_by:string,
     * }
     * ]
     */
    public function getShopGoodsHistory(int $goodsId): array;

    /**
     * get hotspot goods list
     * @param array $params
     * @return array
     */
    public function getHotspotGoodsList(array $params): array;

    /**
     * get hotspot goods info by id
     * @param int $id
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getHotspotGoods(int $id): array;

    /**
     * get goods info before create or update
     * @return array
     */
    public function getGoodsLists(): array;

    /**
     * createHotspotGoods
     * @param array $params
     * @example {
     *      goodsId:string,
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function createHotspotGoods(array $params): array;

    /**
     * updateHotspotGoods
     * @param int $id
     * @param array $params
     * @example {
     *      goodsId:string,
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function updateHotspotGoods(int $id, array $params): array;

    /**
     * updateHotspotGoodsOrder
     * @param int $id
     * @param array $params
     * @example {
     *      hotsOrder:string|int,
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function updateHotspotGoodsOrder(int $id, array $params): array;

    /**
     * deleteHotspotGoods
     * @param int $id
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function deleteHotspotGoods(int $id): array;

    /**
     * 搜索商品search goods
     *
     * @param array $params
     * @return array
     */
    public function searchXsGoods(array $params): array;

    /**
     * 添加商品
     *
     * @param array $data
     * @return array
     */
    public function addGoods(array $data): array;

    /**
     * @param array $params
     * @return mixed
     * @example {
     *        status:true|false,
     *        data:[
     *          {
     *
     *      }
     * }
     */
    public function shopCatalogueGoodsList(array $params): array;

    /**
     * @param int $catalogueId
     * @return mixed
     * @example {
     *        status:true|false,
     *        data:[
     *          {
     *
     *      }
     * }
     */
    public function shopCatalogueListRecursion(int $catalogueId): array;

    /**
     * @param int $catalogueId
     * @param int $type
     * @return mixed
     * @example {
     *        status:true|false,
     *        data:[]
     */
    public function shopCatalogueLists(int $catalogueId, int $type): array;

    /**
     * @param $params
     * @return mixed
     * @example {
     *        status:true|false,
     *        data:[
     *          {
     *
     *      }
     * }
     */
    public function shopGoodsListRecursion($params): array;

    /**
     * @param int $goodsId
     * @return array
     * @example {
     *        status:true|false,
     *        data:[
     *          {
     *      }
     * }
     */
    public function getShopGoods(int $goodsId): array;

    /**
     * @param $params
     * @return array
     * @example {
     *        status:true|false,
     *        data:[
     *          {
     *      }
     * }
     */
    public function selectPart($params): array;

    /**
     * @param int $id
     * @return array
     * @example {
     *        status:true|false,
     *        data:[
     *          {
     *      }
     * }
     */
    public function getGoodsPackage(int $id): array;

    /**
     * 感兴趣商品
     *
     * @param int $parentId
     * @param string $customer
     * @return array
     */
    public function interestGoods(int $parentId, string $customer): array;

    /**
     * @param array $params
     * @return array
     * @example {
     *        status:true|false,
     *        data:[
     *          {
     *      }
     * }
     */
    public function getWechatHotspotGoods(array $params): array;

    /**
     * 搜索历史
     *
     * @param int $groupId
     * @return array
     */
    public function searchHistory(): array;

    /**
     * 大家都在搜
     *
     * @return array
     */
    public function search(): array;

    /**
     * @return array
     */
    public function getPopGoods(): array;

    /**
     * @param array $params
     * @return array
     */
    public function CreatOrUpdatePopGoods(array $params): array;

    /**
     * @return array
     * @example {
     *        status:true|false,
     *        data:[
     *          {
     *      }
     * }
     */
    public function getPopGoodsWechat(): array;

    /**
     * @param array $params
     * @return array
     */
    public function getSearchList(array $params): array;

    /**
     * @param array $params
     * @return array
     */
    public function createSearch(array $params): array;

    /**
     * @param int $id
     * @param array $params
     * @return array
     */
    public function updateSearch(int $id, array $params): array;

    /**
     * @param int $id
     * @param array $params
     * @return array
     */
    public function searchOrder(int $id, array $params): array;

    /**
     * @param int $id
     * @return array
     */
    public function deleteSearch(int $id): array;

    /**
     * 所有客户组列表
     *
     * @param array $params
     * @return array
     */
    public function getInterestConfigList(array $params): array;

    /**
     * 添加感兴趣
     *
     * @param array $params
     * @return array
     */
    public function addInterestConfig(array $params): array;

    /**
     * @param int $id
     * @return mixed
     * @example {
     *        status:true|false,
     *        data:string
     */
    public function incrementActualView(int $id): array;

    /**
     * 修改感兴趣
     *
     * @param int $id
     * @param array $params
     * @return array
     */
    public function updateInterestConfig(int $id, array $params): array;

    /**
     * 删除感兴趣
     *
     * @param int $id
     * @return array
     */
    public function deleteInterest(int $id): array;

    /**
     * 批量发布商品
     *
     * @return array
     */
    public function batchGoods(): array;

    /**
     * 心愿单列表
     *
     * @param array $params
     * @return array
     */
    public function wishList(array $params): array;

    /**
     * 添加心愿单
     *
     * @param array $params
     * @return array
     */
    public function addWishList(array $params): array;

    /**
     * 删除心愿单
     *
     * @param int $id
     * @return array
     */
    public function deleteWishList(int $id): array;

    /**
     * 批量删除心愿单
     *
     * @param array $ids
     * @return array
     */
    public function batchDeleteWish(array $ids): array;

    /**
     * 批量导出商品excel
     * @return array
     */
    public function goodsExcelExport(): array;

    /**
     * 获取分类名和客服组名
     *
     * @param int $type
     * @return array
     */
    public function getCategoryAndGroup(int $type): array;

    /**
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function goodsExcelImport(array $excelData): array;

    /**
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     *
     */
    public function folderExcelExport(): array;

    /**
     * @param $excelData
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function folderExcelImport($excelData): array;

    /**
     * @param int $goodsId
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *              [
     *                     part_number:string,
     *                     price:string,
     *              ],
     *              [
     *                     part_number:string,
     *                     price:string,
     *              ],
     *          ],
     *      error:string
     * }
     */
    public function getPartPriceList(int $goodsId): array;

    /**
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *             name:string
     *          ],
     *      error:string
     * }
     */
    public function getJumpType(): array;

    /**
     * 
     * @param int $associateId
     * @param array $partNumberList
     * @return array
     */
    public function transactionRecord(int $associateId, array $partNumberList): array;

    /**
     * 
     * @param array $partNumberList
     * @return array
     */
    public function cachePartNumberList(array $partNumberList): array;

    /**
     * 
     * @return array
     */
    public function getCachedPartNumberList(): array;

    /**
     * 
     * @param array $partNumberList
     * @return array
     */
    public function deleteCachedPartNumber(array $partNumberList): array;

    /**
     * @param $uniqueNumber
     * @return mixed
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function goodsExcelImportStatus(string $uniqueNumber): array;
}
