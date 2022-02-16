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
     * @param string $nonce
     * @param array $profile
     * @return array
     */
    public function associate(string $code, string $codeVerifier, string $nonce, array $profile): array;
}
