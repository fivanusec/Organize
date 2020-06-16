<?php
namespace app\prezenter;
use app\core;

class User extends core\Presenter{
    public function format(){
        return[
            "ID"=>$this->data->ID,
            "userName"=>$this->data->Name,
            "userSurname"=>$this->data->Surname,
            "type"=>$this->data->User_Type
        ];
    }
}
