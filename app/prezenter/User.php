<?php
namespace app\prezenter;
use app\core;

class User extends core\Presenter{
    public function format(){
        return[
            "ID"=>$this->data->ID,
            "Name"=>$this->data->Name,
            "Surname"=>$this->data->Surname,
            "Type"=>$this->data->User_Type,
            "Email"=>$this->data->Email,
            "Password"=>$this->data->Password,
            "Company"=>$this->data->Company,
            "Website"=>$this->data->Website,
            "Address"=>$this->data->Address,
            "City"=>$this->data->City,
            "State"=>$this->data->State
        ];
    }
}
