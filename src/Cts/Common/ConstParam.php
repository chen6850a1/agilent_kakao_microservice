<?php

namespace Cts\Common;

/**
 * 定义项目统一常量名
 *
 * Class ConstParam
 * @package Cts\Common
 */
class ConstParam {

    //国家
    const COUNTRY_KOREA = 0;
    const COUNTRY_CHINA = 1;
    //用户类型
    const USER_TYPE_KAKAO = "user_type_kakao";
    const USER_TYPE_WECHAT = "user_type_wechat";
    const USER_TYPE_SOBOT = "user_type_sobot";
    const USER_TYPE_ADMIN = "user_type_admin";
    const USER_TYPE_TCK = "user_type_tck";
    //AWS 队列 异步事件名称
    const EVENT_SR_STATUS_CHANGE = "event_sr_status_change";
    const EVENT_USER_GEN_TELCODE = "event_user_gen_telcode";
    const EVENT_USER_UNBIND = "event_user_unbind";
    const EVENT_ADMIN_CREATE = "event_admin_create";
    const EVENT_RESERVATION_NOTIFICATION = "event_reservation_notification";
    const EVENT_FILL_INFO_NOTIFICATION = "event_fill_info_notification";
    const EVENT_DPUSH = "event_dpush"; //定向推送
    const EVENT_SOBOT_OFFLINE_MESSAGE = "event_sobot_offline_message"; //智齿离线消息推送
    const EVENT_BQ_CONFIRMED = "event_bq_confirmed";
    const EVENT_SURVEY_SUBMITTED = "event_survey_submitted";
    const EVENT_BQ_PDF_REMIND = "event_bq_pdf_remind";
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
    const SERVICE_LAB = "service_lab";
    const SERVICE_EXTENSION = "service_extension";
    const SERVICE_WECHAT = "service_wechat";
    //推送模板
    const WECHAT_PUSH_TEMPLATE_INFOSETUP = "infoSetup";
    const WECHAT_PUSH_TEMPLATE_LEAVEMESSAGE = "leaveMessage";
    const WECHAT_PUSH_TEMPLATE_INSTALL = "install";
    const WECHAT_PUSH_TEMPLATE_LEGALCERTIFICATION = "legalCertification";
    const WECHAT_PUSH_TEMPLATE_PREVENTIVEMAINTENANCE = "preventiveMaintenance";
    const WECHAT_PUSH_TEMPLATE_SOOPEN = "soopen";
    const WECHAT_PUSH_TEMPLATE_BQ_DP_PUSH = "BQ_DP_PUSH";
    //定向推送类型
    const DP_TYPE_ARRANGE_ENGINEER_CONFIRM = 'ArrangeEngineerConfirm';
    const DP_TYPE_CSD = 'CSD';
    const DP_TYPE_CONTACT_CONFIRM = 'ContactConfirm';
    const DP_TYPE_PRODUCTS_AND_SERVICES_CONSULTATION = 'ProductsAndServicesConsultation';
    const DP_TYPE_RSE_FIRST = 'RseFirst';
    const DP_TYPE_RSE_LAST = 'RseLast';
    const DP_TYPE_TECHNICAL_CONSULTATION = 'TechnicalConsultation';
    const DP_TYPE_WLA = 'WLA';
    const DP_TYPE_WELCOME_INSTALL = 'WelcomeInstall';
    const DP_TYPE_ARRIVAL_INSTALL = 'ArrivalInstall';
    const DP_TYPE_DELIVER = 'Deliver';
    const DP_TYPE_AUTO_PUSH = 'AutoPush';

}
