<?php
namespace app\core;

class Controller
{
    protected $View=null;
    
    public function __construct()
    {
        $this->View= new View();
    }
}

