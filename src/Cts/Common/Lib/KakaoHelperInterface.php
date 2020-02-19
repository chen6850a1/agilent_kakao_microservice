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
use Cts\Common\Data\KakaoTokenData;
use Cts\Common\Data\ResponseObjData;

/**
 * Class UserInterface
 *
 * @since 2.0
 */
interface KakaoHelperInterface
{
    /**
     * @param string  $code
     *
     * @return ResponseObjData
     */
    public function getUserInfoWithToken(KakaoTokenData $kakaoTokenData): ResponseObjData;

    /**
     * @param int  $kakao_uid
     * @param string $message
     *
     * @return bool
     */
    public function sendMessage(int $kakao_uid,string $message):bool;
}
