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
 * Class UserInterface
 *
 * @since 2.0
 */
interface WechatInterface
{

    /**
     * 获取微信用户信息
     * @param array $wechatData
     * @return array
     * @example:{
     *      code:string
     * }
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getUserInfoWithMiniCode(array $wechatData): array;

    /**
     * 微信ad登录回调函数
     * @param array $params
     * @throws \Exception
     * @example :{
     *      code: string,
     *      state: string
     * }
     */
    public function callback(array $params);

    /**
     * 企业微信ad登录
     * @param array $params
     * @throws \Exception
     * @example:{
     *      code:string
     * }
     */
    public function wechatLogin(array $params);

    /**
     * 获取微信用户信息
     * @param array $wechatData
     * @return array
     * @example:{
     *      code:string
     * }
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getUserInfoWithH5Code(array $wechatData): array;

    /**
     * 生成二维码
     * @param array $wechatData
     * @return array
     * @example:{
     *      url:string,
     *      sences:string,
     *      width:int
     * }
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function genCodeImg(array $wechatData): array;

    /**
     * 打包下载csv,media文件
     * @param string $csvUrl
     * @param string $operator
     * @return array
     */
    public function downloadData(string $csvUrl, string $operator): array;

    /**
     *
     * @param $data
     * @return array
     */
    public function userListByHold($data);

    /**
     * 显示下载列表
     * @param $data
     * @return array
     */
    public function getDownloadingList($data);

    /**
     * 显示hold住的员工
     * @return array
     */
    public function getHoldingList();

    /**
     * hold住员工
     * @param $data
     * @return array
     */
    public function holdUser($data);

    /**
     * 释放被hold住的员工
     * @param $data
     * @return array
     */
    public function releaseUser($data);

    /**
     *
     * /**
     * 生成二维码
     * @param array $params
     * @return array
     * @example:{
     *      type:h5|mini,
     * }
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getAccessToken(array $params): array;

    /**
     * 推送消息
     * @param array $params
     * @return array
     * @example:{
     *      uid:XXXX,
     *      template:XXXX,
     *      h5_url:XXXX,
     *      params:["first"=>XXX,"keyword1"=>XXXX,"keyword2"=>XXXX],
     *      miniapp_url:XXXXXX,
     * }
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function pushMessage(array $params): array;

    /**
     * 获取全局会话组
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function getSobotIframeData(array $params): array;

    /**
     * 匹配序列号返回聊天组
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function getGroupMatchSerialNo(array $params): array;

    /**
     * 获取全局会话组
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function getSobotTicketIframeData(array $params): array;

    /**
     * 获取全局会话组
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function getSobotGlobalGroup(): array;

    /**
     * 保存备注
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function saveSobotNote(array $params): array;

    /**
     * 保存聊天组提交的信息
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function saveSobotPostData(array $params): array;

    /**
     * 获取智齿显示的用户信息
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function getSobotUserInfo(array $params): array;

    /**
     * 保存智齿iframe缓存信息
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function saveSobotSrCache(array $params): array;

    /**
     * 保存标签
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function saveTags(array $params): array;

    /**
     * 保存标签
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function saveNotes(array $params): array;

    /**
     * 保存离线记录
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function saveLeaveMsg(array $params): array;

    /**
     *
     * @param array $params
     * @return array
     * @example [
     *      'mini_open_id' => string,
     *      'total_fee' => float,
     *      'order_sn' => string,
     *      'order_name' => string
     * ]
     *
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
    public function wechatPay(array $params): array;

    /**
     *
     * @param array $input
     * @return array
     */
    public function notify(array $input): array;

    /**
     *
     * @param array $params
     * @return array
     * @example {
     *      page_path:string,
     *      sence:string,
     *      prefix:string
     * }
     *
     * @example {
     *      status:true,
     *      date:string S3地址
     * }
     */
    public function genQrCode(array $params): array;

    /**
     *
     * @return array
     * @example {
     *      status:true,
     *      data:[{
     *          id:int,
     *          news:string
     *      }]
     *  }
     */
    public function getScrollingNewsList(): array;

    /**
     *
     * @param int $isPublished
     *
     * @return array
     * @example {
     *      status:true,
     *      data:[{
     *          id:int,
     *          news:string
     *      }]
     *  }
     */
    public function getScrollingNews(int $isPublished): array;

    /**
     *
     * @param array $params
     * @return array
     * @example {
     *      news:string
     * }
     *
     * @example {
     *      status:true,
     *      data:[{
     *          id:int,
     *          news:string
     *      }]
     *  }
     */
    public function createScrollingNews(array $params): array;

    /**
     *
     * @param array $params
     * @return array
     * @example {
     *      news:string
     * }
     *
     * @example {
     *      status:true,
     *      data:{
     *          id:int,
     *          news:string
     *      }
     * }
     */
    public function updateScrollingNews(array $params): array;

    /**
     *
     * @return array
     * @example {
     *      status:bool,
     *      data:array
     * }
     */
    public function getHomePageRoomList(): array;

    /**
     *
     * @param array $params
     * @return array
     * @example {
     *      page:int,
     *      perPageNum:int
     * }
     *
     * @example {
     *      status:bool,
     *      data:array
     * }
     */
    public function getFutureRoomList(array $params): array;

    /**
     *
     * @param array $params
     * @return array
     * @example {
     *      page:int,
     *      perPageNum:int
     * }
     *
     * @example {
     *      status:bool,
     *      data:array
     * }
     */
    public function getHistoryRoomList(array $params): array;

    /**
     * @param int $id 明星主播id
     * @param array $params
     * @return array
     * @example {
     *      page:int,
     *      perPageNum:int
     * }
     *
     * @example {
     *      status:bool,
     *      data:array
     * }
     */
    public function getHighQualityList(int $id, array $params): array;

    /**
     *
     * @param int $id
     *
     * @return array
     * @example {
     *      status:bool,
     *      data:array
     * }
     */
    public function getHighQuality(int $id): array;

    /**
     *
     * @param int $star_id 明星主播id
     * @param array $params
     * @return array
     * @example {
     *      type:int,
     *      room_id:int,
     *      title:string,
     *      cover_src:string
     * }
     *
     * @example {
     *      status:bool,
     *      data:array
     * }
     */
    public function createHighQuality(int $star_id, array $params): array;

    /**
     *
     * @param int $id
     * @param array $params
     * @return array
     * @example {
     *      type:int,
     *      room_id:int,
     *      title:string,
     *      cover_src:string
     * }
     *
     * @example {
     *      status:bool,
     *      data:array
     * }
     */
    public function updateHighQuality(int $id, array $params): array;

    /**
     *
     * @param int $id 当前id
     * @param array $params
     * @return array
     * @example {
     *      id1:int,
     *      id2:int
     * }
     *
     * @example {
     *      status:bool,
     *      data:array
     * }
     */
    public function updateHighQualityPriority(int $id, array $params): array;

    /**
     *
     * @param int $id
     * @return array
     * @example {
     *      status:bool,
     *      data:array
     * }
     */
    public function deleteHighQuality(int $id): array;

    /**
     *
     * @return array
     * @example {
     *      status:bool,
     *      data:array
     * }
     */
    public function publishHighQuality(int $starId): array;

    /**
     *
     * @param array $params
     * @return array
     * @example {
     *      page:int,
     *      perPageNum:int
     * }
     *
     * @example {
     *      status:true,
     *      data:[{
     *          "room_id": 1,
     *          "name": "测试elearning",
     *          "cover_img": "http://mmbiz.qpic.cn/mmbiz_jpg/bM0UsH62An5ky8KQVp6XkiadjouLdr0Aam4uqtszDV3NBnibfarZ6GZy5Y1DPmBEfq7PcOKvUq1mqibBEqYTgXAUA/0",
     *          "start_time": 1608798988,
     *          "end_time": 1608800200,
     *          "anchor_name": "sunny",
     *          "live_status": 103,
     *          "share_img": "http://mmbiz.qpic.cn/mmbiz_jpg/bM0UsH62An5ky8KQVp6XkiadjouLdr0AaEibOGDLvRgCOLoUcZEoxoibAq1SDJxEX3FyphicKIcqONDqyn6nIfryxw/0",
     *          "live_type": 0,
     *          "close_like": 0,
     *          "close_goods": 0,
     *          "close_comment": 0,
     *          "close_kf": 0,
     *          "close_replay": 1,
     *          "is_feeds_public": 1,
     *          "creater_openid": "oX9MCcQDfvtYA8nYxQzTCApDQvQQ",
     *          "feeds_img": "http://mmbiz.qpic.cn/mmbiz_jpg/bM0UsH62An5ky8KQVp6XkiadjouLdr0Aadq6HAWNpd0ekFEjZvVYY929LM6OicFHzXuoxnyIoBBceBo3hITv2UAw/0"
     *      }]
     * }
     */
    public function getRoomList(array $params): array;

    /**
     *
     * @param int $id
     * @param array $params
     * @return array
     * @example {
     *      custom_description:string
     * }
     *
     */
    public function updateRoom(int $id, array $params): array;

    /**
     *
     * @param array $params
     * @return array
     * @example {
     *      room_ids:string,
     *      custom_status:int
     * }
     *
     * @example {
     *      status:bool,
     *      data:array
     * }
     */
    public function batchSetRoomCustomStatus(array $params): array;

    /**
     *
     * @return array
     * @example {
     *      status:bool,
     *      data:array
     * }
     */
    public function publishScrollingNewsAndRooms(): array;

    /**
     *
     * @param array $params
     * @return array
     * @example [
     *    "name" => "",
     *    "coverImg" => "",
     *    "startTime" => 1,
     *    "endTime" => 1,
     *    "anchorName" => "",
     *    "anchorWechat" => "",
     *    "subAnchorWechat" => "",
     *    "createrWechat" => "",
     *    "shareImg" => "",
     *    "feedsImg" => "",
     *    "isFeedsPublic" => 0,
     *    "type" => 0,
     *    "closeLike" => 0,
     *    "closeGoods" => 0,
     *    "closeComment" => 0,
     *    "closeReplay" => 0,
     *    "closeShare" => 0,
     *    "closeKf" => 0
     * ]
     *
     * @example {
     *      status:true,
     *      data:[{
     *          "roomId": 33,
     *          "errcode": 0,
     *          "qrcode_url": "https://res.wx.qq.com/op_res/9rSix1dhHfK4rR049JL0PHJ7TpOvkuZ3mE0z7Ou_Etvjf-w1J_jVX0rZqeStLfwh"
     *          }
     *      ]
     */
    public function createRoom(array $params): array;

    /**
     * @param array $params
     * @return array
     * @example [
     *      "id":=>62
     *  ]
     *
     * @example [
     *      status:true,
     *      data:{}
     *  ]
     *
     *
     * */
    public function deleteRoom(array $params): array;

    /**
     * @param array $params
     * @return array
     * @example [
     *    "id" => 23
     *    "name" => "",
     *    "coverImg" => "",
     *    "startTime" => 1,
     *    "endTime" => 1,
     *    "anchorName" => "",
     *    "anchorWechat" => "",
     *    "shareImg" => "",
     *    "feedsImg" => "",
     *    "isFeedsPublic" => 0,
     *    "closeLike" => 0,
     *    "closeGoods" => 0,
     *    "closeComment" => 0,
     *    "closeReplay" => 0,
     *    "closeShare" => 0,
     *    "closeKf" => 0
     *  ]
     *
     * @example [
     *      status:true,
     *      data:{}
     *  ]
     * */
    public function editRoom(array $params): array;

    /**
     * @param array $params
     * @return array
     * @example [
     *      "roomId" => 62
     *  ]
     *
     * @example {
     *      status:true,
     *      data:{
     *          "pushAddr": "rtmp://wxalivepush.weixin.qq.com/live/wx40f8626ddf43d362-6209?txSecret=5da4f0b7b7a6c25b238311de8c81a65a&txTime=5fc4f631"
     *      }
     *  }
     * */
    public function getPushUrl(array $params): array;

    /**
     * @param array $params
     * @return array
     * @example [
     *      "ids" => [1150,1111],
     *      "roomId" => 15
     *  ]
     *
     * @example {
     *      status:true,
     *      data:[]
     *  }
     * */
    public function roomAddGoods(array $params): array;

    /**
     * @param array $params
     * @return array
     * @example [
     *      "params" => encodeURIComponent(JSON.stringify(custom_params)),
     *      "roomId" => 15
     *  ]
     *
     * @example {
     *      status:true,
     *      data:[
     *          "cdnUrl": "http://mmbiz.qpic.cn/mmbiz_jpg/FVribAGdErI2jhO1hbzVDH1E5LW7VQ9D1SIvTLFmyYwkIUucJqE72icgAj6NYw92kbJRNV0zwnGZWaO0Y8T0vqlg/0", // 分享二维码
     *          "pagePath": "plugin-private://wx2b03c6e691cd7370/pages/live-player-plugin?room_id=6209", // 分享路径
     *          "posterUrl": "http://mmbiz.qpic.cn/mmbiz_jpg/dlFudV139LtQn96YNHSGtVfcUkUwQaYeR5OiaJ6bPr7OZxy3yhIK3icjxop0QeRBiaDPiaxuzENtCj15zFIM8sh7ag/0", // 分享海报
     *      ]
     *  }
     * */
    public function getSharedCode(array $params): array;

    /**
     *
     * @param array $params
     * @return array
     * @example [
     *      'cover_img_url' => '',
     *      'name' => '',
     *      'price_type' => '',
     *      'price' => 0,
     *      'price2' => 0,
     *      'url' => '',
     *      'third_patry_appid' => ''
     * ]
     *
     * @example {
     *      status:true,
     *      data:{
     *          "goods_id": 1
     *      }
     * }
     */
    public function goodsAddToStore(array $params): array;

    /**
     *
     * @param array $params
     * @return array
     * @example [
     *      'cover_img_url' => '',
     *      'name' => '',
     *      'price_type' => '',
     *      'price' => 0,
     *      'price2' => 0,
     *      'url' => '',
     *      'third_patry_appid' => ''
     * ]
     *
     * @example {
     *      status:true,
     *      data:{
     *          "goods_id": 1,
     *          "audit_id": 1
     *      }
     * }
     */
    public function goodsAdd(array $params): array;

    /**
     *
     * @param array $params
     * @return array
     * @example [
     *      'goods_id' => 1,
     *      'audit_id' => 1
     * ]
     *
     * @example {
     *      status:true,
     *      data:{}
     * }
     */
    public function goodsResetAudit(array $params): array;

    /**
     *
     * @param array $params
     * @return array
     * @example [
     *      'goods_id' => 1
     * ]
     *
     * @example {
     *      status:true,
     *      data:{
     *          "audit_id": 1
     *      }
     * }
     */
    public function goodsAudit(array $params): array;

    /**
     *
     * @param array $params
     * @return array
     * @example [
     *      'goods_id' => 1
     * ]
     *
     * @example {
     *      status:true,
     *      data:{}
     * }
     */
    public function goodsDelete(array $params): array;

    /**
     *
     * @param array $params
     * @return array
     * @example [
     *      'goods_id' => 1,
     *      'cover_img_url' => '',
     *      'name' => '',
     *      'price_type' => '',
     *      'price' => 0,
     *      'price2' => 0,
     *      'url' => '',
     *      'third_patry_appid' => ''
     * ]
     *
     * @example {
     *      status:true,
     *      data:{}
     * }
     */
    public function goodsUpdate(array $params): array;

    /**
     *
     * @param array $goodsIds
     * @return array
     * @example [1,2,3...]
     *
     * @example {
     *      status:true,
     *      data:{
     *          "goods_list": []
     *      }
     * }
     */
    public function getGoodsWarehouse(array $goodsIds): array;

    /**
     *
     * @param array $params
     * @return array
     * @example [
     *      'offset' => 0,
     *      'limit' => 30,
     *      'audit_status' => 0
     * ]
     *
     * @example {
     *      status:true,
     *      data:{
     *          "total": 1
     *          "goods_list": []
     *      }
     * }
     */
    public function getApprovedGoods(array $params): array;

    /**
     *
     * @param array $params
     * @return array
     * @example [
     *      'page' => 1,
     *      'pageSize' => 10,
     *      'keyword' => '新城',
     *      'direction'=> 'desc',
     *      'orderBy'=> 'uid',
     * ]
     *
     * @example {
     *      status:true,
     *      data:{
     *          "total_num": 10,
     *          "total_pages":3,
     *          "list": []
     *      }
     * }
     */
    public function getSubscriberList(array $params): array;

    /**
     *
     * @param array $params
     * @return array
     * @example [
     *      'room_id' => 1,
     *      'user_openid' => ['a','b']
     * ]
     *
     * @example {
     *      status:true,
     *      data:{
     *          "message_id": 0
     *      }
     * }
     */
    public function subscribedPushMessage(array $params): array;

    /**
     *
     * @param string $type
     * @param string $tempPath
     * @param string $fileName
     *
     * @return array
     * @example {
     *      status:true,
     *      data:{
     *          "media_id": ''
     *      }
     * }
     */
    public function mediaUpload(string $type, string $tempPath, string $fileName): array;

    /**
     * 一键推送所有订阅用户
     * @param array $params
     * @return array
     * @example [
     *      'room_id' => 1,
     *      'keyword' => ['广发银行']
     * ]
     *
     * @example {
     *      status:true,
     *      data:{
     *          "message_id": 0
     *      }
     * }
     * or
     * {
     *      status:true,
     *      data:{
     *          "message_id": [0,1]
     *      }
     * }
     *
     */
    public function allSubscribedPushMessage(array $params): array;

    /**
     * @param array $params
     * @return array
     * @example [
     *      "params" => encodeURIComponent(JSON.stringify(custom_params)),
     *      "roomId" => 15
     *  ]
     *
     * @example {
     *      status:true,
     *      data:[
     *           "errcode"=>  0,  //微信返回的状态码
     *           "errmsg"=> "ok",  //微信返回的错误信息
     *          "openlink"=> Scheme, //ticket码
     *          ]
     * ]
     */

    /**
     * @param $path
     * @param $query
     * @param bool $isExpire
     * @param int $expireTime
     * @return array
     */
    public function urlSchemeGenerate(string $path, string $query, bool $isExpire = false, int $expireTime = 0): array;

    /**
     * 企业微信登录通过
     *
     * @return array
     * @example {
     *      status:true,
     * ]
     */
    public function LoginInEnterpriseWechat($userId): array;

    /**
     * 获取用户sobot未读消息的数量
     * @param $data
     * @return array
     */
    public function getSobotUnreadMessageCount($data): array;

    /**
     * 用户加入SOBOT聊天
     * @param $data
     * @return array
     */
    public function joinSobotChat($data): array;

    /**
     * 用户离开SOBOT聊天
     * @param $data
     * @return array
     */
    public function leaveSobotChat($data): array;

    /**
     * 用 redis 保存一份mini_openid和cid(sobot会话ID)的对应关系
     * 用于进一步查询SOBOT未读消息
     * @param $data
     * @return mixed
     */
    public function saveMiniopenidCidForUnreadMessage($data);


    /**
     * 订阅用户导出
     * @param array $params
     * @return array
     * @example {
     *  room_id:int
     *  keyword:start
     * }
     * @example {
     *       room_id:int,
     *       name:string,
     *       subscribe_time:string,
     *       mini_open_id:string,
     *       telphone:string,
     *       ContactName,
     *       AccountName,
     *       nickname,
     * }
     */
    public function subscriberExport(array $params): array;


    /**
     * 检查公司名称是否修改
     *
     * @param array $params
     * @return array
     */
    public function checkCompanyDiff(array $params): array;

    /**
     * 获取用户基本信息
     * @param array $userData
     * @return array
     * @example:{
     *      open_id:string
     * }
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getUserInfoFromOpenid(array $userData): array;

    /**
     *
     * @param array $params
     * @return array
     */
    public function getLeaveMessageList(array $params): array;

    /**
     *
     * @param array $params
     * @return array
     */
    public function updateLeaveMessageStatus(array $params): array;

    /**
     * 根据客户组获取客户组名称
     *
     * @param int $groupId
     * @return array
     */
    public function getServiceShop(int $groupId): array;

    /**
     * 所有客户组列表
     *
     * @return array
     */
    public function getServiceShopAll(): array;

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
    public function getServiceGroups(): array;

    /**
     * @param string $groupName
     * @return array
     */
    public function getGroupId(string $groupName): array;

    /**
     * @param int $groupId
     * @return array
     */
    public function getGroupById(int $groupId): array;

    /**
     * 创建明星主播
     * @param array $params
     * @return array
     */
    public function createStar(array $params): array;

    /**
     * 获取明星主播数据
     * @param int $id
     * @return array
     */
    public function getStar(int $id): array;

    /**
     * 获取明星主播列表
     * @param array $params
     * @return array
     */
    public function getStarList(array $params): array;

    /**
     * 更新明星主播
     * @param int $id
     * @param array $params
     * @return array
     */
    public function updateStar(int $id, array $params): array;

    /**
     * 删除明星主播
     * @param int $id
     * @return array
     */
    public function deleteStar(int $id): array;

    /**
     * 修改明星主播排序
     * @param int $id
     * @param array $params
     * @return array
     */
    public function updateStarPriority(int $id, array $params): array;

    /**
     * @param string $json
     * @return array
     */
    public function handlewechatMessage(string $json):array;

	  /**
     * @param int $idList
     * @return array
     *
     */
    public function getRoomByRoomId(array $idList):array;}
