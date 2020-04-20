<?php

namespace app\models;
use app\core;
use Exception;

class Todo extends Core\Model{

    public static function getInstance($Todo_ID){
        $Todo = new Todo();
        if($Todo->findTodo($Todo_ID)->exists()){
            return $Todo;
        }
        return null;
    }

    public function findTodo($Todo_ID){
        $field=filter_var($Todo_ID, FILTER_VALIDATE_INT) ? "Todo_ID" : (is_numeric($Todo_ID) ? "Todo_ID" : "Todo_List_ID");
        return($this->findInner(["Todo_Prep","Todo_List"],[$field,'=',$Todo_ID,"Todo_Prep.Todo_List_ID",'=',"Todo_List.Todo_List_ID"]));
    }
    
    public function createTodo(array $fields){
        if($Todo_ID=$this->create("Todo_List",$fields)){
            throw new Exception("There was a problem");
        }
        return $Todo_ID;
    }

    public function save(array $fields){
        if($TodoPrep=$this->create("Todo_Prep",$fields)){
            throw new Exception("There was a problem!");
        }
        return $TodoPrep;
    }
}