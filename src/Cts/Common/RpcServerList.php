<?php

namespace Cts\Common;

use Cts\Common\Lib\DirectionalPushInterface;
use Cts\Common\Lib\GuideInterface;
use Cts\Common\Lib\InstrumentInterface;
use Cts\Common\Lib\JitterbitInterface;
use Cts\Common\Lib\OktaInterface;
use Cts\Common\Lib\KakaoHelperInterface;
use Cts\Common\Lib\WechatShopInterface;
use Cts\Common\Lib\PurchaseInterface;
use Cts\Common\Lib\UserInterface;
use Cts\Common\Lib\AdminUserInterface;
use Cts\Common\Lib\SrInterface;
use Cts\Common\Lib\NotificationInterface;
use Cts\Common\Lib\ReservationInterface;
use Cts\Common\Lib\SliderInterface;
use Cts\Common\Lib\LabInterface;
use Cts\Common\Lib\WechatInterface;
use Cts\Common\Lib\EcommerceInterface;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Rpc\Client\Annotation\Mapping\Reference;

/**
 * Class RpcProvider
 *
 * @since 2.0
 *
 * @Bean("RpcServerList")
 */
class RpcServerList {

    /**
     * @Reference(pool="user.pool")
     *
     * @var UserInterface
     */
    public $service_user;

    /**
     * @Reference(pool="kakao.pool")
     *
     * @var KakaoHelperInterface
     */
    public $service_kakao;

    /**
     * @Reference(pool="wechat.pool")
     *
     * @var WechatInterface
     */
    public $service_wechat;

    /**
     * @Reference(pool="jitterbit.pool")
     *
     * @var JitterbitInterface
     */
    public $service_jitterbit;
    
    /**
     * @Reference(pool="jitterbit.pool")
     *
     * @var OktaInterface
     */
    public $service_okta;

    /**
     * @Reference(pool="admin_user.pool")
     *
     * @var AdminUserInterface
     */
    public $service_admin_user;

    /**
     * @Reference(pool="sr.pool")
     *
     * @var SrInterface
     */
    public $service_sr;

    /**
     * @Reference(pool="notification.pool")
     *
     * @var NotificationInterface
     */
    public $service_notification;

    /**
     * @Reference(pool="reservation.pool")
     *
     * @var ReservationInterface
     */
    public $service_reservation;

    /**
     * @Reference(pool="slider.pool")
     *
     * @var SliderInterface
     */
    public $service_slider;

    /**
     * @Reference(pool="instrument.pool")
     *
     * @var InstrumentInterface
     */
    public $service_instrument;

    /**
     * @Reference(pool="guide.pool")
     *
     * @var GuideInterface
     */
    public $service_guide;

    /**
     * @Reference(pool="lab.pool")
     *
     * @var LabInterface
     */
    public $service_lab;

    /**
     * @Reference(pool="purchase.pool")
     *
     * @var PurchaseInterface
     */
    public $service_purchase;

    /**
     * @Reference(pool="purchase.pool")
     *
     * @var DirectionalPushInterface
     */
    public $service_directionalpust;

    /**
     * @Reference(pool="ecommerce.pool")
     *
     * @var EcommerceInterface
     */
    public $service_ecommerce;

    /**
     * @Reference(pool="wechat_shop.pool")
     *
     * @var WechatShopInterface
     */
    public $service_wechat_shop;

}
