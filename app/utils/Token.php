<?php

namespace app\utils;

class Token
{
    public static function generate()
    {
        $maxtime = 60 * 60 * 24;
        $tokenSession = Config::get("SESSION_TOKEN");
        $token = Session::get($tokenSession);
        $tokenTimeSession = Config::get("SESSION_TOKEN_TIME");
        $tokenTime = Session::get($tokenTimeSession);
        if ($maxtime + $tokenTime <= time() or empty($token)) {
            Session::put($tokenTimeSession, md5(uniqid(rand(), true)));
            Session::put($tokenTimeSession, time());
        }
        return Session::get($tokenSession);
    }

    public static function check($token)
    {
        return $token === Session::get(Config::get("SESSION_TOKEN")) and !empty($token);
    }
}

//EOF