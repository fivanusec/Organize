<?php

namespace app\utils;

class Redirect
{
    public static function to($location = "")
    {
        if ($location) {
            if ($location === 404) {
                header('HTTP/1.0 404 Not Found');
                include VIEW . DEFAULT_404_PATH;
            } elseif($location === 500) {
                header('HTTP/1.0 500 Internal Server Error');
                include VIEW . DEFAULT_500_PATH;
            } else {
                header("Location: " . $location);
            }
            exit();
        }
    }
}

//EOF
