<?php

namespace app\core;
use Exception;
use ReflectionClass;
use ReflectionMethod;
use app\utils\Input;

/**
 * Core App class
 * 
 * @author Filip Ivanusec<fivanusec@gmail.com>
 * @version 0.1[ALPHA]
 */

class App{
    /** @var mixed Default controller class */
    private $controller='home';

    /** @var mixed Default controller action */
    private $method='index';

    /** @var array Params that pass to Controller */
    private $params=[];
    
    public function __construct(){
        $url=$this->parseUrl();
        
        if(isset($url[0])){
            if(file_exists(CONTROLLERS.$url[0].'.php')){
                $this->controller=$url[0];
                unset($url[0]);
            }
        }
        require_once CONTROLLERS.$this->controller.'.php';
        $this->controller= NAMESPACE_CONTROLLER.ucfirst(strtolower($this->controller));
        $this->controller= new $this->controller;
        
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        
        $this->params = $url ? array_values($url) : [];
    }

    /**Implemnt in progress */
    private function _getClass(){
        if(isset($this->params[0]) and !empty($this->paramas[0])){
            $this->controller= NAMESPACE_CONTROLLER.ucfirst(strtolower($this->params[0]));
            unset($this->params[0]);
        }

        if(!class_exists($this->controller)){
            throw new Exception("Class doesn't exist");
        }
        $this->controller= new $this->controller;
    }

    /**Implemnt in progress */
    private function _getMethod(){
        if(isset($this->params[1]) and !empty($this->params[1])){
            $this->method=$this->params[1];
            unset($this->paramas[1]);
        }

        if(!(new ReflectionClass($this->controller))->hasMethod($this->method)){
            throw new Exception();
        }

        if(!(new ReflectionMethod($this->controller,$this->method))->isPublic()){
            throw new Exception();
        }
    }

    /**Implemnt in progress */
    private function getParams(){
        $this->params = $this->params ? array_values($this->params) : [];
    }

    public function parseUrl(){
        if($url=Input::get("url")){
            return $url=explode('/',filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            /**return $this->params=explode('/',filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
             * IMPLEMENT IN PROGRESS!!
            */
        }
    }
    
    public function run(){
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
}

