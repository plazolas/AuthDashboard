<?php
include('_includes/_config.php');

$id = $_REQUEST['id'];

if($id == '') {
    echo "unable to delete user: invalid input";
    exit();
}

$User = new User();

$result = $User->delete_user($id);
if ($result === false) {
    trigger_error(__METHOD__ . ' unable to update user: ', E_USER_ERROR);
}
$url = 'users.php';
header("Location: $url");
exit();














