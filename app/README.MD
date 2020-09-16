# Rules for formating code

For this project format your code to your typical PHP code format. If you are not familiar about PHP code format in this [link](https://gist.github.com/ryansechrest/8138375) is all information in details how to do it. If you are not sure that your code is formated propperly we recommend to use VS Code internal format.

## Files

The file you create and edit name it with the first capital letter like you would name your class.

## Skeleton

File should follow this example:

```
<?php

//code

//EOF

```

## Tags

Displaying data on views goes trough short echo tag like so:

```
<div class="example">
    <?= $this->data; ?>
</div>
```

If, for, switch loops:

```
<div class="example">
    <?php if(something_happens): >
        <tag that needs displaying>
    <?php endif;?>

    <?php for(): >
        <tag that needs displaying>
    <?php endfor;?>
</div>
```

## Namspaces

Typical namespace name is main_folder(mostly app)\subfolder

```
<?php

namespace app\utils;

//code

//EOF
```
## Classes

Typical name for classes is starting with first capital letter

```
<?php

namespace app\utils;

class Userlogin 
{

}

//EOF
```

## Functions

Functions should start with small letter, contain 2 words or more(if possible) in whicih second word starts with capital letter

```
<?php

namespace app\utils;

class Userlogin
{
    public static function login()
    {
        //this type of function is ok if the name of the function can be used for describing what she does
    }

    public static function loginWithCookies()
    {
        //prefferably if possible
    }
}

//EOF
```

## Function and in function format

The code inside function should be formated as presented(that also reflects on curly braces, brackets, parenthasies, varibale declaration, calling functions etc.):

```
<?php

namespace app\utils;

class Userlogin
{

    public $var = [];
    private $_var = [];

    public static function login()
    {
        if (something) {
            $_var = [
                "Someting" => "Data".
                "SomethingMore" => [
                    "OK" => "This is"
                ]
            ];
        }

        for (something) {
            $this->var = false;
        }
    }
}

//EOF
```

## For example on all rules in action

```
<?php

namespace app\utils;

class Validate
{
    private $_Db = null;
    private $_errors = [];
    private $_passed = false;
    private $_recordID = null;
    private $_source = [];

    public function __construct(array $source, $recordID = null)
    {
        $this->_Db = Database::getIstance();
        $this->_recordID = $recordID;
        $this->_source = $source;
    }

    private function _addError($input, $error)
    {
        $this->_errors[$input][] = str_replace(['-', '_'], ' ', ucfirst(strtolower($error)));
    }

    public function check(array $inputs)
    {
        $this->_errors = [];
        $this->_passed = false;
        foreach ($inputs as $input => $rules) {
            if (isset($this->_source[$input])) {
                $value = trim($this->_source[$input]);
                $this->_validate($input, $value, $rules);
            } else {
                $this->_addError($input, Text::get("VALIDATE_MISSING_INPUT", ["%ITEM%" => $input]));
            }
        }
        if (empty($this->_errors)) {
            $this->_passed = true;
        }
        return $this;
    }

    public function errors()
    {
        return ($this->_errors);
    }
}

//EOF
```