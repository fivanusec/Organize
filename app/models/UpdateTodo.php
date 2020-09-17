<?php

namespace app\models;

use app\utils;
use Exception;

class UpdateTodo
{
    public static function _update($TodoID)
    {
        try {
            $todo = new Todo;
            $todo->updateTodo(
                [
                    "Todo_Name" => utils\Input::post("todoNameEdit{$TodoID}"),
                    "Todo_Description" => utils\Input::post("todoDescEdit{$TodoID}")
                ],
                $TodoID
            );

            utils\Flash::success("Todo updated sucessfully!");
            return true;
        } catch (Exception $e) {
            utils\Flash::warning($e->getMessage());
        }
        return false;
    }
}
<<<<<<< HEAD

//EOF
=======
>>>>>>> master
