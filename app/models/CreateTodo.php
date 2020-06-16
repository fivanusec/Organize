<?php

namespace app\models;
use app\utils;
use Exception;

class CreateTodo{
    
    public static function _create($TodoID){
        try{
            $genTodoID=rand(0,9999999999);
            $Todo=new Todo;
            $todoID=$Todo->createTodo([
               "Todo_List_ID"=>$genTodoID,
               "Todo_Name"=>utils\Input::post("TodoName"),
               "Todo_Description"=>utils\Input::post("TodoDesc") 
            ]);

            $prep=$Todo->save([
                "Todo_ID"=>$TodoID,
                "Todo_List_ID"=>$genTodoID
            ]);

            utils\Flash::success("Todo list created successfully!");
            return $todoID;
        }
        catch(Exception $e){
            utils\Flash::warning($e->getMessage());
        }
    }

}