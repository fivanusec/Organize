<?php

namespace app\progress;
use app\core;

class TodoList extends core\Progress
{
    public function format()
    {
        return($this->data->sort());
    }
}