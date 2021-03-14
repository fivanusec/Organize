<?php

return
    [
        //Database config
        //===========================================================================================
        "DATABASE_HOST" => "localhost",
        "DATABASE_NAME" => "Organize",
        "DATABASE_USERNAME" => "newuser",
        "DATABASE_PASSWORD" => "password",

        //Cookie config
        //==========================================================================================
        "COOKIE_DEFAULT_EXPIRY" => 604800,
        "COOKIE_USER" => "user",
        "" => "",

        //Session config
        //==========================================================================================
        "SESSION_ERRORS" => "errors",
        "SESSION_FLASH_DANGER" => "danger",
        "SESSION_FLASH_INFO" => "info",
        "SESSION_FLASH_SUCCESS" => "success",
        "SESSION_FLASH_WARNING" => "warning",
        "SESSION_TOKEN" => "token",
        "SESSION_TOKEN_TIME" => "token_time",
        "SESSION_USER" => "USER",
        "" => "",

        //Messages for actions
        //==========================================================================================
        "TEXTS" =>
        [
            //Errors
            //==========================================================================================
            "SERVER_ERROR" => "There is a problem with our server!",
            "" => "",

            //Login
            //==========================================================================================
            "LOGIN_INVALID_DATA" => "The email or password you entered is not matching one in database!",
            "LOGIN_USER_NOT_FOUND" => "The email you entered doesn't exist in database!",
            "" => "",

            //Register
            //==========================================================================================
            "REGISTER_USER_CREATED" => "Account has been successfully created!",
            "REGISTER_USER_INVALID_EMAIL" => "The email you entered already exists in database!",
            "" => "",

            //User model
            //==========================================================================================
            "USER_CREATE_EXCEPTION" => "There was a problem creating this account!",
            "USER_UPDATE_EXCEPTION" => "There was a problem updating this account!",
            "" => "",

            //Input utils text
            //==========================================================================================
            "INPUT_INCORRECT_CSRF_TOKEN" => "Cross-site request forgery verification failed!",
            "" => "",

            //Utils settings
            //==========================================================================================
            "VALIDATE_FILTER_RULE" => "%ITEM% is not a valid %RULE_VALUE%!",
            "VALIDATE_MISSING_INPUT" => "Unable to validate %ITEM%!",
            "VALIDATE_MISSING_METHOD" => "Unable to validate %ITEM%!",
            "VALIDATE_MATCHES_RULE" => "%RULE_VALUE% must match %ITEM%.",
            "VALIDATE_MAX_CHARACTERS_RULE" => "%ITEM% can only be a maximum of %RULE_VALUE% characters.",
            "VALIDATE_MIN_CHARACTERS_RULE" => "%ITEM% must be a minimum of %RULE_VALUE% characters.",
            "VALIDATE_REQUIRED_RULE" => "%ITEM% is required!",
            "VALIDATE_UNIQUE_RULE" => "%ITEM% already exists.",
            "" => "",
        ],

        "" => "",
    ];
