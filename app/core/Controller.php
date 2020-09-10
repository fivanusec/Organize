<?php
namespace app\core;
use app\utils;

class Controller
{
    protected $View=null;
    
    public function __construct()
    {
        utils\Session::sessionStart();

        /*if (utils\Input::get("url") !== "login/_loginWithCookie") {
            $cookie = utils\Config::get("COOKIE_USER");
            $session = utils\Config::get("SESSION_USER");
            if (!utils\Session::sessionExists($session) and utils\Cookies::exists($cookie)) {
                utils\Redirect::to(APP_URL . "Login/_loginWithCookie");
            }
        }*/

        $this->View= new View();
    }
}

