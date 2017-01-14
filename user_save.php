<?php
include('_includes/_config.php');

if ($_SESSION['role'] != 'admin') {
    $redir = 'logout.php';
    header("Location: {$redir}");
    exit();
}

$updated = date('Y-m-d H:i:s');

$obj = new stdClass();
$User = new User();
$Practice = new Practice();

foreach ($User->fields as $field) {
    $tmp = trim(filter_input(INPUT_POST, $field));
    $tmp = $User->db->real_escape_string($tmp);
    if($field == 'name') {
        $tmp = ucwords($tmp);
    }
    $obj->$field = $tmp;
    $_SESSION['newuser'][$field] = $tmp;
}

$obj->dt = date('Y-m-d H:i:s');

if ($obj->practice == '') {
    $mypractice = $Practice->get(DEMOPRACTICE);
    $obj->practice = $mypractice['pname'];
    $obj->pid = $mypractice['id'];
} else {
    $mypractice = $Practice->get_by_name($obj->practice);
    $obj->practice = $mypractice['pname'];
    $obj->pid = $mypractice['id'];
}

/*
$myintpid = (int) $obj->pid;
if ($obj->practice == '' && $myintpid > 0) {
    $mypractice = $Practice->get($myintpid);
    $obj->practice = $mypractice['pname'];
    $obj->pid = $mypractice['id'];
}
 * */
 
if ($obj->id == 0) {
    $result = $auth->register($obj->email, $obj->password, $obj->password);
    if ($result['error']) {
        $msg = preg_replace('/\s+/', '+', $result['message']);
        header("Location: user_reg.php?error={$msg}");
        exit();
    }
    $auth_id = $auth->getUID($obj->email);
    if ($auth_id === false) {
        header("Location: user_reg.php?error=AUTH+ERROR");
        exit();
    }
    $result = $User->register_user($auth_id, $obj);
    if ($result === false) {
        die("ERROR: unable to CREATE NEW user!!");
    }
} else {

    $obj->curremail = trim(filter_input(INPUT_POST, 'curremail'));
    $obj->currpass = trim(filter_input(INPUT_POST, 'currpass'));
    if ($obj->curremail != $obj->email) {
        $result = $auth->changeEmail($obj->id, $obj->email, $obj->password);
        if ($result['error']) {
            print_r($result);
            trigger_error(__METHOD__ . ' unable to update email users table: ', E_USER_ERROR);
            exit();
        }
    }
    if ($obj->currpass != $obj->password) {
        $result = $auth->changePassword($obj->id, $obj->currpass, $obj->password, $obj->password);
        if ($result['error']) {
            print_r($result);
            trigger_error(__METHOD__ . ' unable to update password users table: ', E_USER_ERROR);
            exit();
        }
    }
    unset($obj->currpass);
    unset($obj->curremail);
    
    $result = $User->update_registered($obj->id, $obj);
    if ($result === false) {
        die("ERROR: unable to UPDATE user!!");
    }
}
if ($result === false) {
    trigger_error(__METHOD__ . ' unable to update user: ', E_USER_ERROR);
}
unset($_SESSION['newuser']);
$url = 'users.php';
header("Location: $url");
exit();














