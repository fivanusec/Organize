<?php

namespace app\models;
use app\utils;
use Exception;

class UpdateNote
{
	public static function _update($TodoListID)
	{
		$note = new Note;
		$note->updateNote(
			[
				"Note_Data" => utils\Input::post("noteData")
			],
		$TodoListID);

		utils\Flash::success("Note succesfully updated!");
		return true;
	}
	catch(Exception $e)
	{
		utils\Flash::info($e->getMessage());
	}
	return false;
}