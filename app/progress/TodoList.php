<?php

namespace app\progress;

use app\core;

class TodoList extends core\Progress
{
    public function format()
    {
        for ($count = 0; $count < count($this->data); $count++) {
            if ($this->data[$count]->Todo_Item_Completion == 1) {
                $this->completion++;
            }
        }
        return ["Progress" => $this->completion, "Data" => count($this->data)];
    }
}
