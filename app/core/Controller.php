<?php
namespace app\core;
use app\utils;

class Controller
{
    protected $View=null;
    
    public function __construct()
    {
        utils\Session::sessionStart();
        $this->View= new View();
    }
}

