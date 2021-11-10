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
     * @param array $data
     * @return array
     */
    public function auth(array $data): array;
}
