<?php

namespace app\models;

use app\utils;
use Exception;

class UpdateTodoItem
{
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