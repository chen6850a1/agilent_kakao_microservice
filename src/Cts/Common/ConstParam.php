<?php
/**
 * Created by PhpStorm.
 * User: hongch02
 * Date: 2020/1/23
 * Time: 20:59
 */

namespace Cts\Common;

/**
 * 定义项目统一常量名
 *
 * Class ConstParam
 * @package Cts\Common
 */
class ConstParam
{
    const USER_TYPE_KAKAO = "user_type_kakao";
    const USER_TYPE_ADMIN = "user_type_admin";
    //AWS 队列 异步事件名称
    const EVENT_SR_STATUS_CHANGE = "event_sr_status_change";

    //统一各个微服务名
    const SERVICE_API_GETWAY = "service_api_getway";
    const SERVICE_USER = "service_users";
    const SERVICE_KAKAO = "service_kakao";
    const SERVICE_NOTIFICATION = "service_notification";
    const SERVICE_SR="service_sr";


}