<?php

declare(strict_types=1);
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
interface UserInterface {

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
     * @example:{
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
     * @example:{
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
    public function getInfoFormatH5ByUid(int $uid): array;

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
     * 同上
     * @param string $mobile
     * @return array
     */
    public function getInfoByMobile(string $mobile): array;

    /**
     * 同上
     * @param string $openid
     * @return array
     */
    public function getInfoByH5OpenId(string $openid): array;

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
    public function updateStatusFillInfo(array $data): array;

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
     * @example:{
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
    public function getVipList(array $data): array;

    /**
     * 导出vip
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function exportVip(array $data): array;

    /**
     * 导出vip
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function exportUserInfo(array $data): array;

    /**
     * 编辑VIP
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function vipEdit(array $data): array;

    /**
     * 删除VIP
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function vipDel(array $data): array;

    /**
     * 导入VIP
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function vipExcelImport(array $data): array;

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
    public function vipCheckExist(int $uid): array;

    /**
     * 获取VIP列表
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function getCompetitorList(array $data): array;

    /**
     * 编辑VIP
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function competitorEdit(array $data): array;

    /**
     * 删除VIP
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function competitorDel(array $data): array;

    /**
     * 导入VIP
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function competitorExcelImport(array $data): array;

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

    /**
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getInvoiceList(): array;

    /**
     * 
     * @param int $id
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getInvoice(int $id): array;

    /**
     * 
     * @param array $params
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function createInvoice(array $params): array;

    /**
     * 
     * @param int $id
     * @param array $params
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function updateInvoice(int $id, array $params): array;

    /**
     * 
     * @param int $id
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function deleteInvoice(int $id): array;

    /**
     * 导入装机ka数据
     * @param int $type
     * @param array $data
     * @return array
     */
    public function importKaInsSales(int $type, array $data): array;

    /**
     * 获取装机和ka的数据
     * @param string $accountId
     * @return array
     */
    public function getKaInsInfo(string $accountId): array;

    /**
     * 导入工程师信息数据(姓名，姓名拼音，手机号，邮箱)
     * @param array $excelData
     * @return array
     */
    public function importEngineerInfo(array $excelData): array;

    /**
     * 通过工程师拼音获取中文名字和手机号信息
     * @param string $pyName
     * @return array
     */
    public function getEngineerInfoByPyName(string $pyName): array;

    /**
     * 通过认证时间区间来查询用户信息
     * @param string $startDate
     * @param string $endDate
     * @return array
     */
    public function getInfoByAuthUpdateTime(string $startDate, string $endDate): array;

    /**
     * 
     * @param array $params
     * @example:{
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
     *      status:bool,
     *      data:array
     * }
     */
    public function getRplList(array $params): array;

    /**
     * 
     * @param int $id
     * 
     * @return array
     * @example {
     *      status:bool,
     *      data:array
     * }
     */
    public function getRpl(int $id): array;

    /**
     * 
     * @param array $params
     * @example:{
     *      AccountId:string,
     *      AccountName:string
     * }
     * 
     * @return array
     * @example {
     *      status:bool,
     *      data:['rpl_check' => bool]
     * }
     */
    public function rplCheck(array $params): array;

    /**
     * 
     * @param array $params
     * @example:{
     *      AccountId:string,
     *      AccountName:string,
     *      status:int,
     *      remark:string
     * }
     * 
     * @return array
     * @example {
     *      status:bool,
     *      data:array
     * }
     */
    public function createRpl(array $params): array;

    /**
     * 
     * @param int $id
     * @param array $params
     * @example:{
     *      status:int,
     *      remark:string
     * }
     * 
     * @return array
     * @example {
     *      status:bool,
     *      data:array
     * }
     */
    public function updateRpl(int $id, array $params): array;

    /**
     * 
     * @param array $excelData
     * @return array
     */
    public function importRpl(array $excelData): array;

    /**
     * 
     * @return array []
     */
    public function exportRpl(): array;

    /**
     * 
     * @param array $params
     * @example {
     *      page:int,
     *      pageSize:int,
     *      AccountId:string
     * }
     * 
     * @return array
     * @example {
     *      status:bool,
     *      data:array
     * }
     */
    public function getRplInvoiceList(array $params): array;

    /**
     * 
     * @param int $id
     * @return array
     */
    public function getRplInvoice(int $id): array;

    /**
     * 
     * @param array $params
     * @example {
     *      company_name:string,
     *      company_address:string,
     *      shipping_address:string
     * }
     * 
     * @return array
     */
    public function checkRplInvoice(array $params): array;

    /**
     * 
     * @param int $id
     * @param array $params
     * @example {
     *      AccountId:string
     * }
     * 
     * @return array
     */
    public function updateRplInvoice(int $id, array $params): array;

    /**
     * 
     * @param array $params
     * @example {
     *      page:string|int,
     *      pageSize:string|int,
     *      orderBy:string,
     *      direction:string eg.asc|desc,
     *      telphone:string,
     *      ContactId:string,
     *      ContactName:string,
     *      AccountId:string,
     *      AccountName:string
     * }
     * 
     * @return array
     * @example {
     *      status:bool,
     *      data:array
     * }
     */
    public function getUserList(array $params): array;

    /**
     * 
     * @param int $id
     * @return array
     * @example {
     *      status:bool,
     *      data:array
     * }
     */
    public function getUser(int $id): array;

    /**
     * 
     * @param int $id
     * @param array $params
     * @example {
     *      role:int 0|1|2
     * }
     * 
     * @return array
     * @example {
     *      status:bool,
     *      data:array
     * }
     */
    public function updateUserRole(int $id, array $params): array;

    /**
     * 
     * @param array $params
     * @example {
     *      role:int 0|1|2
     * }
     * 
     * @return array
     * @example {
     *      status:bool,
     *      data:array
     * }
     */
    public function updateMyRole(array $params): array;

    /**
     *
     * @param array $userIdParams
     * @param array $searchParams
     * @example {
     * ['23','452','434','45234'],
     * "hello",
     * }
     * @return array
     * @example {
     *      status:bool,
     *      data:array
     * }
     */
    public function getUserAuthList(array $userIdParams, array $searchParams): array;
}
