<?php

namespace app\models;
use app\utils;
use app\core;

class ProfilePictrue extends core\Model{
    public static function getInstance($picture){
        $Picture = new ProfilePictrue;
        if($Picture->findPictrue($picture)->exists()){
            return $Picture;
        }
        return null;
    }

    public function findPictrue($picture){
        $field = filter_var($picture, FILTER_VALIDATE_INT) ? "User_ID" : (is_numeric($picture) ? "User_ID" : "Image_Name");
        return($this->find("profile_images", [$field, "=", $picture]));
    }

    public function uploadPictrue($targetFile, $User_ID){
        return($this->upload($targetFile, $User_ID));
    }

    public function insertDB($table,array $fields){
        return($this->create($table, $fields));
    }

    /*public function setDefault(){

    }*/
}