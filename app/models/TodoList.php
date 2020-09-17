<?php

namespace app\models;

use app\utils;
use app\core;
use Exception;

class TodoList extends core\Model
{

    public static function getInstance($TodoListID)
    {
        $TodoList = new TodoList;
        if ($TodoList->findTodoList($TodoListID)->exists()) {
            return $TodoList;
        }
        return null;
    }

    public static function getDelete($TodoListID)
    {
        $TodoList = new TodoList;
        if ($TodoList->deleteItem($TodoListID)) {
            return true;
        }
        return null;
    }

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

    public function createTodoItem(array $fields)
    {
        if ($todoItemID = $this->create("Todo_Item", $fields)) {
            throw new Exception("There was a problem");
        }
        return $todoItemID;
    }

    public function save(array $fields)
    {
        if ($TodoPrep = $this->create("Todo_List_Prep", $fields)) {
            throw new Exception("There was a problem");
        }
        return $TodoPrep;
    }

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

    public function updateItem(array $fields, $ID)
    {
        if ($this->update("Todo_Item", "Todo_Item_ID", $fields, $ID)) {
            throw new Exception("There was a problem");
        }
    }
}

//EOF
