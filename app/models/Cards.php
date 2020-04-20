<?php
namespace app\models;
use app\core;
use Exception;

class Cards extends core\Model{
    public static function getInstance($card){
        $Card = new Cards();
        if($Card->findCard($card)->exists()){
            return $Card;
        }
        return null;
    }
    
    public function findCard($card){
        $field = filter_var($card, FILTER_VALIDATE_INT) ? "User_ID" : (is_numeric($card) ? "User_ID" : "Card_Name");
        return($this->findAll("Cards", [$field, "=", $card]));
    }
    
    public function createCard(array $fields) {
        if ($cardID = $this->create("Cards", $fields)) {
            throw new Exception("There was a problem!");
        }
        return $cardID;
    }

    public function updateCard(array $field, $cardID=null){
        if(!$this->update("Cards",$field,$cardID)){
            throw new Exception("There was a problem");
        }
    }
}

