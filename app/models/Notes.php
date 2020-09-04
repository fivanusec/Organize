<?php

namespace app\models;
use app\core;
use Exception;

class Notes extends core\Model
{
    public static function getInstance($note)
    {
        $Note = new Notes;
        if($Note->findNote($note)->exists())
        {
            return $Note;
        }
        return null;
    }

    public function findNote($note)
    {
        $field = filter_var($note, FILTER_VALIDATE_INT) ? "Todo_List_ID" : (is_numeric($note) ? "Todo_List_ID" : "Note_Name");
        return($this->findAll(
            "notes",
            [
                $field,
                '=',
                $note
            ]
        ));
    }

    public function createNote(array $fields)
    {
        if($noteID = $this->create("notes", $fields))
        {
            throw new Exception("There was a problem!");
        }
        return $noteID;
    }

    public function updateNote(array $fields, $noteID = null)
    {
        if($this->update("notes", "Note_ID", $fields, $noteID))
        {
            throw new Exception("There was a problem!");
        }
    }
}