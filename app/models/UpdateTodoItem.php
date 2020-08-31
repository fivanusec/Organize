<?php

namespace app\models;
use app\utils;
use Exception;

class UpdateTodoItem
{
	public static function _update($TodoItemID)
	{
		try
        {
            $todo = new TodoList;
            $todo->updateItem(
            [
                "Todo_Item_Name"=>utils\Input::post("TodoName{$TodoItemID}"),
            ],
            $TodoItemID);

            utils\Flash::success("Todo item updated sucessfully!");
            return true;
        }
        catch(Exception $e)
        {
            utils\Flash::danger($e->getMessage());
            return false;
        }
	}
}