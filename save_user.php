<?php

require_once('_includes/_config.php');

if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '' || $_SESSION['role'] != 'admin') {
    // no direct access -> redirect to CMS home page
    unset($_SESSION);
    session_destroy();
    header("Location: index.php#login");
    exit();
}

if (!isset($_POST['id']) || $_POST['id'] == '') {
    session_destroy();
    $url = $_SERVER['HTTP_REFERER'];
    header("Location: $url");
    exit();
}

$my_user_id = $_POST['id'];
$updated = date('Y-m-d H:i:s');

$obj = new stdClass();
$User = new User();

foreach ($User->fields as $field) {
    $tmp = trim(filter_input(INPUT_POST, $field));
    if($field == 'name') {
        $tmp = ucwords($tmp);
    }
    $obj->$field = $tmp;
}

$result = $User->update($obj->id,$obj); 
if($result ===  false) {
    trigger_error(__METHOD__ . ' unable to update user: ' , E_USER_ERROR);
}
$url = 'users.php';
header("Location: $url");
exit();














