<?php

namespace app\utils;

class Auth
{
    public static function checkAuth($redirect = "Login/index")
    {
        Session::sessionStart();
        if (!Session::sessionExists(Config::get("SESSION_USER"))) {
            Session::closeSession();
            Redirect::to(APP_URL . $redirect);
        }
    }

    public static function checkUnAuth($redirect = "User/dash")
    {
        Session::sessionStart();
        if (Session::sessionExists(Config::get("SESSION_USER"))) {
            $ID = Session::get(Config::get("SESSION_USER"));
            Redirect::to(APP_URL . $redirect . "/{$ID}");
        }
    }
}

//EOF