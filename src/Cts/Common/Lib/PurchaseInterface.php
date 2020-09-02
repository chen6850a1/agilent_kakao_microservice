<?php

declare(strict_types=1);

namespace Cts\Common\Lib;

/**
 * Class ReservationInterface
 *
 * @since 2.0
 */
interface PurchaseInterface {

    /**
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getPurchaseList(): array;

    /**
     * @param string $name  菜单名称
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function isExistMenuName($name): array;

    /**
     *
     * 获取菜单列表
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getMenuList(array $params): array;

    /**
     * 添加菜单
     * @param array $params
     * @example {
     *      pmenu_name:string,   菜单名
     *      pmenu_title:file,   菜单主标题
     *      pmenu_subtitle:string  菜单副标题
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function addMenu(array $params): array;

    /**
     * 编辑菜单
     * @param int $id  菜单id
     * @param array $params
     * @example {
     *      pmenu_name:string,   菜单名
     *      pmenu_title:file,   菜单主标题
     *      pmenu_subtitle:string  菜单副标题
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function editMenu(int $id, array $params): array;

    /**
     *  删除菜单
     * @param int $id
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function delMenu(int $id): array;

    /**
     * 是否存在产品名称
     * @param string $name
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function isExistProductName($name): array;

    /**
     *
     * 获取产品list
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getProductList(array $params): array;

    /**
     *
     * 添加产品
     * @param array $params
     * @example {
     *      show_type:int,   展示类型：1，仅图片，0，非图片
     *      pmenu_id:int,   菜单id
     *      product_name:string  产品名称
     *      product_name:string  产品名称
     *      product_detail_img:string  产品详情图片url
     *      product_img:string  产品图片url
     *      product_desc:string  产品描述
     *      promotion:string  促销方案
     *      product_link:string  产品链接跳转至h5
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function addProduct(array $params): array;

    /**
     * 编辑产品
     * @param int $id  产品id
     * @param array $params
     * @example {
     *      pmenu_id:int,   菜单id
     *      product_id:int,   产品id
     *      show_type:int,   展示类型：1，仅图片，0，非图片
     *      product_name:string,   产品名称
     *      product_detail_img:string,   产品详情图片url
     *      product_img:string  产品图片url
     *      product_desc:string  产品详情
     *      promotion:string  促销
     *      product_link:string  商品链接跳转到h5
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function editProduct(int $id, array $params): array;

    /**
     *  删除产品
     * @param int $id
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function delProduct(int $id): array;

    /**
     * 获取单个产品信息
     * @param int $id
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getProductInfo(int $id): array;
}
