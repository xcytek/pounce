<?php

namespace Utils;

/**
 * Class Request
 *
 * @package Utils
 */
class Request
{

    public static function call($uri)
    {
        return file_get_contents($uri);
    }

}