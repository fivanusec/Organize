<?php

namespace app\prezenter;

use app\core;

/**
 * Cards presenter
 */

class Cards extends core\Presenter
{
    public function format()
    {
        return
            [
                "ID" => $this->data->Card_ID,
                "Name" => $this->data->Card_Name,
                "Description" => $this->data->Card_Description,
                "todoID" => $this->data->Todo_ID
            ];
    }
}
<<<<<<< HEAD

//EOF
=======
>>>>>>> master
