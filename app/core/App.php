<?php

namespace app\core;

use app\utils\Input;
use Exception;

/**
 * App
 *
 * @author Filip Ivanusec <fivanusec@gmail.com>
 * @version 0.1[ALPHA]
 */

class App
{
    /** @var mixed Default controller class */
    private $controller = DEFAULT_CONTROLLER;

    /** @var mixed Default controller action */
    private $method = DEFAULT_CONTROLLER_ACTION;

    /** @var array Params that pass to Controller */
    private $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();
        $this->getController($url);
        $this->getMethod($url);
        $this->getParams($url);
    }

    public function getMethod($url)
    {
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
            }
        }
    }

    public function getController($url)
    {
        if (isset($url[0])) {
            if (file_exists(CONTROLLERS . $url[0] . '.php')) {
                $this->controller = $url[0];
            }
        }
        require_once CONTROLLERS . $this->controller . '.php';
        $this->controller = NAMESPACE_CONTROLLER . ucfirst(strtolower($this->controller));
        $this->controller = new $this->controller;
    }

    private function getParams($url)
    {
        unset($url[0]);
        unset($url[1]);
        $this->params = $url ? array_values($url) : [];
    }

    public function parseUrl()
    {
        if ($url = Input::get("url")) {
            return $url = explode('/', filter_var(rtrim($url, '/'), FILTER_SANITIZE_URL));
        }
    }

    public function run()
    {
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
}


//EOF
