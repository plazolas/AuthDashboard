<?php
require_once "vendor/autoload.php";

spl_autoload_register(function ($class_name) {
        include "Model/" . $class_name . '.php';
});

if(ini_set('session.name', '_uall') === false)
{
    session_name('_uall');
}
session_start();

$server = filter_input(INPUT_SERVER, 'HTTP_HOST');

if ($server == 'localhost' && $server != '') {
    $env = 'dev';
}  else {
    $env = 'live';
}

if ($env == 'dev') {
    $_SESSION['debug'] = 1;
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    $_SESSION['debug'] = 0;
    error_reporting(0);
    ini_set('display_errors', 0);
    $stealth_error_handler = set_error_handler('local_app_error', E_ALL & ~E_NOTICE & ~E_USER_NOTICE);
}

$config = new Config();
$dbh = new PDO("mysql:host={$config->server};dbname={$config->database}", $config->user, $config->password);
if ($dbh === false) {
    die("Unable to connect to database");
}

$PHPAuthConfig = new PHPAuth\Config($dbh);
$auth   = new PHPAuth\Auth($dbh, $PHPAuthConfig);


$auth->logout($config->cookie_name);

session_destroy();

if(isset($_SESSION['error']) && $_SESSION['error'] != ''){
    $error_msg = $_SESSION['error'];
    $error_msg = preg_replace("/[^A-Za-z0-9 ]/", '', $error_msg);
    $error_msg = preg_replace('/\s/', '+', $error_msg);
} else {
    $error_msg = "You+need+to+login";
}
    
header("Location: login.php?error={$error_msg}");
?>
