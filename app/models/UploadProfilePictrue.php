<?php

namespace app\models;

use app\utils;
use app\utils\PictrueHandler;
use Exception;

/**
 * UploadProfilePictrue
 * 
 * @author Filip Ivanusec <fivanusec@gmail.com>
 * @since 0.1[ALPHA]
 */

class UploadProfilePictrue
{

    /**
     * _createDB: If record doesn't exist :Validates the input form from create form,
     * creates new profile picture record in the database.
     * If everything went successfull retruns true,
     * else false
     * else calls updateDB and updates record Image_Dir.
     * @access public
     * @return boolean
     * @since 0.1[ALPHA]
     */

    public static function _createDB($UserID)
    {
        if (!$Picture = ProfilePictrue::getInstance($UserID)) {
            try {
                $Pictrue = new  ProfilePictrue;
                $picture = $Pictrue->insertDB(
                    "profile_images",
                    [
                        "Image_ID" => rand(0, 9999999999),
                        "User_ID" => $UserID,
                        "Image_Name" => "ProfilePicture{$UserID}",
                        "Image_Dir" => "img/pic{$UserID}.jpg"
                    ]
                );
                utils\Flash::success("Profile picture succesfuly updated!");
                return true;
            } catch (Exception $e) {
                utils\Flash::warning($e->getMessage());
            }
        } else {
            try {
                $Picture = new ProfilePictrue;
                $Picture->updateDB(
                    [
                        "Image_Dir" => "img/pic{$UserID}.jpg"
                    ],
                    $UserID
                );
                utils\Flash::success("Profile picture successfully updated!");
                return true;
            } catch (Exception $e) {
                utils\Flash::warning($e->getMessage());
                die($e->getMessage());
            }
            return false;
        }
    }

    /**
     * _upload: Validates the input form,
     * upload pictrue to server img folder.
     * If everything went successfull retruns unique upload ID,
     * else false
     * @access public
     * @return boolean
     * @since 0.1[ALPHA]
     */

    public static function _upload($UserID)
    {
        try {
            $ProfilePictrue = new ProfilePictrue;
            $TargetFile = $_FILES['file'];
            $upload = $ProfilePictrue->uploadPictrue($TargetFile, $UserID);
            utils\Flash::success("Upload was successfull!");
            return $upload;
        } catch (Exception $e) {
            utils\Flash::warning($e->getMessage());
            die($e->getMessage());
        }
    }
}

//EOF