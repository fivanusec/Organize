<?php

namespace app\models;
use app\utils;
use Exception;

class UpdateNote
{
	public static function _update($NoteID)
	{
		try
		{
			$note = new Notes;
			$note->updateNote(
				[
					"Note_Data" => utils\Input::request('noteData'. $NoteID)
				],
			$NoteID);
			utils\Flash::success("Note succesfully updated!");
			return true;
		}
		catch(Exception $e)
		{
			utils\Flash::info($e->getMessage());
		}
		return false;
	}
}