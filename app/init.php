<?php
//defines folders
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);

//public
define('PUBLIC_ROOT',ROOT.'public'.DIRECTORY_SEPARATOR);
define('PUBLIC_CSS',PUBLIC_ROOT.'css');
define('PUBLIC_JS',PUBLIC_ROOT.'JS');

//app
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);
define('UTILS', ROOT . 'app' . DIRECTORY_SEPARATOR . 'utils' . DIRECTORY_SEPARATOR);
define('VIEW', ROOT . 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('MODEL', ROOT . 'app' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR);
define('CORE', ROOT . 'app' . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR);
define('CONTROLLERS', ROOT . 'app' . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR);
define("APP_PROTOCOL", stripos($_SERVER["SERVER_PROTOCOL"], "https") === true ? "https://" : "http://");
define("APP_URL", str_replace("", "public/", dirname($_SERVER["SCRIPT_NAME"])) . "/");
define("HELLO", "HELLO");
define("HTMLENTITIES_FLAGS", ENT_QUOTES);
define("HTMLENTITIES_ENCODING", "UTF-8");
define("HTMLENTITIES_DOUBLE_ENCODE", false);

//defines
define("NAMESPACE_CONTROLLER", "\App\Controllers\\");
require_once CORE . 'app.php';
require_once CORE . 'controller.php';
require_once ROOT . "vendor/autoload.php";
