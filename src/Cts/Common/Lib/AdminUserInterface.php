<?php

declare(strict_types=1);

namespace Cts\Common\Lib;

/**
 * Class AdminUserInterface
 *
 * @since 2.0
 */
interface AdminUserInterface {

    /**
     * 
     * @param array $param
     * @return array
     */
    public function login(array $param): array;

    /**
     * 
     * @param array $params
     * @return array
     */
    public function changePassword(array $params): array;

    /**
     * 
     * @param array $params
     * @return array
     */
    public function getList(array $params): array;

    /**
     * 
     * @param int $uid
     * @return array
     */
    public function get(int $uid): array;

    /**
     * 
     * @return array
     */
    public function getAuthority(): array;

    /**
     * 
     * @param array $params
     * @return array
     */
    public function create(array $params): array;

    /**
     * 
     * @param int $uid
     * @param array $params
     * @return array
     */
    public function update(int $uid, array $params): array;

    /**
     * 
     * @param int $uid
     * @return array
     */
    public function delete(int $uid): array;
}
