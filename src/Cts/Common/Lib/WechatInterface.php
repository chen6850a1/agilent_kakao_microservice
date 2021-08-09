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
    public function getUserInfoWithMiniDggCode(array $wechatData): array;

    /**
     * 微信ad登录回调函数
     * @param array $params
     * @example :{
     *      code: string,
     *      state: string
     * }
     * @throws \Exception
     */
    public function callback(array $params);

    /**
     * 企业微信ad登录
     * @param array $params
     * @example:{
     *      code:string
     * }
     * @throws \Exception
     */
    public function wechatLogin(array $params);

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
     * @example [
     *      'mini_open_id' => string,
     *      'total_fee' => float,
     *      'order_sn' => string,
     *      'order_name' => string
     * ]
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
     * 获取微信scheme码
     * @param $path   /pages/index/index
     * @param $query   a=1&b=2
     * @param bool $isExpire 生成的scheme码类型，到期失效：true，永久有效：false。
     * @param int $expireTime 到期失效的scheme码的失效时间，为Unix时间戳。生成的到期失效scheme码在该时间前有效。最长有效期为1年。生成到期失效的scheme时必填。
     * @return array
     *  @example {
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
     * 一键推送所有订阅用户
     * @param array $params
     * @example [
     *      'room_id' => 1,
     *      'keyword' => ['广发银行']
     * ]
     *
     * @return array
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
}
