<?php

namespace app\models;

use app\core;
use Exception;

/**
 * User
 * 
 * @author Filip Ivanusec <fivanusec@gmail.com>
 * @since 0.1[ALPHA]
 */

class User extends core\Model
{

    /**
     * Get Instance: Returns an instance of the User model if the specified user
     * exists in the database. 
     * @access public
     * @param string $user
     * @return User|null
     * @since 0.1[ALPHA]
     */    

    public static function getInstance($user)
    {
        $User = new User();
        if ($User->findUser($user)->exists()) {
            return $User;
        }
        return null;
    }

    /**
     * Find User: Retrieves and stores a specified user record from the database
     * into a class property. Returns true if the record was found, or false if
     * not.
     * @access public
     * @param string $user
     * @return boolean
     * @since 0.1[ALPHA]
     */

    public function findUser($user)
    {
        $field = filter_var($user, FILTER_VALIDATE_EMAIL) ? "Email" : (is_numeric($user) ? "ID" : "Name");
        return ($this->find(
            "users",
            [
                $field,
                "=",
                $user
            ]
        ));
    }

    /**
     * Create User: Inserts a new user into the database, returning the unique
     * user if successful, otherwise returns false.
     * @access public
     * @param array $fields
     * @return string|boolean
     * @since 0.1[ALPHA]
     * @throws Exception
     */

    public function createUser(array $fields)
    {
        if ($userID = $this->create("users", $fields)) {
            throw new Exception("There was a problem!");
        }
        return $userID;
    }

    /**
     * Update User: Updates a specified user record in the database.
     * @access public
     * @param array $fields
     * @param integer $userID [optional]
     * @return void
     * @since 0.1[ALPHA]
     * @throws Exception
     */

    public function updateUser(array $fields, $ID = null)
    {
        if ($this->update("users", "ID", $fields, $ID)) {
            throw new Exception("There was a problem");
        }
    }
}

//EOF
