<?php

require_once "vendor/autoload.php";

spl_autoload_register(function ($class_name) {
        include "Model/" . $class_name . '.php';
});

// changes PHP default session cookie name
if (ini_set('session.name', '_uall') === false) {
    session_name('_uall');
}

session_start();

$config = new Config();
//echo "mysql:host={$config->server};dbname={$config->database} user: {$config->user} password: {$config->password}";
$dbh = new PDO("mysql:host={$config->server};dbname={$config->database}", $config->user, $config->password);
if ($dbh === false) {
    die("Unable to connect to database");
}

if($config->server == 'localhost') {
    $env = 'dev';
} else {
    $env = 'dev';    
}

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

if ($env == 'dev') {
    $_SESSION['debug'] = 1;
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
    $stealth_error_handler = set_error_handler('local_app_error', E_ALL & ~E_NOTICE & ~E_USER_NOTICE);
}

$user_email = filter_input(INPUT_POST, 'email');
$user_password = filter_input(INPUT_POST, 'password');
$user_rememberme = filter_input(INPUT_POST, 'rememberme');

$user_rememberme = ($user_rememberme == 'yes') ? 1 : 0;

// This user table used for root admin password management - no forgot password on this dashboard
// Password are solely managed by admin users
$query = $dbh->prepare("SELECT * FROM `user` WHERE email = ? AND password = ? ");
$query->execute(array($user_email, $user_password));
if (!$row = $query->fetch(\PDO::FETCH_ASSOC)) {
    echo __FILE__." User {$user_email} {$user_password} not found in local table: ";exit;
    header("Location: logout.php");
    exit();
}

$PHPAuthConfig = new PHPAuth\Config($dbh);
$auth = new PHPAuth\Auth($dbh, $PHPAuthConfig);

$login = $auth->login($user_email, $user_password, $user_rememberme);

if ($login['error']) {
    $msg = $login['message'];
    $_SESSION['error'] = $msg;
    echo $msg;
    error_log($msg);exit;
    header("Location: logout.php");
    exit();
} else {
    
    $result = setcookie($PHPAuthConfig->cookie_name, $login['hash'], $login['expire'], $PHPAuthConfig->cookie_path, $PHPAuthConfig->cookie_domain, $PHPAuthConfig->cookie_secure, $PHPAuthConfig->cookie_http);
    if ($result == false) {
        echo "<h1>COULD NOT SET COOKIE!! You must enable cookies on your browser for this site!</h1>";
        exit;
    }

    $uid = $auth->getUID($user_email);
    $user_obj = new User();
    $userinfo = $user_obj->get($uid);
    $_SESSION['user_id'] = $userinfo['id'];
    $_SESSION['pid'] = $userinfo['pid'];
    $_SESSION['role'] = $userinfo['role'];
    $_SESSION['email'] = $userinfo['email'];
    $_SESSION['region'] = $userinfo['region'];
    $_SESSION['name'] = $userinfo['name'];
    $_SESSION['practice'] = $userinfo['practice'];
    $_SESSION['env'] = $env;

    header("Location: dashboard.php");
    exit();
}
