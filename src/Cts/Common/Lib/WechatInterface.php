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
}
