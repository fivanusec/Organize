<?php

namespace app\core;

use app\utils;

/**
 * Controller
 * 
 * @author Filip Ivanusec <fivanusec@gmail.com>
 * @since 0.1[ALPHA] 
 */

class Controller
{
    /** @var View: Set to be instance of the core\View class */
    protected $View = null;

    /**
     * Construct: Constructs and gets the new instance of core\View class,
     * which is accessed by all of the controllers that extend this class
     * @access public
     * @since 0.1[ALPHA]
     */

    public function __construct()
    {
        //Init session
        utils\Session::sessionStart();

        // If the user is not logged in but a remember cookie exists then
        // attempt to login with cookie. NOTE: We only do this if we are not on
        // the login with cookie controller method (this avoids creating an
        // infinite loop).

        if (utils\Input::get("url") !== "Login/_loginWithCookie") {
            $cookie = utils\Config::get("COOKIE_USER");
            $session = utils\Config::get("SESSION_USER");
            if (!utils\Session::sessionExists($session) and utils\Cookies::exists($cookie)) {
                utils\Redirect::to(APP_URL . "Login/_loginWithCookie");
            }
        }

        //Creation of new instance of the core\View class
        $this->View = new View();
    }
}

//EOF