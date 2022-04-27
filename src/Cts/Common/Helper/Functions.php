<?php

/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

/**
 *
 *
 * @param int $start
 * @param int $end
 * @return int
 */
function getRdByIds($start = 0, $end = 1000) {
    return mt_rand($start, $end);
}

/**
 * 
 * @param string $string
 * @return string
 */
function urlsafe_base64_encode(string $string): string {
    return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($string));
}

/**
 * 
 * @param string $string
 * @return string
 */
function urlsafe_base64_decode(string $string): string {
    $data = str_replace(['-', '_'], ['+', '/'], $string);
    $mod4 = strlen($data) % 4;
    if ($mod4) {
        $data .= substr('====', $mod4);
    }
    return base64_decode($data);
}
