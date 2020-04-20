<?php
namespace app\core;

class Presenter{
    protected $data =null;
    
    public function __construct($data = []) {
        $this->data = (Object) $data;
    }
    
    public function present() {
        return((Object) $this->format());
    }
}

