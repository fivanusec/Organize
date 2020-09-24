<?php

namespace app\models;

use app\core;
use Exception;

/**
 * Cards: Model for creating user cards on loading the dash page
 * 
 * @author Filip Ivanusec <fivanusec@gmail.com>
 * @since 0.1[ALPHA]
 */

class Cards extends core\Model
{

    /**
     * getInstance: Return new instance of Cards model with ALL cards data if exists in database
     * @access public
     * @param string $card
     * @return Cards|null
     * @since 0.1[ALPHA]
     */

    public static function getInstance($card)
    {
        $Card = new Cards();
        if ($Card->findCard($card)->exists()) {
            return $Card;
        }
        return null;
    }

    /**
     * getDelete: Return new instance specified card model
     * @access public
     * @param string $card
     * @return true|null
     * @since 0.1[ALPHA]
     */

    public static function getDelete($card)
    {
        $Card = new Cards;
        if ($Card->deleteCard($card)) {
            return true;
        }
        return null;
    }

    /**
     * findCard: Retrives and stroes specified card record from database
     * into a class property. Returns true if record was found, or false 
     * if not
     * @access public
     * @param string $card
     * @return boolean
     * @since 0.1[ALPHA]
     */

    public function findCard($card)
    {
        $field = filter_var($card, FILTER_VALIDATE_INT) ? "User_ID" : (is_numeric($card) ? "User_ID" : "Card_Name");
        return ($this->findAll(
            "Cards",
            [
                $field,
                "=",
                $card
            ]
        ));
    }

    /**
     * createCard: Inserts new card into the database
     * returning the unique
     * card if succesfull, otherwise false
     * @access public
     * @param array $fields
     * @return string|boolean
     * @since 0.1[ALPHA]
     * @throws Exception
     */

    public function createCard(array $fields)
    {
        if ($cardID = $this->create("Cards", $fields)) {
            throw new Exception("There was a problem!");
        }
        return $cardID;
    }

    /**
     * updateCard: Finds and updates card upon given data
     * @access public
     * @param array $field
     * @param int $cardID [optional]
     * @return void
     * @since 0.1[ALPHA]
     * @throws Exception
     */

    public function updateCard(array $field, $cardID = null)
    {
        if ($this->update("Cards", "Card_ID", $field, $cardID)) {
            throw new Exception("There was a problem");
        }
    }
    
    /**
     * deleteCard: Retrives and deletes card from database
     * @access public
     * @param string $card
     * @return boolean
     * @since 0.1[ALPHA]
     */

    public function deleteCard($card)
    {
        $fieldCard = filter_var($card, FILTER_VALIDATE_INT) ? "Card_ID" : (is_numeric($card) ? "Card_ID" : "Card_Name");
        return ($this->delete(
            "Cards",
            [
                $fieldCard,
                "=",
                $card
            ]
        ));
    }
}

//EOF
