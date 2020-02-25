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
interface KakaoHelperInterface
{
    /**
     * 获取Kakao用户信息
     * @param array $kakaoTokenData
     * @example:{
     *      access_token:string,
     *      refresh_token:string,
     *      refresh_token_expires_in:int
     * }
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getUserInfoWithToken(array $kakaoTokenData): array;

    /**
     * 推送Kakao消息
     * @param string  $kakao_uid
     * @param array $messageData
     * @example:{
     *      text:string,
     *      url:string
     * }
     * @return array
     * @example{
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function sendMessage(string $kakao_uid,array $messageData):array;
}
