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
     * 获取仪器列表
     * @param array $data
     *@example:{
     *      page:string|int,
     *      pageSize:string|int,
     *      keyword:string,
     *      orderBy:string,
     *      direction:string eg.asc|desc,
     *      status:string|int,
     *      responseFormat:string eg. csv|json
     * }
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function getFillList(array $params): array;

    /**
     * 获取仪器列表
     * @param array $data
     *@example:{
     *      uid:int,
     * }
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function getFillInfoByUid(int $uid): array;

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
     * 绑定手机
     * @param array $params
     * @example {
     *      id:XXXX
     *      remark:XXXXXXXXXXXXXX,
     *      email:XXXXXXX
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
    public function UpdateUser(array $params): array;

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
     * 解绑手机通过contactid
     * @param string $contactId
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function unbindUserByContactId(string $contactId): array;

    /**
     * 解绑手机通过mobile
     * @param string $mobile
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function unbindUserByMobile(string $mobile): array;

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
     * [wechat_info]=>Array
     * (
     * [id] => 1
     * [open_id] => 1289736999
     * [mini_open_id] => 123354335
     * [unionid] => XXXX
     * [nickname] => XXX
     * [profile_image] => 1289736999
     * [country] => 123354335
     * [province] => XXXX
     * [city] => XXX
     * [sex] => XXXX
     * [language] => XXX
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
     * 获取H5需要的用户信息
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
    public function getInfoFormatH5ByUid(int $uid):array;

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
     * [wechat_info]=>Array
     * (
     * [id] => 1
     * [open_id] => 1289736999
     * [mini_open_id] => 123354335
     * [unionid] => XXXX
     * [nickname] => XXX
     * [profile_image] => 1289736999
     * [country] => 123354335
     * [province] => XXXX
     * [city] => XXX
     * [sex] => XXXX
     * [language] => XXX
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
     * [wechat_info]=>Array
     * (
     * [id] => 1
     * [open_id] => 1289736999
     * [mini_open_id] => 123354335
     * [unionid] => XXXX
     * [nickname] => XXX
     * [profile_image] => 1289736999
     * [country] => 123354335
     * [province] => XXXX
     * [city] => XXX
     * [sex] => XXXX
     * [language] => XXX
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
    public function getInfoByMiniOpenid(string $uuid): array;


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
     * [wechat_info]=>Array
     * (
     * [id] => 1
     * [open_id] => 1289736999
     * [mini_open_id] => 123354335
     * [unionid] => XXXX
     * [nickname] => XXX
     * [profile_image] => 1289736999
     * [country] => 123354335
     * [province] => XXXX
     * [city] => XXX
     * [sex] => XXXX
     * [language] => XXX
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
    public function getInfoByContactId(string $contactId): array;


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
     * [wechat_info]=>Array
     * (
     * [id] => 1
     * [open_id] => 1289736999
     * [mini_open_id] => 123354335
     * [unionid] => XXXX
     * [nickname] => XXX
     * [profile_image] => 1289736999
     * [country] => 123354335
     * [province] => XXXX
     * [city] => XXX
     * [sex] => XXXX
     * [language] => XXX
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
     *
     * [wechat_info]=>Array
     * (
     * [id] => 1
     * [open_id] => 1289736999
     * [mini_open_id] => 123354335
     * [unionid] => XXXX
     * [nickname] => XXX
     * [profile_image] => 1289736999
     * [country] => 123354335
     * [province] => XXXX
     * [city] => XXX
     * [sex] => XXXX
     * [language] => XXX
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



    /**
     * 更新状态
     * @param array $data
     *  @example:{
     *     id:XX,
     *      status:XX
     * }
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function updateStatusFillInfo(array $data):array;



    /**
     * 检测excel里数据是否在sap
     * @param array $wechatData
     * @example:{
     *      union_id:string,
     *      file_name:string,
     *      excel_list:array
     * }
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function checkMobileExistWithExcelData(array $excelData): array;

    /**
     * 获取仪器列表
     * @param array $data
     *@example:{
     *      page:string|int,
     *      pageSize:string|int,
     *      keyword:string,
     *      orderBy:string,
     *      direction:string eg.asc|desc,
     *      status:string|int,
     *      responseFormat:string eg. csv|json
     * }
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function getCheckMobilelist(array $params): array;



    /**
     * 获取VIP列表
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function getVipList(array $data):array;

    /**
     * 导出vip
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function exportVip(array $data):array;

    /**
     * 导出vip
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function exportUserInfo(array $data):array;


    /**
     * 编辑VIP
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function vipEdit(array $data):array;

    /**
     * 删除VIP
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function vipDel(array $data):array;


    /**
     * 导入VIP
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function vipExcelImport(array $data):array;


    /**
     * 导入VIP
     * @param int $uid
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function vipCheckExist(int $uid):array;


    /**
     * 获取VIP列表
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function getCompetitorList(array $data):array;


    /**
     * 编辑VIP
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function competitorEdit(array $data):array;

    /**
     * 删除VIP
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function competitorDel(array $data):array;


    /**
     * 导入VIP
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function competitorExcelImport(array $data):array;


    /**
     * 通过手机检索
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function competitorCheckExist(string $mobile): array;
}
