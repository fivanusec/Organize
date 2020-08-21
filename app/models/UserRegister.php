<?php
namespace app\models;

use Exception;
use app\utils;

class UserRegister
{
    public static function _register()
    {
        $salt = utils\Hash::generateSalt(32);
        try
        {
            $User=new User;
            $userID = $User->createUser(
            [
                "ID"=>rand(0,9999999999),
                "Name"=>utils\Input::post("name"),
                "Surname"=>utils\Input::post("surname"),
                "Email"=>utils\Input::post("regEmail"),
                "Password"=>utils\Hash::generate(utils\Input::post("regPassword"),$salt),
                "User_Type"=>utils\Input::post("type"),
                "news"=>utils\Input::post("news")==="on",
                "salt"=>$salt
            ]);
            utils\Flash::success("Registration was successfull!");
            return $userID;
        }
        catch(Exception $e)
        {
            utils\Flash::info($e->getMessage());
        }
        return false;
    }
}
