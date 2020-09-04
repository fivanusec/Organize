<?php

namespace app\models;
use app\utils;
use Exception;

class UpdateNote
{
    public static function _update($TodoListID)
    {
        try
        {
            $notes = new Notes;
            $notes->updateNote(
                [
                    "Note_Data" => utils\Input::post("noteData")
                ],
            $TodoListID);
            
            utils\Flash::success("Note updated successfully!");
            return true;
        }
        catch(Exception $e)
        {
            utils\Flash::info($e->getMessage());
        }
        return false;
    }
}