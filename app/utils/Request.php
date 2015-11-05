<?php

namespace Utils;

/**
 * Class Request
 *
 * @package Utils
 */
class Request
{

    /**
     * Get the content of the URI
     *
     * @param $uri
     * @return string
     */
    public static function call($uri)
    {
        return file_get_contents($uri);
    }

    /**
     * Get all POST data
     *
     * @return mixed
     */
    public static function post()
    {
        return $_POST;
    }

    /**
     * Get all GET data
     *
     * @return mixed
     */
    public static function get()
    {
        return $_GET;
    }

}