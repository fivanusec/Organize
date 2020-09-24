<?php

namespace app\models;

use app\utils;
use Exception;

/**
 * Todo
 * 
 * @author Filip Ivanusec <fivanusec@gmail.com>
 * @since 0.1[ALPHA]
 */

class CreateTodo
{

    /**
     * _create: Validates the input form from create modal,
     * creates new todo in the database.
     * If everything went successfull retruns unique todo ID,
     * else false
     * @access public
     * @return boolean
     * @since 0.1[ALPHA]
     */

    public static function _create($TodoID)
    {
        try {
            $genTodoID = rand(0, 9999999999);
            $Todo = new Todo;
            $todoID = $Todo->createTodo(
                [
                    "Todo_List_ID" => $genTodoID,
                    "Todo_Name" => utils\Input::post("TodoName"),
                    "Todo_Description" => utils\Input::post("TodoDesc")
                ]
            );

            $prep = $Todo->save(
                [
                    "Todo_ID" => $TodoID,
                    "Todo_List_ID" => $genTodoID
                ]
            );

            utils\Flash::success("Todo list created successfully!");
            return $todoID;
        } catch (Exception $e) {
            utils\Flash::warning($e->getMessage());
        }
    }
}

//EOF
