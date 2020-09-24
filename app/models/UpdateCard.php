<?php

namespace app\models;

use app\utils;
use Exception;

/**
 * UpdateCard
 * 
 * @author Filip Ivanusec <fivanusec@gmail.com>
 * @since 0.1[ALPHA]
 */

class UpdateCard
{

    /**
     * _update: Validates the input form from update modal,
     * updates card in the database.
     * If everything went successfull retruns true,
     * else false
     * @access public
     * @param string $CardID
     * @return boolean
     * @since 0.1[ALPHA]
     */

    public static function _update($cardID)
    {
        try {
            $card = new Cards;

            $card->updateCard(
                [
                    "Card_Name" => utils\Input::post("cardNameEdit{$cardID}"),
                    "Card_Description" => utils\Input::post("cardDescEdit{$cardID}")
                ],
                $cardID
            );

            utils\Flash::success("Card updated successfully!");
            return true;
        } catch (Exception $e) {
            utils\Flash::warning($e->getMessage());
        }
        return false;
    }
}

//EOF