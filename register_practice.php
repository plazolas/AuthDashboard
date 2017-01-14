<?php
include('_includes/_config.php');

$user_id = $_SESSION['user_id'];
$updated = date('Y-m-d H:i:s');

$update_id = filter_input(INPUT_POST, 'id');
$parent_id = filter_input(INPUT_POST, 'parent_id');

$pname = ucfirst(filter_input(INPUT_POST, 'pname'));
$contactname = ucfirst(filter_input(INPUT_POST, 'contactname'));
$contacttitle = filter_input(INPUT_POST, 'contacttitle');
$contactemail = filter_input(INPUT_POST, 'contactemail');
$address = filter_input(INPUT_POST, 'address');
$address2 = filter_input(INPUT_POST, 'address2');
$city = ucfirst(filter_input(INPUT_POST, 'city'));
$state = filter_input(INPUT_POST, 'state');
$zip = filter_input(INPUT_POST, 'zip');
$phone = filter_input(INPUT_POST, 'phone');
$fax = filter_input(INPUT_POST, 'fax');

$locname1 = ucfirst(filter_input(INPUT_POST, 'locname1'));
$locname2 = ucfirst(filter_input(INPUT_POST, 'locname2'));
$locname3 = ucfirst(filter_input(INPUT_POST, 'locname3'));
$locname4 = ucfirst(filter_input(INPUT_POST, 'locname4'));

$drname1 = ucfirst(filter_input(INPUT_POST, 'drname1'));
$drlicensenum1 = filter_input(INPUT_POST, 'drlicensenum1');
$drnpi1 = filter_input(INPUT_POST, 'drnpi1');
$drdeanum1 = filter_input(INPUT_POST, 'drdeanum1');
$dremail1 = filter_input(INPUT_POST, 'dremail1');

$drname2 = ucfirst(filter_input(INPUT_POST, 'drname2'));
$drlicensenum2 = filter_input(INPUT_POST, 'drlicensenum2');
$drnpi2 = filter_input(INPUT_POST, 'drnpi2');
$drdeanum2 = filter_input(INPUT_POST, 'drdeanum2');
$dremail2 = filter_input(INPUT_POST, 'dremail2');

$drname3 = ucfirst(filter_input(INPUT_POST, 'drname3'));
$drlicensenum3 = filter_input(INPUT_POST, 'drlicensenum3');
$drnpi3 = filter_input(INPUT_POST, 'drnpi3');
$drdeanum3 = filter_input(INPUT_POST, 'drdeanum3');
$dremail3 = filter_input(INPUT_POST, 'dremail3');

$drname4 = ucfirst(filter_input(INPUT_POST, 'drname4'));
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

if ($parent_id == '') {
    $parent_id = 0;
}

// INSERT practice

$Practice = new Practice();
$insert_obj = new stdClass();
$id = 0;
foreach ($Practice->fields as $field) {
    $insert_obj->$field = (isset($$field)) ? $$field : '';
}

if ($update_id != '') {
    $practice_id = $update_id;
    $insert_obj->id = $practice_id;
    $result = $Practice->set($insert_obj);
    if ($result === false) {
        trigger_error(__FILE__ . 'Unable to update practice ', E_USER_ERROR);
        return false;
    }
} else {
    //print_r($insert_obj);exit;
    $practice_id = $Practice->create($insert_obj);
    if ($practice_id === false) {
        trigger_error(__FILE__ . 'Unable to insert into db ', E_USER_ERROR);
        return false;
    }
}
unset($id);
unset($insert_obj);

$pid = $practice_id;
$Drinfo = new Drinfo();
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
        $insert_obj = new stdClass();
        $id = 0;
        foreach ($Drinfo->fields as $field) {
            $insert_obj->$field = (isset($$field)) ? $$field : '';
        }
        $insert_obj->dt = date('Y-m-d H:i:s');
        //print_r($insert_obj);exit;
        $drinfo_id = $Drinfo->create($insert_obj);
        if ($drinfo_id === false) {
            trigger_error(__FILE__ . 'Unable to insert into db ', E_USER_ERROR);
            return false;
        }
        unset($id);
        unset($insert_obj);
    }
}

$html = ' <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">';
$html .= "<head>";
$html .= "</head>";
$html .= "<body>";
$html .= '<a id="brand" class="navbar-brand" href="https://www.allergyassistprogram.com"><img src="https://www.allergyassistprogram.com/images/logo2.png" alt="allmedrx"></a>';
$html .= "<h3>A New Practice Has Been Register by {$_SESSION['name']}</h3><br />";
$html .= "<div><center>";
$html .= "<table class='table noborder'><tr>";
$html .= "<td style='width: 100px'><strong>Practice:</strong></td><td>" . strtoupper($pname) . "</td>";
$html .= "<td style='width: 100px'><strong>Title:</strong></td><td>" . $contacttitle . "</td></tr>";
$html .= "<tr><td style='width: 100px'><strong>Contact Name:</strong></td><td>" . $contactname . "</td>";
$html .= "<td><strong>Region:</strong></td><td>" . $region . "</td></tr>";
$html .= "<tr><td style='width: 100px'><strong>Contact Email:</strong></td><td>" . $contactemail . "</td>";
$html .= "<td><strong>Practice Id</strong></td><td>{$pid}</td></tr>";
$html .= "</table></center></div><br><br>";
$html .= "<div><center>";
$html .= "<table class='table noborder'><tr>";
$html .= "<td style='width: 100px'><strong>Adress:</strong></td><td>" . $address . "</td>";
$html .= "<td style='width: 100px'><strong>City:</strong></td><td>" . $city . "</td></tr>";
$html .= "<tr><td style='width: 100px'><strong>State:</strong></td><td>" . $state . "</td>";
$html .= "<td><strong>Zip</strong></td><td>" . $zip . "</td></tr>";
$html .= "<tr><td style='width: 100px'><strong>Phone:</strong></td><td>" . $phone . "</td>";
$html .= "<td><strong>Fax</strong></td><td>{$fax}</td></tr>";
$html .= "</table></center></div>";
$html .= "<br /><br />";
$html .= "</body>";
$html .= "</html>";

include("libraries/PHPMailer/class.phpmailer.php");

$phpemail = new PHPMailer();

if (preg_match('/localhost/', $_SERVER['HTTP_HOST'])) {
  $phpemail->IsSMTP(); // Use SMTP
  $phpemail->Host        = "smtp.gmail.com"; // Sets SMTP server
  $phpemail->SMTPDebug   = 2; // 2 to enable SMTP debug information
  $phpemail->SMTPAuth    = TRUE; // enable SMTP authentication
  $phpemail->SMTPSecure  = "tls"; //Secure conection
  $phpemail->Port        = 587; // set the SMTP port
  $phpemail->Username    = 'plazolas@gmail.com'; // SMTP account username
  $phpemail->Password    = 'y6u7i8o9'; // SMTP account password
  $phpemail->Priority    = 1; // Highest priority - Email priority (1 = High, 3 = Normal, 5 = low)
  $phpemail->CharSet     = 'UTF-8';
}


$phpemail->IsHTML(true);
$phpemail->From = 'plazolas@gmail.com';
$phpemail->FromName = 'AllergyAssistProgram';
$phpemail->Subject = 'A new Practice has been registered @ allergyassistprogam.com';
$phpemail->Body = $html;
//$phpemail->AddAddress('registration@allergyassist.net');
$phpemail->AddAddress('plazolas@yahoo.com');

ob_start();
$result = $phpemail->Send();
ob_end_clean();
if ($result == false) {
    trigger_error(__METHOD__ . 'ERROR emailing practice info : ' . $id, E_USER_ERROR);
    die(__FILE__ . 'ERROR emailing new practice info : ' . $id);
}
unset ($phpemail);

$url = 'practices.php';
header("Location: $url");
exit();














