<?php

namespace app\utils;

class Redirect
{
    public static function to($location = "")
    {
        if ($location) {
            if ($location === 404) {
                Response::error(404, ["Oh no something went wrong"]);
            } elseif($location === 500) {
                Response::error(500, ["Oh no something went wrong"]);
            } else {
                header("Location: " . $location);
            }
            exit();
        }
    }
}

//EOF
