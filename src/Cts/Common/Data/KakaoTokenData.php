<?php
/**
 * Created by PhpStorm.
 * User: hongch02
 * Date: 2020/2/19
 * Time: 9:01
 */

namespace Cts\Common\Data;

/**
 * Class KakaoTokenData
 *  exmple {"access_token":"2r0mHEwFqzNB5SHbe4wZD7VBLYSHwxMBFCQGcQopb1QAAAFwWI0LVw","token_type":"bearer","refresh_token":"rdUqV9E9BuPeEiFQiLjsCwRQwAXePuE_wfsEnQopb1QAAAFwWI0LVQ",
 * "expires_in":7199,"scope":"talk_message profile","refresh_token_expires_in":5183999}
 *
 */
class KakaoTokenData
{
    public $access_token;
    public $token_type;
    public $refresh_token;
    public $expires_in;
    public $scope;
    public $refresh_token_expires_in;
}