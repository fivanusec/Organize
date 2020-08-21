<?php

namespace app\models;
use app\utils;
use Exception;

class UpdateCard{
    public static function _update($cardID)
    {
        try
        {
            $card = new Cards;

            $card->updateCard(
            [
                "Card_Name"=>utils\Input::post("cardNameEdit{$cardID}"),
                "Card_Description"=>utils\Input::post("cardDescEdit{$cardID}")
            ],
            $cardID);

            utils\Flash::success("Card updated successfully!");
            return true;
        }
        catch(Exception $e)
        {
            utils\Flash::danger($e->getMessage());
            return false;
        }
    }
}
