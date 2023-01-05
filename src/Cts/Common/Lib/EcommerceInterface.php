<?php

declare(strict_types=1);

namespace Cts\Common\Lib;

/**
 * Class EcommerceInterface
 *
 * @since 2.0
 */
interface EcommerceInterface
{

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
     * @return array
     * @example:{
     *      goods_id:int,
     *      package_id:int,
     *      value_added_service_id:int,
     *      quantity:int
     * }
     *
     */
    public function addGoods(array $params): array;

    /**
     *
     * @param array $params
     * @return array
     * @example:{
     *      goods_id:int,
     *      package_id:int,
     *      value_added_service_id:int,
     *      from_live_stream:int,
     *      quantity:int
     * }
     *
     */
    public function updateQuantity(array $params): array;

    /**
     *
     * @param array $params
     * @return array
     * @example:{
     *      goods_id:int,
     *      package_id:int,
     *      value_added_service_id:int,
     *      from_live_stream:int
     * }
     *
     */
    public function removeGoods(array $params): array;

    /**
     *
     * @param array $params
     * @return array
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
     * @return array
     */
    public function countMyOrder(): array;

    /**
     *
     * @param array $params
     * @return array
     * @example:{
     *      page:int,
     *      pageSize:int,
     *      order_status:int
     * }
     *
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
     * @return array
     * @example {
     *      goods_ids:[1,2],
     *      from_live_stream:0|1
     * }
     *
     */
    public function orderPrepare(array $params): array;

    /**
     *
     * @param array $params
     * @return array
     * @example:{
     *
     * }
     *
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
     * @return array
     * @example {
     *      order_status:int
     *      remark:string
     * }
     *
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
     * @return array
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
     * @return array
     * @example {
     *      company:string,
     *      recipient:string,
     *      mobile:string,
     *      address:string
     * }
     *
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
     * @param int $id
     * @return array
     */
    public function getOrderHistoryList(int $id): array;

    /**
     *
     * @param int $uid
     * @return array
     */
    public function getSobotOrderInfo(int $uid): array;

    /**
     *
     * @param array $params
     * @return array
     */
    public function cacheSobotOrderInfo(array $params): array;

    /**
     *
     * @param int $uid
     * @return array
     */
    public function getSobotOrderDetailInfo(int $uid): array;

    /**
     *
     * @param array $params
     * @return array
     */
    public function cacheSobotOrderDetailInfo(array $params): array;

    /**
     *
     * @param array $params
     * @return array
     * @example {
     *      id:int
     *      keyword:string
     *      page:int
     *      pageSize:int
     *      orderBy:string
     *      direction:string
     * }
     *
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
     * @return array
     * @example {
     *      parent_id:int
     *      category_name:string
     *      template_id:int
     *      image_src:string
     * }
     *
     */
    public function createCategory(array $params): array;

    /**
     * @param array $params
     * @param array
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
     * @return array
     * @example {
     *      category_name:string
     *      image_src:string
     *      template_id:int
     * }
     *
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
     * @return array
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
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function updateGoods(int $goodsId, array $params): array;

    /**
     *
     * @param array $params
     * @return array
     * @example{
     *      goods_id1:int,
     *      goods_id2:int
     * }
     *
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function updateGoodsPriority(array $params): array;

    /**
     *
     * @param array $params
     * @return array
     * @example{
     *      goods_ids:string,
     *      start_time:string,
     *      end_time:string
     * }
     *
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function batchUpdateGoodsLiveTime(array $params): array;

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
     * @return array
     * @example{
     *      template_id:int
     * }
     *
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function getTree(array $params): array;

    /**
     *
     * @param int $goodsType
     * @param int $isPublished
     * @param string $keyword
     *
     * @return array
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function searchGoods(int $goodsType, int $isPublished = 1, string $keyword = ''): array;

    /**
     *
     * @param int $goodsId
     * @param int $isPublished
     *
     * @return array
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function viewGoods(int $goodsId, int $isPublished = 1): array;

    /**
     *
     * @param int $categoryId
     * @return array
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function getNotForSale(int $categoryId): array;

    /**
     *
     * @param array $params
     * @return array
     * @example{
     *      category_id:int
     *      title:string
     *      description:string
     *      banners:array
     * }
     *
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function createNotForSale(array $params): array;

    /**
     *
     * @param int $id
     * @param array $params
     * @return array
     * @example{
     *      category_id:int
     *      title:string
     *      description:string
     *      banners:array
     * }
     *
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function updateNotForSale(int $id, array $params): array;

    /**
     *
     * @param int $categoryId
     * @param int $isPublished
     *
     * @return array
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function viewNotForSale(int $categoryId, int $isPublished = 1): array;

    /**
     *
     * @param array $params
     * @return array
     * @example {
     *      keyword1:string
     *      keyword2:string
     *      page:int
     *      pageSize:int
     *      orderBy:string
     * }
     *
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getSvsSubscribeList(array $params): array;

    /**
     * @param array $params
     * @return array
     * @example:{
     *      category_id:string,
     * }
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function createSvsSubscribeList(array $params): array;

    /**
     * @return array
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function getSvsSubscribeIsExist(): array;

    /**
     *
     * @param array $params
     * @return array
     * @example {
     *      offset:int
     *      limit:int
     *      code:string
     *      name:string
     * }
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function getCoursesFromElearning(array $params): array;

    /**
     *
     * @param array $params
     * @return array
     * @example {
     *      page:int
     *      pageSize:int
     * }
     *
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function getSvsCourseList(array $params): array;

    /**
     *
     * @param array $params
     * @return array
     * @example {
     *      course_ids:string
     * }
     *
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function batchCreateSvsCourses(array $params): array;

    /**
     *
     * @param array $params
     * @return array
     * @example {
     *      course_ids:string
     * }
     *
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function batchDeleteSvsCourses(array $params): array;

    /**
     *
     * @param array $params
     *
     * @return array
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function updateCategoryPriority(array $params): array;

    /**
     * @param array $params
     * @param array
     * @example:{
     *      category_id:int,
     *      goods_id:string
     *      type:int
     *      link:string
     *      linkType:int
     * }
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function createBanners(array $params): array;

    /**
     * @param array $params
     * @param array
     * @example:{
     *      category_id:int,
     *      goods_id:string
     *      type:int
     *      link:string
     *      linkType:int
     *      isDeleted:int
     * }
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function updateBanners(array $params): array;

    /**
     * @param array $params
     * @param array
     * @example:{
     *      category_id:int,
     *      goods_id:string
     *      type:int
     * }
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function getBanners(array $params): array;

    /**
     *
     * @param array $params
     *
     * @return array
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function updateBannersPriority(array $params): array;

    /**
     * @param array $params
     * @param array
     * @example:{
     *      category_id:int,
     *      goods_id:string
     *      is_publish:int
     *      type:int
     * }
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function viewBanners(array $params): array;

    /**
     * @param array $params
     * @param array
     * @example {
     *      page:string|int,
     *      pageSize:string|int,
     *      orderBy:string,
     *      direction:string eg.asc|desc,
     *      type:int,
     * }
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function getRecommend(array $params): array;

    /**
     * @param int $id
     * @param array
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function deleteBanners(int $id): array;

    /**
     * @param array $params
     * @param array
     * @example:{
     *      category_id:int,
     *      goods_id:string
     *      type:int
     * }
     * @example{
     *      status:true|false
     *      data:string,
     *      error:string
     * }
     */
    public function bannerPublished(array $params): array;

    /**
     * @param int $uid
     * @return array
     * @example:{
     *  uid: int
     * }
     *
     * @example{
     *      page_name:string
     *      goods_name:string,
     *      goods_article_number:string
     *      is_live_stream:string
     * }
     */
    public function getCachePageSource(int $uid): array;

    /**
     * @param array $params
     * @return array
     * @example:{
     *      page_source:int,
     *      good_id:int
     * }
     *
     * @example{
     *      status:true|false
     * }
     */
    public function cachePageSource(array $params): array;

    /**
     * @return array
     * @example :{
     *      status:true|false
     *      data:string,
     *      error:string
     */
    public function downloadSVS(): array;

    /**
     * @param int $orderId
     * @param int $status
     * @return array
     * @example:{
     *  orderId: int
     *  status: int
     * }
     * @example :{
     *      status:true|false
     *      data:string,
     *      error:string
     */
    public function payChannelChange(int $orderId, int $status): array;

    /**
     * 获取促销信息
     * @param array $params
     * @return array
     */
    public function getPromotionInfo(array $params): array;

    /**
     * 更新促销信息
     * @param array $params
     * @return array
     */
    public function updatePromotionInfo(array $params): array;

    /**
     * 获取咩有选择的促销信息
     * @param array $params
     * @return array
     */
    public function getUnSelectedPromotionGoodsList(array $params): array;

    /**
     * 添加促销商品
     * @param array $params
     * @return array
     */
    public function addPromotionGoods(array $params): array;

    /**
     * 删除促销商品
     * @param array $params
     * @return array
     */
    public function deletePromotionGoods(array $params): array;

    /**
     * @param array $params
     * @example {
     *      title: string
     *      price_type: int
     *      original_price: float
     *      discount_price: float
     *      min_price: float
     *      max_price: float
     *      img_url: string
     *      link_url: string
     *
     * }
     *
     * @return array
     * @example {
     *      id:int
     * }
     */
    public function createDiscountCart(array $params): array;

    /**
     * @param int $id
     * @return array
     * @example {
     *      id:int
     *      title: string
     *      price_type: int
     *      original_price: float
     *      discount_price: float
     *      min_price: float
     *      max_price: float
     *      img_url: string
     *      sort: int
     *      link_url: string
     *      is_deleted: int
     *      created_at: int
     *      created_by: int
     *      updated_at: int
     *      updated_by: int
     * }
     */
    public function getDiscountCart(int $id): array;


    /**
     * @param array $params
     * @example {
     *      id: int
     *      title: string
     *      price_type: int
     *      original_price: float
     *      discount_price: float
     *      min_price: float
     *      max_price: float
     *      img_url: string
     *      link_url: string
     * }
     *
     * @return array
     * @example {
     *      id:int
     *      title: string
     *      price_type: int
     *      original_price: float
     *      discount_price: float
     *      min_price: float
     *      max_price: float
     *      img_url: string
     *      sort: int
     *      link_url: string
     *      is_deleted: int
     *      created_at: int
     *      created_by: int
     *      updated_at: int
     *      updated_by: int
     * }
     */
    public function editDiscountCart(array $params): array;

    /**
     * @param int $id
     * @return array
     * @example {
     *      id:int
     * }
     */
    public function delDiscountCart(int $id):array;

    /**
     * @param array $params
     * @example {
     *      keyword:string
     *      page:int
     *      pageSize:int
     *      orderBy:string
     *      direction:string eg.asc|desc,
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *          total_num: int
     *          total_pages: int
     *          list: array
     *      ]
     *      error:string
     * }
     */
    public function getListDiscountCart(array $params): array;

    /**
     * @param array $params
     * @example {
     *      id: int
     *      move: up/down
     * }
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *      ]
     *      error:string
     * }
     */
    public function updateDiscountCartSort(array $params): array;

    /**
     * @param array $params
     * @example {
     *      name: string
     *      more_address: string
     * }
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *          id: int
     *
     *      ]
     *      error:string
     * }
     */
    public function createSvsModuleConfigCategory(array $params):array;


    /**
     * @param int $id
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *          id: int
     *	        more_address: string
     *          is_deleted: int
     *          created_at: int
     *          sort: int
     *          created_by: int
     *          updated_at: int
     *          updated_by: int
     *      ]
     *      error:string
     * }
     */
    public function getSvsModuleConfigCategory(int $id):array;

    /**
     * @param array $params
     * @example {
     *      id: int
     *      name: string
     *      more_address: string
     * }
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *          id: int
     *	        more_address: string
     *          is_deleted: int
     *          created_at: int
     *          sort: int
     *          created_by: int
     *          updated_at: int
     *          updated_by: int
     *      ]
     *      error:string
     */
    public function editSvsModuleConfigCategory(array $params):array;

    /**
     * @param array $params
     *      keyword:string
     *      page:int
     *      pageSize:int
     *      orderBy:string
     *      direction:string eg.asc|desc,
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *          total_num: int
     *          total_pages: int
     *          list: array
     *      ]
     *      error:string
     * }
     */
    public function getListSvsModuleConfigCategory(array $params):array;

    /**
     * @param array $params
     * @example {
     *      id: int
     *      move: up/down
     * }
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *      ]
     *      error:string
     * }
     */
    public function updateSvsModuleConfigCategorySort(array $params):array;

    /**
     * @param int $id
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *          id: int
     *      ]
     *      error:string
     * }
     */
    public function delSvsModuleConfigCategory(int $id):array;

    /**
     * @param array $params
     * @example {
     *      module_id: int
     *      title: string
     *      type: int
     *      img_url: string
     *      link_url: string
     *      original_price: int
     *      discount_price: int
     *      min_price: int
     *      max_price: int
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *          id: int
     *      ]
     *      error:string
     * }
     */
    public function createSvsModuleConfigGoods(array $params):array;

    /**
     * @param array $params
     * @example {
     *      status:true|false,
     *      data:[
     *          id: int
     *          title: string
     *          type: int
     *          img_url: string
     *          link_url: string
     *          price_type: int
     *          original_price: int
     *          discount_price: int
     *          min_price: int
     *          max_price: int
     * }
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *          id: int
     *          module_id: int
     *          title: string
     *          type: int
     *          img_url: string
     *          link_url: string
     *          price_type: int
     *          original_price: int
     *          discount_price: int
     *          min_price: int
     *          max_price: int
     *          created_at: int
     *          sort: int
     *          created_by: int
     *          updated_at: int
     *          updated_by: int
     *      ]
     *      error:string
     * }
     */
    public function editSvsModuleConfigGoods(array $params):array;

    /**
     * @param int $id
     * @example {
     *      id: int
     * }
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *          id: int
     *          module_id: int
     *          title: string
     *          type: int
     *          img_url: string
     *          link_url: string
     *          price_type: int
     *          original_price: int
     *          discount_price: int
     *          min_price: int
     *          max_price: int
     *          created_at: int
     *          sort: int
     *          created_by: int
     *          updated_at: int
     *          updated_by: int
     *          room_name: string
     *      ]
     *      error:string
     * }
     */
    public function getSvsModuleConfigGoods(int $id):array;

    /**
     * @param array $params
     * @example {
     *      module_id: int
     *      keyword:string
     *      page:int
     *      pageSize:int
     *      orderBy:string
     *      direction:string eg.asc|desc,
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *          total_num: int
     *          total_pages: int
     *          list: array
     *      ]
     *      error:string
     * }
     */
    public function getListSvsModuleConfigGoods(array $params):array;


    /**
     * @param array $params
     * @example {
     *      id: int
     *      move: up/down
     * }
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *      ]
     *      error:string
     * }
     */
    public function updateSortSvsModuleConfigGoods(array $params):array;

    /**
     * @param int $id
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *          id: int
     *      ]
     *      error:string
     * }
     */
    public function delSvsModuleConfigGoods(int $id):array;


    /**
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *          [
     *          id: int
     *          name: string
     *          page_path: string
     *          ...
     *          ]
     *      ]
     *      error:string
     * }
     */
    public function getSvsAllList(): array;

    /**
     * @param string $title
     * @example {
     *      title: string
     * }
     * @return array
     *
     */
    public function searchAllGoods(string $title): array;

    /**
     * @param array $params
     * @example {
     *      name: string
     *      icon_address: string
     *      jump_url: string
     * }
     * @return array
     * @example {
     *  status:true|false,
     *      data:[
     *          id: int
     *      ]
     *      error:string
     * }
     */
    public function createIndustrySolution(array $params):array;

    /**
     * @param array $params
     * @example {
     *      name: string
     *      icon_address: string
     *      jump_url: string
     * }
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *          id: int
     *	        icon_address: string
     *	        jump_url: string
     *          is_deleted: int
     *          created_at: int
     *          sort: int
     *          created_by: int
     *          updated_at: int
     *          updated_by: int
     *      ]
     *      error:string
     * }
     */
    public function editIndustrySolution(array $params):array;

    /**
     * @param int $id
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *          id: int
     *	        icon_address: string
     *	        jump_url: string
     *          is_deleted: int
     *          created_at: int
     *          sort: int
     *          created_by: int
     *          updated_at: int
     *          updated_by: int
     *      ]
     *      error:string
     * }
     */
    public function getIndustrySolution(int $id):array;

    /**
     * @param array $params
     * @example {
     *      module_id: int
     *      keyword:string
     *      page:int
     *      pageSize:int
     *      orderBy:string
     *      direction:string eg.asc|desc,
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *          total_num: int
     *          total_pages: int
     *          list: array
     *      ]
     *      error:string
     * }
     */
    public function getListIndustrySolution(array $params):array;

    /**
     * @param int $id
     * @example {
     *          id: int
     *          move: up/down
     * }
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *      ]
     *      error:string
     * }
     */
    public function deleteIndustrySolution(int $id):array;

    /**
     * @param array $params
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *          id: int
     *      ]
     *      error:string
     * }
     */
    public function updateSortIndustrySolution(array $params):array;


    /**
     * @param array $params
     * @example {
     *      config_id: int
     *      name: string
     *      content: string
     *      recommend_goods: {
     *              [
     *              id: int
     *              goods_id: int
     *              img_url: string
     *              wechat_work: string
     *              ]
     *      }
     * }
     * @return array
     */
    public function createIndustrySolutionModule(array $params):array;

    /**
     * @param array $params
     * @example {
     *      id: int
     *      name: string
     *      content: string
     *      recommend_goods: {
     *              [
     *              id: int
     *              goods_id: int
     *              img_url: string
     *              wechat_work: string
     *              ]
     *      }
     * }
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *          id: int
     *          name: string
     *          content: string
     *          recommend_goods: {
     *              [
     *              id: int
     *              goods_id: int
     *              img_url: string
     *              wechat_work: string
     *              ]
     *          }
     *      ]
     *      error:string
     * }
     */
    public function editIndustrySolutionModule(array $params):array;


    /**
     * @param int $id
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *          id: int
     *          name: string
     *          content: string
     *          recommend_goods: {
     *              [
     *              id: int
     *              sort: int
     *              goods_id: int
     *              img_url: string
     *              wechat_work: string
     *              ]
     *          }
     *      ]
     *      error:string
     * }
     */
    public function getIndustrySolutionModule(int $id):array;


    /**
     * @param int $id
     * @return array
     */
    public function delIndustrySolutionModule(int $id):array;


    /**
     * @param array $params
     * @example {
     *      id: int
     *      move: up|down
     * }
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *          id: int
     *      ]
     *      error:string
     * }
     */
    public function updateSortIndustrySolutionModule(array $params):array;

    /**
     * @param array $params
     * @example {
     *      config_id: int
     *      keyword:string
     *      page:int
     *      pageSize:int
     *      orderBy:string
     *      direction:string eg.asc|desc,
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *          total_num: int
     *          total_pages: int
     *          list: array
     *      ]
     *      error:string
     * }
     */
    public function getListIndustrySolutionModule(array $params):array;


    /**
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *          published_num: int
     *      ]
     *      error:string
     * }
     */
    public function publishDiscountCart():array;

    /**
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *          published_num: int
     *      ]
     *      error:string
     * }
     */
    public function publishSvsModuleConfig():array;

    /**
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *          published_num: int
     *      ]
     *      error:string
     * }
     */
    public function publishIndustrySolution():array;

    /**
     * @return array
     * @example {
     *      status:true|false,
     *      data: array
     *      error:string
     * }
     */
    public function getSearchHistory():array;

    /**
     * @param array $params
     * @example {
     *      page:int
     *      pageSize:int
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:[
     *          total_num: int
     *          total_pages: int
     *          list: array
     *      ]
     *      error:string
     * }
     */
    public function getApiListSvsModuleConfigCategory(array $params):array;
}
