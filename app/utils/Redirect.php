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
        $config = self::config();
        header('Location: ' . $config['server']['host'] . $to);
    }

    /**
     * Local Config
     *
     * @return array
     */
    private function config()
    {
        return [
            'server' => [
                'host' => 'http://localhost:8080/pounce',
            ]
        ];
    }

}