<?php

namespace app\utils;

class Flash{
    public static function session($key, $value = "") {
        if (Session::sessionExists($key)) {
            $session = Session::get($key);
            Session::closeSession($key);
            return $session;
        } elseif (!empty($value)) {
            return(Session::put($key, $value));
        }
        return null;
    }

    public static function danger($value = "") {
        return(self::session("There was an error!", $value));
    }

    public static function info($value = "") {
        return(self::session("INFO: ", $value));
    }

    public static function success($value = "") {
        return(self::session("Success!", $value));
    }

    public static function warning($value = "") {
        return(self::session("There may be an error", $value));
    }
}