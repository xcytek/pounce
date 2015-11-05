<?php

namespace Configuration;

class Config
{
    public static function getConfig() {
        return [
            'server' => [
                'host' => 'http://localhost:8080/pounce',
            ]
        ];
    }
}
