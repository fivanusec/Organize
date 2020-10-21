<?php

namespace app\models;

use app\core;
use Exception;

/**
 * Todo
 * 
 * @author Filip Ivanusec <fivanusec@gmail.com>
 * @since 0.1[ALPHA]
 */

class Todo extends Core\Model
{

    /**
     * getInstance: Return new instance of Todo model 
     * with ALL notes data if exists in database
     * @access public
     * @param string $Todo_ID
     * @return Todo|null
     * @since 0.1[ALPHA]
     */

    public static function getInstance($Todo_ID)
    {
        $Todo = new Todo();
        if ($Todo->findTodo($Todo_ID)->exists()) {
            return $Todo;
        }
        return null;
    }

    /**
     * getDelete: Return new instance specified todo model
     * @access public
     * @param string $Todo_ID
     * @return true|null
     * @since 0.1[ALPHA]
     */

    public static function getDelete($Todo_ID)
    {
        $Todo = new Todo;
        if ($Todo->deleteTodo($Todo_ID)) {
            return true;
        }
        return null;
    }

    /**
     * findTodo: Retrives and stroes specified card record from database
     * into a class property. Returns true if record was found, or false 
     * if not
     * @access public
     * @param string $Todo_ID
     * @return boolean
     * @since 0.1[ALPHA]
     */

    public function findTodo($Todo_ID)
    {
        $field = filter_var($Todo_ID, FILTER_VALIDATE_INT) ? "Todo_ID" : (is_numeric($Todo_ID) ? "Todo_ID" : "Todo_List_ID");
        return ($this->findInner(
            [
                "Todo_Prep",
                "Todo_List"
            ],
            [
                $field, '=', $Todo_ID,
                "Todo_Prep.Todo_List_ID",
                '=',
                "Todo_List.Todo_List_ID"
            ]
        ));
    }

    /**
     * createTodo: Inserts new todo into the database
     * returning the unique
     * todo if succesfull, otherwise false
     * @access public
     * @param array $fields
     * @return string|boolean
     * @since 0.1[ALPHA]
     * @throws Exception
     */

    public function createTodo(array $fields)
    {
        if ($Todo_ID = $this->create("Todo_List", $fields)) {
            throw new Exception("There was a problem");
        }
        return $Todo_ID;
    }

    /**
     * updateTodo: Finds and updates todo upon given data
     * @access public
     * @param array $field
     * @param int $ID [optional]
     * @return void
     * @since 0.1[ALPHA]
     * @throws Exception
     */

    public function updateTodo(array $fields, $ID)
    {
        if ($this->update("Todo_List", "Todo_List_ID", $fields, $ID)) {
            throw new Exception("There was a problem");
        }
    }

    /**
     * deleteTodo: Retrives and deletes todo from database
     * @access public
     * @param string $todo
     * @return boolean
     * @since 0.1[ALPHA]
     */

    public function deleteTodo($todo)
    {
        $fieldCard = filter_var($todo, FILTER_VALIDATE_INT) ? "Todo_List_ID" : (is_numeric($todo) ? "Todo_List_ID" : "Todo_Name");
        return ($this->delete(
            "Todo_List",
            [
                $fieldCard,
                "=",
                $todo
            ]
        ));
    }

    /**
     * save: Inserts new todo into the database prep table
     * returning the unique
     * todo if succesfull, otherwise false
     * @access public
     * @param array $fields
     * @return string|boolean
     * @since 0.1[ALPHA]
     * @throws Exception
     */

    public function save(array $fields)
    {
        if ($TodoPrep = $this->create("Todo_Prep", $fields)) {
            throw new Exception("There was a problem!");
        }
        return $TodoPrep;
    }
}

//EOF
