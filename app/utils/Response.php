<?php

namespace Utils;

/**
 * Class Response
 *
 * @package Utils
 */
class Response
{
    /**
     * Return result as array
     *
     * @param $value
     * @return mixed
     */
    public static function asArray($value)
    {
        return json_decode($value, true);
    }

    /**
     * Return result as object
     *
     * @param $value
     * @return mixed
     */
    public static function asObject($value)
    {
        return json_decode($value);
    }

    /**
     * Return result as json
     *
     * @param $value
     * @return string
     */
    public static function json($value)
    {
        header('Content-Type: application/json');
        return json_encode($value);
    }

}