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
     * @return array
     */
    public function associate(string $code): array;

    /**
     * 
     * @return array
     */
    public function myContacts(): array;

    /**
     * 
     * @param string $keywords
     * @return array
     */
    public function search(string $keywords): array;
}
