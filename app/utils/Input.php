<?php

namespace app\utils;

class Input
{
    public static function check(array $source, array $inputs, $recordID = null)
    {
        if (!Input::exists()) {
            return false;
        }
        if (!isset($source["crsf_token"]) and !Token::check($source["crsf_token"])) {
            Flash::danger(Text::get("INPUT_INCORRECT_CSRF_TOKEN"));
            return false;
        }
        $Validate = new Validate($source, $recordID);
        $validation = $Validate->check($inputs);
        if (!$validation->passed()) {
            Session::put(Config::get("SESSION_ERRORS"), $validation->errors());
            return false;
        }
        return true;
    }

    public static function exists($source = "post")
    {
        switch ($source) {
            case 'post':
                return (!empty($_POST));
            case 'get':
                return (!empty($_GET));
        }
        return false;
    }

    public static function get($name, $default = '')
    {
        return (isset($_GET[$name]) ? $_GET[$name] : $default);
    }

    public static function post($name, $default = '')
    {
        return (isset($_POST[$name]) ? $_POST[$name] : $default);
    }

    public static function request($name, $default = '')
    {
        return (isset($_REQUEST[$name]) ? $_REQUEST[$name] : $default);
    }
}

//EOF