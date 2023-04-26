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
    const COUNTRY_CHINA_DGG = 2;
    const COUNTRY_CHINA_MS = 3;
    //用户类型
    const USER_TYPE_KAKAO = "user_type_kakao";
    const USER_TYPE_WECHAT = "user_type_wechat";
    const USER_TYPE_WECHAT_DGG = "user_type_wechat_dgg";
    const USER_TYPE_WECHAT_MS = "user_type_wechat_ms";
    const USER_TYPE_H5_CSO = "wechatH5_cso";
    const USER_TYPE_H5_DGG = "wechatH5_dgg";
    const USER_TYPE_H5_MS = "wechatH5_ms";
    const USER_TYPE_H5_VPD = "wechatH5_vpd";
    const USER_TYPE_SOBOT = "user_type_sobot";
    const USER_TYPE_ADMIN = "user_type_admin";
    const USER_TYPE_TCK = "user_type_tck";

    const USER_TYPE_H5_CSO_M = 3; //售后h5数字类型
    const USER_TYPE_WECHAT_M = 1; //售后小程序数字类型
    const USER_TYPE_H5_DGG_M = 4; //dgg h5数字类型
    const USER_TYPE_WECHAT_DGG_M = 2; //dgg 小程序数字类型
    const USER_TYPE_H5_MS_M = 6; //mini shop H5数字类型
    const USER_TYPE_WECHAT_MS_M = 5; //mini shop 小程序数字类型
    const USER_TYPE_H5_VPD_M = 7; //真空 H5数字类型

    //用户类型对应关系
    const USER_TYPE_RELATION = [
        self::USER_TYPE_H5_CSO_M => self::USER_TYPE_H5_CSO,
        self::USER_TYPE_WECHAT_M => self::USER_TYPE_WECHAT,
        self::USER_TYPE_H5_DGG_M => self::USER_TYPE_H5_DGG,
        self::USER_TYPE_WECHAT_DGG_M => self::USER_TYPE_WECHAT_DGG,
        self::USER_TYPE_H5_MS_M => self::USER_TYPE_H5_MS,
        self::USER_TYPE_WECHAT_MS_M => self::USER_TYPE_WECHAT_MS,
        self::USER_TYPE_H5_VPD_M => self::USER_TYPE_H5_VPD,
    ];

    //AWS 队列 异步事件名称
    const EVENT_SR_STATUS_CHANGE = "event_sr_status_change";
    const EVENT_USER_GEN_TELCODE = "event_user_gen_telcode";
    const EVENT_USER_UNBIND = "event_user_unbind";
    const EVENT_USER_BIND = "event_user_bind";
    const EVENT_GUIDE_SENDMAIL = "event_guide_sendmail"; //发送带有PDF附件的邮件
	const EVENT_SR_SERVICE_REPORT = "event_sr_service_report"; //发送带有PDF附件的邮件
	
    const EVENT_ADMIN_CREATE = "event_admin_create";
    const EVENT_RESERVATION_NOTIFICATION = "event_reservation_notification";
    const EVENT_FILL_INFO_NOTIFICATION = "event_fill_info_notification";
    const EVENT_DPUSH = "event_dpush"; //定向推送
    const EVENT_SOBOT_OFFLINE_MESSAGE = "event_sobot_offline_message"; //智齿离线消息推送
    const EVENT_BQ_CONFIRMED = "event_bq_confirmed";
    const EVENT_SAFETY_STATEMENT_CONFIRMED = "event_safety_statement_confirmed";
    const EVENT_SURVEY_SUBMITTED = "event_survey_submitted";
    const EVENT_BQ_PDF_REMIND = "event_bq_pdf_remind"; //未抓取到aws上的送修PDF 发送邮件提醒管理员
    const EVENT_BQ_INVOICE_REMIND = "event_bq_invoice_remind"; //用户未填写发票信息 发送wechat模版消息提醒用户
    const EVENT_LEAVE_MSG = "event_leave_msg"; //离线消息提交
    const EVENT_ZIP_PASSWORD = "event_zip_password";
    const EVENT_ORDER_WECHAT_PAY_SUCCEED = "event_order_wechat_pay_succeed";
    const EVENT_RPL_HOLD_REMIND = "event_rpl_hold_remind";
    const EVENT_TRANSACTION_CANCELLED = "event_transaction_cancelled"; //微信用户取消订单
    const EVENT_RPL_TRANSACTION_CANCELLED = "event_RPL_transaction_cancelled"; //后台RPL HOLD到取消
    const EVENT_RPL_PASSED = "event_RPL_passed"; // 后台RPL HOLD到去支付
    const EVENT_ORDER_APPLY_FOR_REFUND = "event_order_apply_for_refund"; //已支付到申请退款
    const EVENT_OFFLINE_PAY_B2B = "event_offline_pay_b2b"; //审核通过到转下下处理
    const EVENT_ECC_ORDER_STATUS_CHANGE = "event_ecc_order_status_change";
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
    const SERVICE_ECOMMERCE = "service_ecommerce";
    const SERVICE_SHOP = "service_shop";
    //推送模板
    const WECHAT_PUSH_TEMPLATE_INFOSETUP = "infoSetup";
    const WECHAT_PUSH_TEMPLATE_INFOSETUP_COMPLETE = "infoSetupComplete";
    const WECHAT_PUSH_TEMPLATE_LEAVEMESSAGE = "leaveMessage";
    const WECHAT_PUSH_TEMPLATE_INSTALL = "install";
    const WECHAT_PUSH_TEMPLATE_LEGALCERTIFICATION = "legalCertification";
    const WECHAT_PUSH_TEMPLATE_PREVENTIVEMAINTENANCE = "preventiveMaintenance";
    const WECHAT_PUSH_TEMPLATE_SOOPEN = "soopen";
    const WECHAT_PUSH_TEMPLATE_BQ_DP_PUSH = "BQ_DP_PUSH";
    const WECHAT_PUSH_TEMPLATE_WECHAT_PAY_SUCCEED = "wechat_pay_succeed";
    const WECHAT_PUSH_TEMPLATE_RPL_HOLD_REMIND = "rpl_hold_remind";
    const WECHAT_PUSH_TEMPLATE_APPLY_FOR_REFUND = "apply_for_refund";
    const WECHAT_PUSH_TEMPLATE_SALES_ORDER = "sales_order";
    const WECHAT_PUSH_TEMPLATE_GOODS_SHIPMENT = "goods_shipment";
    const WECHAT_PUSH_TEMPLATE_HARDCOPY_INVOICE = "hardcopy_invoice";
    const WECHAT_PUSH_TEMPLATE_E_INVOICE = "e_invoice";

    const WECHAT_PUSH_TEMPLATE_NEW_TICKET1 = "new_ticket1"; //新工单提醒[工单名称、服务状态、派工状态]
    const WECHAT_PUSH_TEMPLATE_NEW_TICKET2 = "new_ticket2"; //新工单提醒[工单名称、服务单号、派工状态]
    const WECHAT_PUSH_TEMPLATE_SERVICE_DISPATCH1 = "service_dispatch1"; //服务派工通知[服务状态、仪器序列号、服务单号、报价单号、派工状态]
    const WECHAT_PUSH_TEMPLATE_SERVICE_DISPATCH2 = "service_dispatch2"; //服务派工通知[服务状态、仪器序列号、服务单号、派工状态]
    const WECHAT_PUSH_TEMPLATE_SERVICE_DISPATCH3 = "service_dispatch3"; //服务派工通知[服务状态、仪器序列号、服务单号、快递单号、派工状态]
    const WECHAT_PUSH_TEMPLATE_SERVICE_DISPATCH4 = "service_dispatch4"; //服务派工通知[仪器序列号、服务单号、工程师姓名、联系电话、派工状态]
    const WECHAT_PUSH_TEMPLATE_ORDER_CHECK = "order_check"; //订单审批通知	[订单编号、订单名称、关联客户、总金额]
    const WECHAT_PUSH_TEMPLATE_ORDER_CHECK_REFUSE = "order_check_refuse"; //订单审批拒绝通知	[订单编号、订单标题、关联客户、总金额、拒绝原因]
    const WECHAT_PUSH_TEMPLATE_ORDER_CANCELED = "order_canceled"; //订单取消通知	[订单号、订单状态、取消原因]
    const WECHAT_PUSH_TEMPLATE_ORDER_APPLY_AMOUNT = "order_apply_amount"; //用户申请退款通知	[订单编号、退款金额、退款事由、最迟处理时间、退款原因]
    const WECHAT_PUSH_TEMPLATE_ORDER_PAY_SUCCESS = "order_pay_success"; //支付成功通知 [订单编号、商品名称、价格、支付方式]
    const WECHAT_PUSH_TEMPLATE_TICKET_STATUS_CHANGE = "ticket_status_change"; //工单状态变更提醒 [工单编号、工单状态、工单类型]
    const WECHAT_PUSH_TEMPLATE_TICKET_CREATED = "ticket_created"; //工单已生成通知 [工单编号、工单状态、工单类型]

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
    const DP_TYPE_AUTO_PUSH_PMOQ = 'AutoPushPmoq';
    const DP_TYPE_AUTO_PUSH_PMOQ_CONTRACT = 'AutoPushPmoqContract';
    const SELF_SQS_CHECK_PDF = "self_sqs_check_str_pdf"; //送修检测PDF
    //RTA上传S3目录
    const RTA_UPLOAD_DIR = 'web/RTA/';
    //ECC pdf上传S3目录
    const ECC_UPLOAD_DIR = 'web/ECC/';
    //直播回放S3目录前缀
    const LIVE_STREAM_REPLAY_UPLOAD_DIR = 'web/live_streaming_resource/';
    //直播微信支付方式
    const LIVE_STREAM_PAY_B2B = 2;  //公对公支付
    const LIVE_STREAM_PAY_WX = 1;   //微信支付
    //文章类型
    const ARTICLE_TYPE_CONTENT = 0; //内容制作
    const ARTICLE_TYPE_LINK = 1; //url链接
    const ARTICLE_TYPE_PDF_TO_H5 = 2; //pdf转h5
    const ARTICLE_TYPE_PDF = 3; //pdf
    const ARTICLE_TYPE_VIDEO = 4; //视频
    //直播促销类型
    const LIVE_STREAM_PROMOTE_618 = 1; //618活动
    const LIVE_STREAM_PROMOTE_1111 = 2; //双十一活动
}
