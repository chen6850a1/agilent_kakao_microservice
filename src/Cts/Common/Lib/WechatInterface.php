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
}
