<?php

namespace app\utils;

use Exception;

class PictrueHandler
{
    public static function upload($targetFile, $ID)
    {
        $target_Dir = PUBLIC_IMG;
        $imageFileType = strtolower(pathinfo($targetFile['name'], PATHINFO_EXTENSION));

        $check = getimagesize($targetFile['tmp_name']);
        if (!$check !== false) {
            Flash::info("File is not a pictrue!");
            return false;
        }

        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            Flash::info("Only .JPG,.PNG, .JPEG, .GIF are allowed");
            return false;
        }
        try{
            move_uploaded_file($targetFile['tmp_name'], $target_Dir . "pic{$ID}.".$imageFileType);
            return true;
        }
        catch(Exception $e){
            Flash::info($e->getMessage());
            return false;
        }
    }
}
