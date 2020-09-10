<?php

namespace app\models;

use app\utils;
use app\utils\PictrueHandler;
use Exception;

class UploadProfilePictrue
{
    public static function _createDB($UserID)
    {
        if(!$Picture = ProfilePictrue::getInstance($UserID))
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
        else
        {
            try
            {
                $Picture = new ProfilePictrue;
                $Picture->updateDB(
                    [
                        "Image_Dir" => "img/pic{$UserID}.jpg"
                    ],
                $UserID);
                //utils\Flash::success("Note succesfully updated!");
                return true;
            }
            catch(Exception $e)
            {
                //utils\Flash::info($e->getMessage());
                die($e->getMessage());
            }
            return false;
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
