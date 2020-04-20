<?php
namespace app\prezenter;
use app\core;

class User extends core\Presenter{
    public function format(){
        return[
            "ID"=>$this->data->ID,
            "userName"=>$this->data->Ime,
            "userSurname"=>$this->data->Prezime,
            "type"=>$this->data->User_Type
        ];
    }
}

