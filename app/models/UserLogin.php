<?php
namespace app\models;

use Exception;
use app\utils;


class UserLogin{
    
    public static function remeberCookies($userID){
        $Db = utils\Database::getIstance();
        $check =$Db->select("user_cookies",["User_ID","=",$userID]);
        if($check->count()){
            $hash=$check->first()->hash;
        }else{
            $hash = utils\Hash::generateUnique();
            if(!$Db->insert("user_cookies",["User_ID"=>$userID, "hash"=>$hash])){
                return false;
            }
        }
        $cookie = "user";
        $expiery=604800;
        return(utils\Cookies::put($cookie, $hash, $expiery));
    }
    
    public static function _login(){
        $email = utils\Input::post("email");
        if(!$User=User::getInstance($email)){
            utils\Flash::info("Email you enterd is wrong!");
            return false;
        }
        try{
            $data = $User->data();
            $password = utils\Input::post("password");
            if(utils\Hash::generate($password, $data->salt) !== $data->Password){
                utils\Flash::info("Password you enterd is wrong!");
                return false;
            }
            
            $remeber = utils\Input::post("remember")==="on";
            echo $remeber;
            
            if($remeber and !self::remeberCookies($data->ID)){
                utils\Flash::danger("There is problem with our server!");
                return false;
            }
            
            utils\Session::put("USER", $data->ID);
            return true;
        }
        catch(Exception $ex){
            utils\Flash::info($ex->getMessage());
        }
        return false;
    }
    
    public static function _logout(){
        utils\Session::closeSession();
        return true;
    }
}

