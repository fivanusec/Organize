<?php

namespace app\models;

use Exception;
use app\utils;

/**
 * UserRegister
 * 
 * @author Filip Ivanusec <fivanusec@gmail.com>
 * @since 0.1[ALPHA]
 */

class UserRegister
{
    /** @var array The register form inputs. */

    private static $_inputs = [
        "name" => [
            "required" => true
        ],
        "surname" => [
            "required" => true
        ],
        "regEmail" => [
            "filter" => "email",
            "required" => true
        ],
        "regPassword" => [
            "min_characters" => 6,
            "required" => true
        ]
    ];

    /**
     * Register: Validates the register form inputs, creates a new user in the
     * database and writes all necessary data into the session if the
     * registration was successful. Returns the new user's ID if everything is
     * okay, otherwise turns false.
     * @access public
     * @return boolean
     * @since 0.1[ALPHA]
     */

    public static function _register()
    {
        if (!utils\Input::check($_POST, self::$_inputs)) {
            return false;
        }
        $salt = utils\Hash::generateSalt(32);
        if (!$User = User::getInstance(utils\Input::post("regEmail"))) {
            try {
                $User = new User;
                $userID = $User->createUser(
                    [
                        "ID" => rand(0, 9999999999),
                        "Name" => utils\Input::post("name"),
                        "Surname" => utils\Input::post("surname"),
                        "Email" => utils\Input::post("regEmail"),
                        "Password" => utils\Hash::generate(utils\Input::post("regPassword"), $salt),
                        "User_Type" => utils\Input::post("type"),
                        "news" => utils\Input::post("news") === "on",
                        "salt" => $salt
                    ]
                );
                utils\Flash::success(utils\Text::get("REGISTER_USER_CREATED"));
                return $userID;
            } catch (Exception $e) {
                utils\Flash::info($e->getMessage());
            }
        }
        utils\Flash::danger(utils\Text::get("REGISTER_USER_INVALID_EMAIL"));
        return false;
    }
}

//EOF