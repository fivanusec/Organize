<?php

namespace app\models;

use app\utils;
use Exception;

/**
 * UpdateUser
 * 
 * @author Filip Ivanusec <fivnausec@gmail.com>
 * @since 0.1[ALPHA]
 */

class UpdateUser
{

    /**
     * updateuser: Validates the input form from update form,
     * Retrives user data from database and updates it.
     * If everything went successfull retruns true,
     * else false
     * @access public
     * @param string $UserID
     * @return boolean
     * @since 0.1[ALPHA]
     */

    public static function updateuser($UserID)
    {
        if (!$User = User::getInstance($UserID)) {
            utils\Flash::danger("There was a problem with the app!");
            return false;
        }
        try {
            $data = $User->data();
            $user = new User;
            $password = utils\Input::post("password");
            if (utils\Hash::generate($password, $data->salt) !== $data->Password) {
                utils\Flash::warning("You didn't input your password");
                return false;
            }

            $user->updateUser(
                [
                    "Name" => utils\Input::post("name"),
                    "Surname" => utils\Input::post("surname"),
                    "Email" => utils\Input::post("email"),
                    "Company" => utils\Input::post("company"),
                    "Website" => utils\Input::post("website"),
                    "Address" => utils\Input::post("address"),
                    "City" => utils\Input::post("city"),
                    "State" => utils\Input::post("state")
                ],
                $UserID
            );

            utils\Flash::success("Your data is updated successfully!");
            return true;
        } catch (Exception $e) {
            utils\Flash::danger("There was an error while updating your data!");
            die($e->getMessage());
        }
        return false;
    }
}

//EOF
