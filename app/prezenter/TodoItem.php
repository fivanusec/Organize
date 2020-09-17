<?php

namespace app\prezenter;

use app\core;

/**
 * Todo item presenter
 */

class TodoItem extends core\Presenter
{
	public function format()
	{
		return
			[
				"Item_ID" => $this->data->Todo_Item_ID,
				"Item_Name" => $this->data->Todo_Item_Name,
				"Item_Completion" => $this->data->Todo_Item_Completion
			];
	}
}

//EOF
