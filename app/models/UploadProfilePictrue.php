<?php

namespace app\models;

use app\utils;
use Exception;

class UploadProfilePictrue
{
    public static function _createDB($UserID)
    {
        try
        {
            $Pictrue = new  ProfilePictrue;
            $picture = $Pictrue->insertDB("profile_images",
            [
                "Image_ID"=>rand(0, 9999999999),
                "User_ID"=>$UserID,
                "Image_Name"=>"ProfilePicture{$UserID}",
                "Image_Dir"=>"img/pic{$UserID}.jpg"
            ]);
            //utils\Flash::success("Profile picture succesfuly updated!");
            return true;
        }
        catch(Exception $e)
        {
            //utils\Flash::danger($e->getMessage());
            die($e->getMessage());
        }
    }

    public static function _upload($UserID)
    {
        try 
        {
            $ProfilePictrue = new ProfilePictrue;
            $TargetFile = $_FILES['file'];
            $upload = $ProfilePictrue->uploadPictrue($TargetFile, $UserID);
            //utils\Flash::success("Upload was successfull!");
            return $upload;
        } 
        catch (Exception $e) 
        {
            //utils\Flash::danger($e->getMessage());
            die($e->getMessage());
        }
    }
}
