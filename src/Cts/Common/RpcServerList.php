<?php

namespace Cts\Common;

use Cts\Common\Lib\KakaoHelperInterface;
use Cts\Common\Lib\UserInterface;
use Cts\Common\Lib\AdminUserInterface;
use Cts\Common\Lib\SrInterface;
use Cts\Common\Lib\ReservationInterface;
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
     * @Reference(pool="reservation.pool")
     *
     * @var ReservationInterface
     */
    public $service_reservation;

}
