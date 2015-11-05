<?php

namespace Utils;

use Configuration\Config;

/**
 * Class Redirect
 *
 * @package Utils
 */
class Redirect
{
    /**
     * Redirect to
     *
     * @param string $to
     */
    public static function to($to = '')
    {
        header('Location: ' . Config::getConfig()['server']['host'] . $to);
    }

}