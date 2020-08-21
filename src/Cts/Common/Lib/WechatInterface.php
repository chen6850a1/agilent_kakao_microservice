<?php declare(strict_types=1);
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
    public function getSobotGlobalGroup():array;
}
