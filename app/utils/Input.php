<?php

namespace app\utils;

class Input
{
    public static function get($name, $default = '')
    {
        return (isset($_GET[$name]) ? $_GET[$name] : $default);
    }

    public static function post($name, $default = '')
    {
        return (isset($_POST[$name]) ? $_POST[$name] : $default);
    }

    public static function request($name, $default = '')
    {
        return (isset($_REQUEST[$name]) ? $_REQUEST[$name] : $default);
    }
}
