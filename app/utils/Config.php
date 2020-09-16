<?php

namespace app\utils;

class Config
{
    private static $_config = [];

    public static function get($key)
    {
        if (empty(self::$_config)) {
            self::$_config = require_once APP_CONFIG;
        }
        return (array_key_exists($key, self::$_config) ? self::$_config[$key] : null);
    }
}

//EOF