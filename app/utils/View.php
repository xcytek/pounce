<?php

namespace Utils;

class View
{
    public static function render($view, $options)
    {
        include __DIR__ . '/../views/layout.php';
    }
}