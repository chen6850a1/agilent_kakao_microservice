<?php

namespace Cts\Common\Lib;

/**
 * Class OktaInterface
 *
 * @since 2.0
 */
interface OktaInterface {

    /**
     * 
     * @param string $code
     * @return array
     */
    public function getUserInfo(string $code): array;
}
