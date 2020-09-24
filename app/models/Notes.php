<?php

namespace app\models;

use app\core;
use Exception;

/**
 * Notes
 * 
 * @author Filip Ivanusec <fivanusec@gmail.com>
 * @since 0.1[ALPHA]
 */

class Notes extends core\Model
{

    /**
     * getInstance: Return new instance of Notes model 
     * with ALL notes data if exists in database
     * @access public
     * @param string $note
     * @return Notes|null
     * @since 0.1[ALPHA]
     */

    public static function getInstance($note)
    {
        $Note = new Notes;
        if ($Note->findNote($note)->exists()) {
            return $Note;
        }
        return null;
    }

    /**
     * findNote: Retrives and stroes specified card record from database
     * into a class property. Returns true if record was found, or false 
     * if not
     * @access public
     * @param string $note
     * @return boolean
     * @since 0.1[ALPHA]
     */

    public function findNote($note)
    {
        $field = filter_var($note, FILTER_VALIDATE_INT) ? "Todo_List_ID" : (is_numeric($note) ? "Todo_List_ID" : "Note_Name");
        return ($this->findAll(
            "notes",
            [
                $field,
                '=',
                $note
            ]
        ));
    }

    /**
     * createCard: Inserts new note into the database
     * returning the unique
     * note if succesfull, otherwise false
     * @access public
     * @param array $fields
     * @return string|boolean
     * @since 0.1[ALPHA]
     * @throws Exception
     */

    public function createNote(array $fields)
    {
        if ($noteID = $this->create("notes", $fields)) {
            throw new Exception("There was a problem!");
        }
        return $noteID;
    }

    /**
     * updateNote: Finds and updates note upon given data
     * @access public
     * @param array $field
     * @param int $noteID [optional]
     * @return void
     * @since 0.1[ALPHA]
     * @throws Exception
     */

    public function updateNote(array $fields, $noteID = null)
    {
        if ($this->update("notes", "Note_ID", $fields, $noteID)) {
            throw new Exception("There was a problem!");
        }
    }
}

//EOF
