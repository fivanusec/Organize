<?php

namespace app\prezenter;
use app\core;

class Notes extends core\Presenter
{
    public function format()
    {
        return
        [
            "Note_ID" => $this->data->Note_ID,
            "Note_Name" => $this->data->Note_Name,
            "Note_Data" => $this->data->Note_Data
        ];
    }
}