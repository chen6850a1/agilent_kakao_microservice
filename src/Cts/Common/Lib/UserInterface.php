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
interface UserInterface
{
    /**
     * 前端用户登录
     * @param string $type
     * @param array $userData
     * @example:kakao:{
     *      access_token:string,
     *      refresh_token:string,
     *      refresh_token_expires_in:int
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function login(string $type,array $userData): array;

    /**
     * 创建建档信息
     * @param array $fillInfo
     * @example:{
     *      name:string,
     *      mobile:string,
     *      company:string,
     *      sn:string,
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
    public function createFillInfo(array $fillInfo):array;


    /**
     * 查看建档信息
     * @param array $params
     * @example:{
     *      name:string,
     *      mobile:string,
     *      company:string,
     *      sn:string,
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
    public function getFillList(array $params):array;

    /**
     * 查看建档信息
     * @param string $mobile
     * @example:"13774494474"
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function sendTelCode(string $mobile):array;

}
