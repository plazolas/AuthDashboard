<?php
require_once "vendor/autoload.php";

spl_autoload_register(function ($class_name) {
        include "Model/" . $class_name . '.php';
});


function local_app_error($errno, $errstr, $errfile, $errline) {
    switch ($errno) {
        case E_USER_NOTICE:
        case E_NOTICE:
            $myerror = 'Notice';
            break;
        case E_USER_WARNING:
        case E_WARNING:
            $myerror = 'Warning';
            break;
        case E_USER_ERROR:
        case E_ERROR:
            $myerror = 'Error';
            break;
        default:
            $myerror = 'Unknown';
            break;
    }
    $msg = "Local App ERROR_HANDLER: {$myerror} - {$errno} - {$errstr} in file: {$errfile} at line: {$errline}";
    error_log($msg);
    // prevents execution of PHP internal error handler
    return true;
}

// changes PHP default session cookie name
if (ini_set('session.name', '_uall') === false) {
    session_name('_uall');
}

session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '') {
    header("Location: logout.php");
    exit();
}
if ($_SESSION['env'] == 'dev') {
    $_SESSION['debug'] = 1;
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    $_SESSION['debug'] = 0;
    error_reporting(0);
    ini_set('display_errors', 0);
    $stealth_error_handler = set_error_handler('local_app_error', E_ALL & ~E_NOTICE & ~E_USER_NOTICE);
}

define("CURRENTHOST", "http://localhost/ozcrud/");

$script_name = filter_input(INPUT_SERVER, 'SCRIPT_NAME');
if (isset($_SESSION['newuser']) && !preg_match('/user_reg/', $script_name)) {
    unset($_SESSION['newuser']);
}

$config = new Config();
$dbh = new PDO("mysql:host={$config->server};dbname={$config->database}", $config->user, $config->password);
if ($dbh === false) {
    die("unable to connect to database");
}
$PHPAuthconfig = new PHPAuth\Config($dbh);
$auth = new PHPAuth\Auth($dbh, $PHPAuthconfig);

$result = $auth->isLogged();
if ($result === false) {
    /*
      echo "<pre>";
      print_r($_SESSION);
      echo "</pre>";
      echo "<pre>";
      print_r($_COOKIE);
      echo "</pre>";
      echo __FILE__." User not logged in: ";exit;
    */ 
    header('Location: logout.php');
    exit();
}

if (isset($_COOKIE[$PHPAuthconfig->cookie_name]) && !$auth->checkSession($_COOKIE[$PHPAuthconfig->cookie_name])) {
    //header('HTTP/1.0 403 Forbidden');
    //echo __FILE__." Cookies not found: ";exit;
    header('Location: logout.php');
    exit();
}

$https = filter_input(INPUT_SERVER, 'HTTPS');
if ($https == 'on') {
    define("HTTP_PROTOCOL", "https://");
} else {
    define("HTTP_PROTOCOL", "http://");
}

define("ADMINUSERID", "1");
define("GENERALMANAGER", "1");
define("DEMOPRACTICE", "1");
define("MAXDOCTORS", 6);
define("MAXLOCATIONS", 5);
