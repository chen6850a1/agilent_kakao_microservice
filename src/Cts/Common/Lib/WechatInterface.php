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
}
