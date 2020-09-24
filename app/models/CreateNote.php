<?php

namespace app\models;

use app\utils;
use Exception;

/**
 * CreateNote
 * 
 * @author Filip Ivanusec <fivanusec@gmail.com>
 * @since 0.1[ALPHA]
 */

class CreateNote
{

    /**
     * _create: Validates the input form from create modal,
     * creates new note in the database.
     * If everything went successfull retruns unique note ID,
     * else false
     * @access public
     * @return boolean
     * @since 0.1[ALPHA]
     */

    public static function _create($todoID)
    {
        try {
            $Notes = new Notes;
            $notesID = $Notes->createNote(
                [
                    "Note_ID" => rand(0, 9999999999),
                    "Note_Name" => utils\Input::post("noteName"),
                    "Todo_List_ID" => $todoID
                ]
            );
            utils\Flash::success("Note created successfully");
            return $notesID;
        } catch (Exception $e) {
            utils\Flash::warning("There was an error!");
        }
        return false;
    }
}

//EOF
