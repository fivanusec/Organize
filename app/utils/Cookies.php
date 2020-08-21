<?php
namespace app\utils;

class Cookies
{
    public static function delete($key) 
    {
        self::put($key, "", time() - 1);
    }
    
    public static function exists($key) 
    {
        return(isset($_COOKIE[$key]));
    }
    
    public static function get($key) 
    {
        return($_COOKIE[$key]);
    }
    
    public static function put($key, $value, $expiry) 
    {
        return(setcookie($key, $value, time() + $expiry, "/"));
    }
}

