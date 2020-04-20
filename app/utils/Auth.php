<?php
namespace app\utils;
use app\utils;

class Auth{
    
    public static function checkAuth($redirect="login/index"){
        utils\Session::sessionStart();
        if(!utils\Session::sessionExists("USER")){
            utils\Session::closeSession();
            utils\Redirect::to(APP_URL . $redirect);
        }
    }
    
    public static function checkUnAuth($redirect="user/dash"){
        utils\Session::sessionStart();
        if(utils\Session::sessionExists("USER")){
            utils\Redirect::to(APP_URL . $redirect);
        }
    }
}

