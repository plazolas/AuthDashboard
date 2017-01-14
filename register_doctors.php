<?php
include('_includes/_config.php');

if (!isset($_POST['pid']) || $_POST['pid'] == '') {
    session_destroy();
    $url = $_SERVER['HTTP_REFERER'];
    header("Location: $url");
    exit();
}

$pid = filter_input(INPUT_POST, 'pid');

for ($i = 0; $i < MAXDOCTORS; $i++) {
    $var_id = 'drid' . $i;
    $var_name = 'drname' . $i;
    $var_email = 'dremail' . $i;
    $var_deanum = 'drdeanum' . $i;
    $var_licensenum = 'drlicensenum' . $i;
    $var_npi = 'drnpi' . $i;
    
    $$var_id = ucfirst(filter_input(INPUT_POST, $var_id));
    $$var_name = ucfirst(filter_input(INPUT_POST, $var_name));
    $$var_email = filter_input(INPUT_POST, $var_email);
    $$var_npi = filter_input(INPUT_POST, $var_npi);
    $$var_deanum = filter_input(INPUT_POST, $var_deanum);
    $$var_licensenum = filter_input(INPUT_POST, $var_licensenum);
}



$user_id = $_SESSION['user_id'];
$updated = date('Y-m-d H:i:s');

$insert_obj = new stdClass();
$Drinfo = new Drinfo();

for ($i = 0; $i < MAXDOCTORS; $i++) {
    $var_id = 'drid' . $i;
    $var_name = 'drname' . $i;
    $var_email = 'dremail' . $i;
    $var_deanum = 'drdeanum' . $i;
    $var_licensenum = 'drlicensenum' . $i;
    $var_npi = 'drnpi' . $i;
    
    if ($$var_name != '') {
        $drname = $$var_name;
        $dremail = $$var_email;
        $drdeanum = $$var_deanum;
        $drlicensenum = $$var_licensenum;
        $drnpi = $$var_npi;

        // INSERT/UPDATE doctors

        $insert_obj = new stdClass();
        $id = 0;
        foreach ($Drinfo->fields as $field) {
            $insert_obj->$field = (isset($$field)) ? $$field : '';
        }
        if ($$var_id != 0) {
            $insert_obj->id = $$var_id;
            $drinfo_id = $Drinfo->set($insert_obj);
        } else {
            $drinfo_id = $Drinfo->create($insert_obj);
        }
        if ($drinfo_id === false) {
            error_log(__FILE__ . 'Unable to insert into db ');
            return false;
        }
        unset($id);
        unset($insert_obj);
    }
}

$url = 'practice_edit.php?id='.$pid.'&type=Practice';
header("Location: $url");
exit();














