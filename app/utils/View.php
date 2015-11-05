<?php

namespace Utils;

/**
 * Class View
 *
 * @package Utils
 */
class View
{
    /**
     * Display the requested view in the layout
     *
     * @param      $view
     * @param null $params
     */
    public static function render($view, $params = null)
    {
        include __DIR__ . '/../views/layout.php';
    }
}