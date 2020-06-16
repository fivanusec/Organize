<?php
namespace app\models;

use app\core;
use Exception;

class User extends core\Model{
    
    public static function getInstance($user) {
        $User = new User();
        if ($User->findUser($user)->exists()) {
            return $User;
        }
        return null;
    }
    
    public function findUser($user) {
        $field = filter_var($user, FILTER_VALIDATE_EMAIL) ? "Email" : (is_numeric($user) ? "ID" : "Ime");
        return($this->find("users", [$field, "=", $user]));
    }
    
    public function createUser(array $fields) {
        if ($userID = $this->create("users", $fields)) {
            throw new Exception("There was a problem!");
        }
        return $userID;
    }

    public function updateUser(array $fields){
        if($userID = $this->update("users",$fields)){
            throw new Exception("There was a problem");
        }
        return $userID;
    }
}

