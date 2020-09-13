<?php

namespace app\core;

class Progress
{
    protected $data = null;
    protected $completed = 0;

    public function __construct($data = [])
    {
        $this->data = (Object)$data;
    }

    public function getCountData()
    {
        return(count($this->data));
    }

    protected function sort()
    {
        for($count = 0; $count < count($this->data); $count++)
        {
            if($this->data->Todo_Item_Completion == 1)
            {
                $this->completed++;
            }
        }
        return $this->completed;
    }
}