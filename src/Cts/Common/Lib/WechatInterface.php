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
interface WechatInterface {

    /**
     * 获取微信用户信息
     * @param array $wechatData
     * @example:{
     *      code:string
     * }
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getUserInfoWithMiniCode(array $wechatData): array;

    /**
     * 获取微信用户信息
     * @param array $wechatData
     * @example:{
     *      code:string
     * }
     * @return array
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
     * @example:{
     *      url:string,
     *      sences:string,
     *      width:int
     * }
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function genCodeImg(array $wechatData): array;

    /**
     * 生成二维码
     * @param array $params
     * @example:{
     *      type:h5|mini,
     * }
     * @return array
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
     * @example:{
     *      uid:XXXX,
     *      template:XXXX,
     *      h5_url:XXXX,
     *      params:["first"=>XXX,"keyword1"=>XXXX,"keyword2"=>XXXX],
     *      miniapp_url:XXXXXX,
     * }
     * @return array
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
     * @example ['total_fee' => float]
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
    public function wechatPay(array $params): array;

    /**
     * 
     * @param array $input
     * @return array
     */
    public function notify(array $input): array;

    /**
     * 
     * @param int $start
     * @param int $limit
     * 
     * @return array
     * @example {
     *      status:true,
     *      data:[{
     *          "name": "测试elearning",
     *          "cover_img": "http://mmbiz.qpic.cn/mmbiz_jpg/bM0UsH62An5ky8KQVp6XkiadjouLdr0Aam4uqtszDV3NBnibfarZ6GZy5Y1DPmBEfq7PcOKvUq1mqibBEqYTgXAUA/0",
     *          "start_time": 1608798988,
     *          "end_time": 1608800200,
     *          "anchor_name": "sunny",
     *          "roomid": 1,
     *          "goods": [],
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
    public function getRoomList(int $start = 0, int $limit = 10): array;

    /**
     * 
     * @param int $roomId
     * @param int $start
     * @param int $limit
     * 
     * @return array
     * @example {
     *      status:true,
     *      data:[{
     *          "create_time": "2020-12-24T09:06:42Z",
     *          "expire_time": "2021-12-24T09:06:42Z",
     *          "media_url": "http://1258344707.vod2.myqcloud.com/1b87576bvodcq1258344707/f3ed75185285890811744904789/playlist_eof.m3u8"
     *      },
     *      {
     *          "create_time": "2020-12-24T08:56:43Z",
     *          "expire_time": "2021-12-24T08:56:43Z",
     *          "media_url": "http://1258344707.vod2.myqcloud.com/1b87576bvodcq1258344707/3813d28f5285890811745578160/f0.mp4"
     *      }]
     * }
     */
    public function getReplay(int $roomId = 0, int $start = 0, int $limit = 10): array;

    /**
     * 
     * @param array $params
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
     * @return array
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
     * @example [
     *      "id":=>62
     *  ]
     * 
     * @return array
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
     * @return array
     * @example [
     *      status:true,
     *      data:{}
     *  ]
     * */
    public function editRoom(array $params): array;

    /**
     * @param array $params
     * @example [
     *      "roomId" => 62
     *  ]
     *
     * @return array
     * @example {
     *      status:true,
     *      data:{
     *          "pushAddr": "rtmp://wxalivepush.weixin.qq.com/live/wx40f8626ddf43d362-6209?txSecret=5da4f0b7b7a6c25b238311de8c81a65a&txTime=5fc4f631"
     *      }
     *  }
     * */
    public function getPushUrl(array $params): array;

    /**
     * 
     * @param array $params
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
     * @return array
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
     * @return array
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
     * @example [
     *      'goods_id' => 1,
     *      'audit_id' => 1
     * ]
     * 
     * @return array
     * @example {
     *      status:true,
     *      data:{}
     * }
     */
    public function goodsResetAudit(array $params): array;

    /**
     * 
     * @param array $params
     * @example [
     *      'goods_id' => 1
     * ]
     * 
     * @return array
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
     * @example [
     *      'goods_id' => 1
     * ]
     * 
     * @return array
     * @example {
     *      status:true,
     *      data:{}
     * }
     */
    public function goodsDelete(array $params): array;

    /**
     * 
     * @param array $params
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
     * @return array
     * @example {
     *      status:true,
     *      data:{}
     * }
     */
    public function goodsUpdate(array $params): array;

    /**
     * 
     * @param array $goodsIds
     * @example [1,2,3...]
     * 
     * @return array
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
     * @example [
     *      'offset' => 0,
     *      'limit' => 30,
     *      'audit_status' => 0
     * ]
     * 
     * @return array
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
     * @example [
     *      'limit' => 200,
     *      'page_break' => 0
     * ]
     * 
     * @return array
     * @example {
     *      status:true,
     *      data:{
     *          "page_break": 0
     *          "subscribers": []
     *      }
     * }
     */
    public function getSubscribers(array $params): array;

    /**
     * 
     * @param array $params
     * @example [
     *      'room_id' => 1,
     *      'user_openid' => ['a','b']
     * ]
     * 
     * @return array
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
}
