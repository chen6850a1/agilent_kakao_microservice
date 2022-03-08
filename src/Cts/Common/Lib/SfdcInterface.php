<?php

namespace Cts\Common\Lib;

/**
 * Class SfdcInterface
 *
 * @since 2.0
 */
interface SfdcInterface {

    /**
     * 
     * @param string $code
     * @param array $profile
     * @return array
     */
    public function associate(string $code, array $profile): array;
}
