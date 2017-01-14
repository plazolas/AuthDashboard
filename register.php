<?php

include('_includes/_config.php');

$user_id = $_SESSION['user_id'];
$updated = date('Y-m-d H:i:s');

$pname = filter_input(INPUT_POST, 'pname');
$contactname = filter_input(INPUT_POST, 'contactname');
$contacttitle = filter_input(INPUT_POST, 'contacttitle');
$contactemail = filter_input(INPUT_POST, 'contactemail');
$address = filter_input(INPUT_POST, 'address');
$address2 = filter_input(INPUT_POST, 'address2');
$city = filter_input(INPUT_POST, 'city');
$state = filter_input(INPUT_POST, 'state');
$zip = filter_input(INPUT_POST, 'zip');
$phone = filter_input(INPUT_POST, 'phone');
$fax = filter_input(INPUT_POST, 'fax');

$locname1 = filter_input(INPUT_POST, 'pname2');
$locname2 = filter_input(INPUT_POST, 'pname3');
$locname3 = filter_input(INPUT_POST, 'pname4');
$locname4 = filter_input(INPUT_POST, 'pname5');

$drname1 = filter_input(INPUT_POST, 'drname1');
$drlicensenum1 = filter_input(INPUT_POST, 'drlicensenum1');
$drnpi1 = filter_input(INPUT_POST, 'drnpi1');
$drdeanum1 = filter_input(INPUT_POST, 'drdeanum1');
$dremail1 = filter_input(INPUT_POST, 'dremail1');

$drname2 = filter_input(INPUT_POST, 'drname2');
$drlicensenum2 = filter_input(INPUT_POST, 'drlicensenum2');
$drnpi2 = filter_input(INPUT_POST, 'drnpi2');
$drdeanum2 = filter_input(INPUT_POST, 'drdeanum2');
$dremail2 = filter_input(INPUT_POST, 'dremail2');

$drname3 = filter_input(INPUT_POST, 'drname3');
$drlicensenum3 = filter_input(INPUT_POST, 'drlicensenum3');
$drnpi3 = filter_input(INPUT_POST, 'drnpi3');
$drdeanum3 = filter_input(INPUT_POST, 'drdeanum3');
$dremail3 = filter_input(INPUT_POST, 'dremail3');

$drname4 = filter_input(INPUT_POST, 'drname4');
$drlicensenum4 = filter_input(INPUT_POST, 'drlicensenum4');
$drnpi4 = filter_input(INPUT_POST, 'drnpi4');
$drdeanum4 = filter_input(INPUT_POST, 'drdeanum4');
$dremail4 = filter_input(INPUT_POST, 'dremail4');

$region = filter_input(INPUT_POST, 'region');
$repname = $_SESSION['name'];
$repemail = $_SESSION['email'];
$comments = "TEST PRACTICE";

$otherlic = '';
$othername = '';
$othertitle = '';

$pcode = substr(strtoupper(preg_replace('/\s/', '', $pname)), 0, 6);

$parent_id = 0;

// INSERT practice

$Practice = new Practice();
$insert_obj = new stdClass();
$id = 0;
foreach ($Practice->fields as $field) {
    $insert_obj->$field = (isset($$field)) ? $$field : '';
}

$pid = $Practice->create($insert_obj);
if ($pid === false) {
    trigger_error(__FILE__ . 'Unable to insert into db ', E_USER_ERROR);
    return false;
}
unset($id);
unset($insert_obj);

for ($i = 1; $i < 5; $i++) {
    $var_name = 'drname' . $i;
    $var_email = 'dremail' . $i;
    $var_deanum = 'drdeanum' . $i;
    $var_licensenum = 'drlicensenum' . $i;
    $var_npi = 'drnpi' . $i;
    if ($$var_name != '') {
        $id = 0;
        $drname = $$var_name;
        $dremail = $$var_email;
        $drdeanum = $$var_deanum;
        $drlicensenum = $$var_licensenum;
        $drnpi = $$var_npi;

        // INSERT practice
        $Drinfo = new Drinfo();
        $insert_obj = new stdClass();
        $id = 0;
        foreach ($Drinfo->fields as $field) {
            $insert_obj->$field = (isset($$field)) ? $$field : '';
        }
        $pid = $Drinfo->create($insert_obj);
        if ($pid === false) {
            trigger_error(__FILE__ . 'Unable to insert into db ', E_USER_ERROR);
            return false;
        }
        unset($id);
        unset($insert_obj);
    }
}


if ($_SESSION['debug'] == '1') {
    include '_includes/_debug.php';
}












