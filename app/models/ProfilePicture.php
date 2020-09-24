<?php

namespace app\models;

use app\utils;
use app\core;
use Exception;

/**
 * ProfilePicture
 * 
 * @author Filip Ivanusec <fivanusec@gmail.com>
 * @since 0.1[ALPHA]
 */

class ProfilePictrue extends core\Model
{

    /**
     * getInstance: Return new instance of ProfilePicture model 
     * with ALL profile picture data if exists in database
     * @access public
     * @param string $picture
     * @return TodoList|null
     * @since 0.1[ALPHA]
     */

    public static function getInstance($picture)
    {
        $Picture = new ProfilePictrue;
        if ($Picture->findPictrue($picture)->exists()) {
            return $Picture;
        }
        return null;
    }

    /**
     * findPicture: Retrives and stroes specified picture record from database
     * into a class property. Returns true if record was found, or false 
     * if not
     * @access public
     * @param string $TodoListID
     * @return boolean
     * @since 0.1[ALPHA]
     */

    public function findPictrue($picture)
    {
        $field = filter_var($picture, FILTER_VALIDATE_INT) ? "User_ID" : (is_numeric($picture) ? "User_ID" : "Image_Name");
        return ($this->find("profile_images", [$field, "=", $picture]));
    }

    /**
     * uploadPicture: Retrives data from profile picture 
     * and moves it to server public\img folder
     * @access public
     * @param string $targetFile
     * @param string $User_ID
     * @return boolean
     * @since 0.1[ALPHA]
     */

    public function uploadPictrue($targetFile, $User_ID)
    {
        return ($this->upload($targetFile, $User_ID));
    }

    /**
     * insertDB: Inserts new data about profile pictrue into the database
     * returning the unique
     * todo item id if succesfull, otherwise false
     * @access public
     * @param string $table
     * @param array $fields
     * @return string|boolean
     * @since 0.1[ALPHA]
     * @throws Exception
     */

    public function insertDB($table, array $fields)
    {
        return ($this->create($table, $fields));
    }

    /**
     * updateDB: Finds and updates profile pictrue upon given data
     * @access public
     * @param array $fields
     * @param int $userID [optional]
     * @return void
     * @since 0.1[ALPHA]
     * @throws Exception
     */

    public function updateDB(array $fields, $userID = null)
    {
        if ($this->update("profile_images", "User_ID", $fields, $userID)) {
            throw new Exception("There was a problem");
        }
    }
}

//EOF
