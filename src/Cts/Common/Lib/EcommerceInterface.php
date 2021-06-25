<?php

declare(strict_types=1);

namespace Cts\Common\Lib;

/**
 * Class EcommerceInterface
 *
 * @since 2.0
 */
interface EcommerceInterface {

    /**
     * 
     * @return array
     */
    public function countMyShoppingCart(): array;

    /**
     * 
     * @return array
     */
    public function getShoppingCartList(): array;

    /**
     * 
     * @param array $params
     * @example:{
     *      goods_id:int,
     *      package_id:int,
     *      value_added_service_id:int,
     *      quantity:int
     * }
     * 
     * @return array
     */
    public function addGoods(array $params): array;

    /**
     * 
     * @param array $params
     * @example:{
     *      goods_id:int,
     *      package_id:int,
     *      value_added_service_id:int,
     *      from_live_stream:int,
     *      quantity:int
     * }
     * 
     * @return array
     */
    public function updateQuantity(array $params): array;

    /**
     * 
     * @param array $params
     * @example:{
     *      goods_id:int,
     *      package_id:int,
     *      value_added_service_id:int,
     *      from_live_stream:int
     * }
     * 
     * @return array
     */
    public function removeGoods(array $params): array;

    /**
     * 
     * @param array $params
     * @example:{
     *      page:int,
     *      pageSize:int,
     *      telphone:string
     *      ContactId:string
     *      ContactName:string
     *      AccountId:string
     *      AccountName:string
     *      order_sn:string
     *      order_status:int
     *      is_locked:int
     *      escrow_trade_no:string
     *      start_date:string
     *      end_date:string
     *      orderBy:string,
     *      direction:string eg.asc|desc,
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
    public function getOrderList(array $params): array;

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
    public function viewOrderDetails(int $id): array;

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
    public function getOrderQrCode(int $id): array;

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
    public function getOrderDetails(int $id): array;

    /**
     * 
     * @param array $params
     * @example:{
     *      page:int,
     *      pageSize:int,
     *      order_status:int
     * }
     * 
     * @return array
     */
    public function getMyOrderList(array $params): array;

    /**
     * 
     * @param int $id
     * @return array
     */
    public function cancelOrder(int $id): array;

    /**
     * 
     * @param array $params
     * @example {
     *      goods_ids:[1,2],
     *      from_live_stream:0|1
     * }
     * 
     * @return array
     */
    public function orderPrepare(array $params): array;

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
    public function createOrder(array $params): array;

    /**
     * 
     * @param int $orderId
     * 
     * @return array
     * @example {
     *      status:true,
     *      data:{
     *          appId: string,
     *          timeStamp: int,
     *          nonceStr: string,
     *          package: string,
     *          signType: string,
     *          paySign: string
     *      }
     * }
     */
    public function orderPay(int $orderId): array;

    /**
     * 
     * @param string $outTradeNo 订单编号
     * @param string $transactionId 微信支付流水号
     * @param string $isSubscribe 是否订阅 Y|N
     * @return array
     */
    public function wechatPaySucceed(string $outTradeNo, string $transactionId, string $isSubscribe): array;

    /**
     * 
     * @param int $id
     * @param array $params
     * @example {
     *      order_status:int
     *      remark:string
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
     * @param array $params
     * @example {
     *      invoice_type:int,
     *      invoice_title:string,
     *      invoice_tax_no:string,
     *      invoice_content:string,
     *      vat_company_address:string,
     *      vat_telphone:string,
     *      vat_bank_name:string,
     *      vat_bank_account:string,
     *      recipient:string,
     *      mobile:string,
     *      address:string,
     *      invoice_remark:string
     * }
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function updateOrderInvoice(int $id, array $params): array;

    /**
     * 
     * @param int $id
     * @param array $params
     * @example {
     *      company:string,
     *      recipient:string,
     *      mobile:string,
     *      address:string
     * }
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function updateOrderShippingAddress(int $id, array $params): array;

    /**
     * 
     * @param int $id
     * @return array
     */
    public function lockOrder(int $id): array;

    /**
     * 
     * @param int $id
     * @param string $sapOrder
     * @return array
     */
    public function setSapOrder(int $id, string $sapOrder): array;

    /**
     * 
     * @param array $params
     * @example {
     *      id:int
     *      keyword:string
     *      page:int
     *      pageSize:int
     *      orderBy:string
     *      direction:string
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getSvsList(array $params): array;

    /**
     * @param int $categoryId
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getCategory(int $categoryId): array;

    /**
     * @param int $goodsId
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getGoods(int $goodsId): array;

    /**
     * @param array $params
     * @example {
     *      parent_id:int
     *      category_name:string
     *      template_id:int
     *      image_src:string
     * }
     * 
     * @return array
     */
    public function createCategory(array $params): array;

    /**
     * @param array $params
     * @example:{
     *      category_id:int,
     *      article_num:string
     *      type:int
     *      name:string
     *      description1:string
     *      description2:string
     *      original_price:string
     *      live_stream_price:string
     *      live_stream_start_time:string
     *      live_stream_end_time:string
     *      is_recommended:int
     *      is_hot:int
     * }
     * @param array
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function createGoods(array $params): array;

    /**
     * 
     * @param int $categoryId
     * @param array $params
     * @example {
     *      category_name:string
     *      image_src:string
     *      template_id:int
     * }
     * 
     * @return array
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function updateCategory(int $categoryId, array $params): array;

    /**
     * 
     * @param int $goodsId
     * @param array $params
     * @example:{
     *      article_num:string
     *      name:string
     *      description1:string
     *      description2:string
     *      original_price:string
     *      live_stream_price:string
     *      live_stream_start_time:string
     *      live_stream_end_time:string
     *      is_recommended:int
     *      is_hot:int
     * }
     * 
     * @return array
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function updateGoods(int $goodsId, array $params): array;

    /**
     *
     * @param int $categoryId
     * 
     * @return array
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function deleteCategory(int $categoryId): array;

    /**
     *
     * @param int $goodsId
     * 
     * @return array
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function deleteGoods(int $goodsId): array;

    /**
     * 
     * @param int $goodsId
     * 
     * @return array
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function getGoodsQrCode(int $goodsId): array;

    /**
     * 
     * @return array
     */
    public function getTopCategory(): array;

    /**
     * 
     * @param array $params
     * @example{
     *      template_id:int
     * }
     * 
     * @return array
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function getTree(array $params): array;

    /**
     * 
     * @param int $goodsId
     * 
     * @return array
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function viewGoods(int $goodsId): array;
}
