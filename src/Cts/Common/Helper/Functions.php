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
