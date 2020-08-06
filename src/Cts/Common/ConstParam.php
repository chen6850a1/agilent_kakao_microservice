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
    const USER_TYPE_TCK = "user_type_tck";


    //AWS 队列 异步事件名称
    const EVENT_SR_STATUS_CHANGE = "event_sr_status_change";
    const EVENT_RESERVATION_CREATE = "event_reservation_change";
    const EVENT_USER_GEN_TELCODE = "event_user_gen_telcode";
    const EVENT_USER_UNBIND = "event_user_unbind";
    const EVENT_ADMIN_CREATE = "event_admin_create";


    //统一各个微服务名
    const SERVICE_API_GETWAY = "service_api_getway";
    const SERVICE_USER = "service_user";
    const SERVICE_ADMIN_USER = "service_admin_user";
    const SERVICE_KAKAO = "service_kakao";
    const SERVICE_NOTIFICATION = "service_notification";
    const SERVICE_JITTERBIT = "service_jitterbit";
    const SERVICE_SR = "service_sr";
    const SERVICE_SLIDER = "service_slider";
    const SERVICE_RESERVATION = "service_reservation";
    const SERVICE_INSTRUMENT = "service_instrument";
    const SERVICE_GUIDE = "service_guide";

}
