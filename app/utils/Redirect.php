<?php
namespace app\utils;

class Redirect{
    public static function to($location=""){
        if($location){
            if($location === 404){
                echo "Error";
            }else{
                header("Location: ".$location);
            }
            exit();
        }
    }
}

