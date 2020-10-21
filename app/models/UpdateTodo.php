<?php

namespace app\models;

use app\utils;
use Exception;

/**
 * UpdateTodo
 * 
 * @author Filip Ivanusec <fivanusec@gmail.com>
 * @since 0.1[ALPHA]
 */

class UpdateTodo
{

    /**
     * _update: Validates the input form from update modal,
     * updates Todo in the database.
     * If everything went successfull retruns true,
     * else false
     * @access public
     * @param string $TodoID
     * @return boolean
     * @since 0.1[ALPHA]
     */
    
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

//EOF
