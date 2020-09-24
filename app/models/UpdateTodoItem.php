<?php

namespace app\models;

use app\utils;
use Exception;

/**
 * UpdateTodoItem
 * 
 * @author Filip Ivanusec <fivanusec@gmail.com>
 * @since 0.1[ALPHA]
 */

class UpdateTodoItem
{

    /**
     * _update: Validates the input form from update modal,
     * updates TodoItem Name in the database.
     * If everything went successfull retruns true,
     * else false
     * @access public
     * @param string $TodoItemID
     * @return boolean
     * @since 0.1[ALPHA]
     */

    public static function _update($TodoItemID)
    {
        try {
            $todo = new TodoList;
            $todo->updateItem(
                [
                    "Todo_Item_Name" => utils\Input::post("TodoName{$TodoItemID}"),
                ],
                $TodoItemID
            );

            utils\Flash::success("Todo item updated sucessfully!");
            return true;
        } catch (Exception $e) {
            utils\Flash::warning($e->getMessage());
        }
        return false;
    }

    /**
     * _finish: Validates the input form from update modal,
     * updates TodoItemCompletion in the database.
     * If everything went successfull retruns true,
     * else false
     * @access public
     * @param string $TodoItemID
     * @return boolean
     * @since 0.1[ALPHA]
     */

    public static function _finish($TodoItemID)
    {
        try {
            $todo = new TodoList;
            $todo->updateItem(
                [
                    "Todo_Item_Completion" => utils\Input::post('checkBoxItem' . $TodoItemID) != "on",
                    //"Todo_Item_Completion_Date" => date("d.m.Y")
                ],
                $TodoItemID
            );

            utils\Flash::success("Well done!");
            return true;
        } catch (Exception $e) {
            utils\Flash::warning($e->getMessage());
            die($e->getMessage());
        }
        return false;
    }
}

//EOF
