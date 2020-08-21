<?php
namespace app\prezenter;

use app\core;

class Cards extends core\Presenter
{
    public function format() 
    {
        return 
        [
            "cardID"=>$this->data->Card_ID,
            "cardName" => $this->data->Card_Name,
            "cardDesc"=>$this->data->Card_Description
        ];
    }
}

