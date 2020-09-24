<?php

namespace app\models;

use app\utils;
use Exception;

/**
 * CreateTodoListItem
 * 
 * @author Filip Ivanusec <fivanusec@gmail.com>
 */

class CreateTodoListItem
{

    /**
     * _create: Validates the input form from create modal,
     * creates new todolist item in the database.
     * If everything went successfull retruns unique todolist item ID,
     * else false
     * @access public
     * @return boolean
     * @since 0.1[ALPHA]
     */

    public static function _create($TodoListID)
    {
        try {
            $genTodoItemID = rand(0, 9999999999);
            $TodoItem = new TodoList;
            $itemID = $TodoItem->createTodoItem(
                [
                    "Todo_Item_ID" => $genTodoItemID,
                    "Todo_Item_Name" => utils\Input::post("TodoName"),
                    "Todo_Item_Completion" => "0"
                ]
            );

            $prep = $TodoItem->save(
                [
                    "Todo_List_ID" => $TodoListID,
                    "Todo_Item_ID" => $genTodoItemID
                ]
            );

            return $itemID;
        } catch (Exception $e) {
            utils\Flash::warning($e->getMessage());
        }
    }
}

//EOF
