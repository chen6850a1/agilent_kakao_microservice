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
     * @param string $codeVerifier
     * @return array
     */
    public function associate(string $code, string $codeVerifier): array;

    /**
     * 
     * @param string $code
     * @return array
     */
    public function getBasicUserInfo(string $code): array;

    /**
     * 
     * @return array
     */
    public function getUserProfile(): array;
}
