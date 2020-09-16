<?php

namespace app\models;

use app\utils;
use Exception;

class CreateNote
{
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