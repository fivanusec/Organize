<?php

namespace app\models;

use app\utils;
use app\core;
use Exception;

/**
 * TodoList
 * 
 * @author Filip Ivnausec <fivanusec@gmail.com>
 * @since 0.1[ALPHA]
 */

class TodoList extends core\Model
{

    /**
     * getInstance: Return new instance of TodoList model 
     * with ALL notes data if exists in database
     * @access public
     * @param string $note
     * @return TodoList|null
     * @since 0.1[ALPHA]
     */

    public static function getInstance($TodoListID)
    {
        $TodoList = new TodoList;
        if ($TodoList->findTodoList($TodoListID)->exists()) {
            return $TodoList;
        }
        return null;
    }

     /**
     * getDelete: Return new instance specified TodoList model
     * @access public
     * @param string $TodoListID
     * @return true|null
     * @since 0.1[ALPHA]
     */

    public static function getDelete($TodoListID)
    {
        $TodoList = new TodoList;
        if ($TodoList->deleteItem($TodoListID)) {
            return true;
        }
        return null;
    }

    /**
     * findTodoList: Retrives and stroes specified card record from database
     * into a class property. Returns true if record was found, or false 
     * if not
     * @access public
     * @param string $TodoListID
     * @return boolean
     * @since 0.1[ALPHA]
     */

    public function findTodoList($TodoListID)
    {
        $field = filter_var($TodoListID, FILTER_VALIDATE_INT) ? "Todo_List_ID" : (is_numeric($TodoListID) ? "Todo_List_ID" : "Todo_Item_Name");
        return ($this->findInner(
            [
                "Todo_List_Prep",
                "Todo_Item"
            ],
            [
                $field, '=', $TodoListID,
                "Todo_List_Prep.Todo_Item_ID",
                '=',
                "Todo_Item.Todo_Item_ID"
            ]
        ));
    }

    /**
     * createTodoItem: Inserts new todo item into the database
     * returning the unique
     * todo item id if succesfull, otherwise false
     * @access public
     * @param array $fields
     * @return string|boolean
     * @since 0.1[ALPHA]
     * @throws Exception
     */

    public function createTodoItem(array $fields)
    {
        if ($todoItemID = $this->create("Todo_Item", $fields)) {
            throw new Exception("There was a problem");
        }
        return $todoItemID;
    }

    /**
     * save: Inserts new todo list item into the database prep table
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
        if ($TodoPrep = $this->create("Todo_List_Prep", $fields)) {
            throw new Exception("There was a problem");
        }
        return $TodoPrep;
    }

    /**
     * deleteItem: Retrives and deletes todo item from database
     * @access public
     * @param string $TodoItemID
     * @return boolean
     * @since 0.1[ALPHA]
     */

    public function deleteItem($TodoItemID)
    {
        $field = filter_var($TodoItemID, FILTER_VALIDATE_INT) ? "Todo_Item_ID" : (is_numeric($TodoItemID) ? "Todo_Item_ID" : "Todo_Item_Name");
        return ($this->delete(
            "Todo_Item",
            [
                $field,
                "=",
                $TodoItemID
            ]
        ));
    }

    /**
     * updateItem: Finds and updates todo upon given data
     * @access public
     * @param array $field
     * @param int $ID [optional]
     * @return void
     * @since 0.1[ALPHA]
     * @throws Exception
     */

    public function updateItem(array $fields, $ID)
    {
        if ($this->update("Todo_Item", "Todo_Item_ID", $fields, $ID)) {
            throw new Exception("There was a problem");
        }
    }
}

//EOF
