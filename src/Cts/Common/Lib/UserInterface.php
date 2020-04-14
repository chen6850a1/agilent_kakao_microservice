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
    public function login(string $type, array $userData): array;

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
    public function createFillInfo(array $fillInfo): array;


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
    public function getFillList(array $params): array;

    /**
     * 发送验证码
     * @param array $params
     * @example {
     *      mobile:XXXXXXXXXXXXXX
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function sendTelCode(array $params): array;

    /**
     * 绑定手机
     * @param array $params
     * @example {
     *      mobile:XXXXXXXXXXXXXX,
     *      code:XXXXXXX
     * }
     *
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function bindUser(array $params): array;

    /**
     * 解绑手机
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function unbindUser(): array;

    /**
     * 获取用户信息
     * @param int $uid
     *
     * @return array
     * @emample{
     *  status:true,
     * data:Array
     * (
     * [id] => 1
     * [kakao_info_id] => 1
     * [created_at] => 0
     * [updated_at] => 0
     * [uuid] => 2002AAAAAA
     * [kakao_info] => Array
     * (
     * [id] => 1
     * [kakao_id] => 1289736999
     * [nickname] => ccna
     * [profile_image] => http://k.kakaocdn.net/dn/QLSbO/btqCcCvTmWK/OWnQkwdYYavrILpqUqQ6O0/img_640x640.jpg
     * [thumbnail_image] => http://k.kakaocdn.net/dn/QLSbO/btqCcCvTmWK/OWnQkwdYYavrILpqUqQ6O0/img_110x110.jpg
     * [created_at] => 1583135624
     * [updated_at] => 1583135624
     * )
     *
     * [auth_info] => Array
     * (
     * [uid] => 1
     * [okta_id] => 00ummhsm35cDp866r0h7
     * [telphone] => 13774494464
     * [ContactGuid] => 462046B086021ED9ABD474F934EBCA3F
     * [ContactName] => 陈 hong
     * [ContactId] => 0102660157
     * [AccountGuid] => 0025B5A3305A1ED590B14B646B9799B6
     * [AccountName] => 杭州宇田科技有限公司
     * [AccountId] => 0070484237
     * [is_del] => 0
     * [from] =>
     * [created_at] => 1585362437
     * [updated_at] => 1585362437
     * )
     *
     * )
     * }
     *
     */
    public function getInfoByUid(int $uid): array;

    /**
     * 获取用户信息
     * @param string $uuid
     *
     * @return array
     * @emample{
     *  status:true,
     * data:Array
     * (
     * [id] => 1
     * [kakao_info_id] => 1
     * [created_at] => 0
     * [updated_at] => 0
     * [uuid] => 2002AAAAAA
     * [kakao_info] => Array
     * (
     * [id] => 1
     * [kakao_id] => 1289736999
     * [nickname] => ccna
     * [profile_image] => http://k.kakaocdn.net/dn/QLSbO/btqCcCvTmWK/OWnQkwdYYavrILpqUqQ6O0/img_640x640.jpg
     * [thumbnail_image] => http://k.kakaocdn.net/dn/QLSbO/btqCcCvTmWK/OWnQkwdYYavrILpqUqQ6O0/img_110x110.jpg
     * [created_at] => 1583135624
     * [updated_at] => 1583135624
     * )
     *
     * [auth_info] => Array
     * (
     * [uid] => 1
     * [okta_id] => 00ummhsm35cDp866r0h7
     * [telphone] => 13774494464
     * [ContactGuid] => 462046B086021ED9ABD474F934EBCA3F
     * [ContactName] => 陈 hong
     * [ContactId] => 0102660157
     * [AccountGuid] => 0025B5A3305A1ED590B14B646B9799B6
     * [AccountName] => 杭州宇田科技有限公司
     * [AccountId] => 0070484237
     * [is_del] => 0
     * [from] =>
     * [created_at] => 1585362437
     * [updated_at] => 1585362437
     * )
     *
     * )
     * }
     *
     */
    public function getInfoByUuid(string $uuid): array;


    /**
     * 获取用户信息
     * @param array $uid  //数组
     * @example{
     *     1,2,3,4
     * }
     *
     * @return array
     * @emample{
     *  status:true,
     * data:Array
     * {$uid=>(
     * [id] => 1
     * [kakao_info_id] => 1
     * [created_at] => 0
     * [updated_at] => 0
     * [uuid] => 2002AAAAAA
     * [kakao_info] => Array
     * (
     * [id] => 1
     * [kakao_id] => 1289736999
     * [nickname] => ccna
     * [profile_image] => http://k.kakaocdn.net/dn/QLSbO/btqCcCvTmWK/OWnQkwdYYavrILpqUqQ6O0/img_640x640.jpg
     * [thumbnail_image] => http://k.kakaocdn.net/dn/QLSbO/btqCcCvTmWK/OWnQkwdYYavrILpqUqQ6O0/img_110x110.jpg
     * [created_at] => 1583135624
     * [updated_at] => 1583135624
     * )
     *
     * [auth_info] => Array
     * (
     * [uid] => 1
     * [okta_id] => 00ummhsm35cDp866r0h7
     * [telphone] => 13774494464
     * [ContactGuid] => 462046B086021ED9ABD474F934EBCA3F
     * [ContactName] => 陈 hong
     * [ContactId] => 0102660157
     * [AccountGuid] => 0025B5A3305A1ED590B14B646B9799B6
     * [AccountName] => 杭州宇田科技有限公司
     * [AccountId] => 0070484237
     * [is_del] => 0
     * [from] =>
     * [created_at] => 1585362437
     * [updated_at] => 1585362437
     * )
     *
     * )
     * }}
     *
     */
    public function getInfoByArrUid(array $arrUid): array;


    /**
     * 获取用户信息
     * @param string $kakaoId  //数组
     * @example "123456789"
     *
     * @return array
     * @emample{
     *  status:true,
     * data:Array
     * {$uid=>(
     * [id] => 1
     * [kakao_info_id] => 1
     * [created_at] => 0
     * [updated_at] => 0
     * [uuid] => 2002AAAAAA
     * [kakao_info] => Array
     * (
     * [id] => 1
     * [kakao_id] => 1289736999
     * [nickname] => ccna
     * [profile_image] => http://k.kakaocdn.net/dn/QLSbO/btqCcCvTmWK/OWnQkwdYYavrILpqUqQ6O0/img_640x640.jpg
     * [thumbnail_image] => http://k.kakaocdn.net/dn/QLSbO/btqCcCvTmWK/OWnQkwdYYavrILpqUqQ6O0/img_110x110.jpg
     * [created_at] => 1583135624
     * [updated_at] => 1583135624
     * )
     *
     * [auth_info] => Array
     * (
     * [uid] => 1
     * [okta_id] => 00ummhsm35cDp866r0h7
     * [telphone] => 13774494464
     * [ContactGuid] => 462046B086021ED9ABD474F934EBCA3F
     * [ContactName] => 陈 hong
     * [ContactId] => 0102660157
     * [AccountGuid] => 0025B5A3305A1ED590B14B646B9799B6
     * [AccountName] => 杭州宇田科技有限公司
     * [AccountId] => 0070484237
     * [is_del] => 0
     * [from] =>
     * [created_at] => 1585362437
     * [updated_at] => 1585362437
     * )
     *
     * )
     * }}
     *
     */
    public function getInfoByKakaoid(string $kakaoId): array;
}