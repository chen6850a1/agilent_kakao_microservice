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
interface JitterbitInterface
{


    /**
     * 绑定用户
     * @param array $data
     * @example:{
     *      unionid:string,
     *      tel:string,
     *      CountryCode:string,
     * }
     *
     * @return array
     * @example error:{
     *      status:false,
     *      data: {"ReturnStatus":"UB010","errorSummary":"This user already exist in Okta"},
     *      error:string
     * }
     *
     * @example success:{
     *       status:true,
     *      data: {"ReturnStatus":"UB001",
     *              "oktaUserId":"00ummhsm35cDp866r0h7",
     *              "mobilePhone":"13774494464",
     *              "crmContactId":"0102660157",
     *              "crmContactName":"\u9648 hong",
     *              "crmContactGuid":"462046B086021ED9ABD474F934EBCA3F",
     *              "crmAccountId":"0070484237",
     *              "crmAccountName":"\u676d\u5dde\u5b87\u7530\u79d1\u6280\u6709\u9650\u516c\u53f8",
     *              "crmAccountGuid":"0025B5A3305A1ED590B14B646B9799B6"}
     *      }
     */
    public function bindUser(array $data):array;
}
