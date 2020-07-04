<?php

namespace app\models;
use app\utils;
use Exception;

class UpdateUser{
    public static function updateuser($UserID){
        if(!$User=User::getInstance($UserID)){
            utils\Flash::danger("There was a problem with the app!");
            return false;
        }
        try{
            $data = $User->data();
            $user = new User;
            $password = utils\Input::post("password");
            if(utils\Hash::generate($password, $data->salt) !== $data->Password){
                utils\Flash::warning("You didn't input your password");
                return false;
            }

            $user->updateUser([
                "Name"=>utils\Input::post("name"),
                "Surname"=>utils\Input::post("surname"),
                "Email"=>utils\Input::post("email"),
                "Company"=>utils\Input::post("company"),
                "Website"=>utils\Input::post("website"),
                "Address"=>utils\Input::post("address"),
                "City"=>utils\Input::post("city"),
                "State"=>utils\Input::post("state")
            ],$UserID);

            utils\Flash::success("Your data is updated successfully!");
            return true;
        }
        catch(Exception $e){
            utils\Flash::danger("There was an error while updating your data!");
            return false;
        }
    }
}