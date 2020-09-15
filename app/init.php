<?php
//defines folders
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);

//defines public
define('PUBLIC_ROOT',ROOT.'public'.DIRECTORY_SEPARATOR);
define('PUBLIC_CSS',PUBLIC_ROOT.'css');
define('PUBLIC_JS',PUBLIC_ROOT.'JS');
define('PUBLIC_IMG',PUBLIC_ROOT.'img'.DIRECTORY_SEPARATOR);

//defines app
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);
define('UTILS', ROOT . 'app' . DIRECTORY_SEPARATOR . 'utils' . DIRECTORY_SEPARATOR);
define('VIEW', ROOT . 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('MODEL', ROOT . 'app' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR);
define('CORE', ROOT . 'app' . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR);
define('CONTROLLERS', ROOT . 'app' . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR);
define("APP_PROTOCOL", stripos($_SERVER["SERVER_PROTOCOL"], "https") === true ? "https://" : "http://");
define("APP_URL", APP_PROTOCOL . $_SERVER["HTTP_HOST"] . str_replace("public/", "", dirname($_SERVER["SCRIPT_NAME"])) . "/");
define("APP_CONFIG", APP . DIRECTORY_SEPARATOR . "config.php");
define("HELLO", "HELLO");
define("HTMLENTITIES_FLAGS", ENT_QUOTES);
define("HTMLENTITIES_ENCODING", "UTF-8");
define("HTMLENTITIES_DOUBLE_ENCODE", false);
define("DEFAULT_CONTROLLER", "Home");
define("DEFAULT_CONTROLLER_ACTION" , "index");

//defines for namspaces
define("NAMESPACE_CONTROLLER", "\App\Controllers\\");

//defaults app header and footer
define("HEADER_MAIN",'user/teamplate/header');
define("FOOTER_MAIN",'user/teamplate/footer');

//defaults main {TEMP NAMES}
define("HEADER_FOR_MAIN",'header');
define("FOOTER_FOR_MAIN",'footer');

//requieres for app 
require_once CORE . 'app.php';
require_once CORE . 'controller.php';
require_once ROOT . "vendor/autoload.php";