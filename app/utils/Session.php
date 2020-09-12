<?php
namespace app\utils;

class Session
{    
    public static function sessionStart()
    {
        if (session_id() == "") 
        {
            session_start();
        }
    }

    public static function delete($key)
    {
        if(self::sessionExists($key))
        {
            unset($_SESSION[$key]);
            return true;
        }
        return false;
    }
    
    public static function closeSession()
    {
        session_destroy();
    }
    
    public static function sessionExists($name)
    {
        return(isset($_SESSION[$name]));
    }
    
    public static function put($name, $value)
    {
        return($_SESSION[$name] = $value);
    }
    
    public static function get($name)
    {
        if(self::sessionExists($name))
        {
            return($_SESSION[$name]);
        }
    }
}