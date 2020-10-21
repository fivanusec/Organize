<?php

namespace app\models;

use app\utils;
use Exception;

/**
 * UpdateNote
 * 
 * @author Filip Ivansuec <fivanusec@gmail.com>
 * @since 0.1[ALPHA]
 */

class UpdateNote
{

	/**
     * _update: Validates the input form from textarea,
     * updates notes in the database.
     * If everything went successfull retruns true,
     * else false
     * @access public
	 * @param string $NoteID
     * @return boolean
     * @since 0.1[ALPHA]
     */

	public static function _update($NoteID)
	{
		try {
			$note = new Notes;
			$note->updateNote(
				[
					"Note_Data" => utils\Input::request('noteData' . $NoteID)
				],
				$NoteID
			);
			utils\Flash::success("Note succesfully updated!");
			return true;
		} catch (Exception $e) {
			utils\Flash::warning($e->getMessage());
		}
		return false;
	}
}

//EOF
