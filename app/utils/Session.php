<?php

namespace Utils;

/**
 * Class Session
 *
 * @package Utils
 */
class Session
{
    /**
     * Use an array to store the user data
     *
     * @param $key
     * @param $data
     */
    public static function put($key, $data)
    {
        $_SESSION[$key] = $data;
    }

    /**
     * Given the key retrieve the specified data
     *
     * @param $key
     * @return bool
     */
    public static function get($key)
    {
        if (array_key_exists($key, $_SESSION)) {
            return $_SESSION[$key];
        }

        return false;
    }

    /**
     * Retrieve all the user data stored in session
     */
    public static function all()
    {
        return $_SESSION;
    }

    /**
     * Destroy Session Data
     */
    public static function destroy()
    {
        unset($_SESSION);
    }

}