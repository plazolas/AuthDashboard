<?php
require_once('_includes/_config.php');

if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '') {
    // no direct access -> redirect to CMS home page
    session_destroy();
    header("Location: index.php#login");
    exit();
}
if (!isset($_REQUEST['id']) || $_REQUEST['id'] == '' || !isset($_REQUEST['type']) || $_REQUEST['type'] == '') {
    header("Location: dashboard.php?error=ERROR_VIEWING_REPORT");
    exit();
}
$id = $_REQUEST['id'];
$type = $_REQUEST['type'];

$Obj1 = '';
$Obj2 = '';
switch ($type) {
    case 'Practice':
        $Obj1 = new Practice();
        $Obj2 = new Drinfo();
        break;
    case 'Allergytest':
        $Obj1 = new Allergytest();
        $Obj2 = new Allergytest2();
        break;
    case 'User':
        $Obj1 = new User();
        break;
}
$practice = $Obj1->get($id);
$doctors = $Obj2->get_by_parent($id);
?>
<!DOCTYPE html>
<html lang="en">
    <?php
    include '_includes/_head.php'
    ?>
    <body>
        <?php
        include '_includes/_header.php'
        ?>
        <div class="container-fluid-full">
            <div class="row-fluid" >				
                <?php
                include '_includes/_nosidenav.php'
                ?>
                <div class="main">
                    <section style="position: relative; left: 2%">
                        <div class="container-fluid right-pane">
                            <div class="row-fluid">
                                <div class="text-center"><h2><?php echo strtoupper($practice['pname']) ?></h2></div>
                                <div class="text-center">
                                <form action="register_practice.php" method="post">
                                    <input name="id" type="hidden" value="<?= $id ?>" />
                                    <input name="parent_id" type="hidden" value="<?= $id ?>" />
                                    <table class="borderless">
                                        <tr><td><b>Region</b></td> 
                                            <td>
                                                <select name="region" style="position: relative;right: 0px" >
                                                    <option value="SE" <?php
                                                    if ($practice['region'] == "SE") {
                                                        echo " selected ";
                                                    }
                                                    ?>>South East</option>
                                                    <option value="NE" <?php
                                                    if ($practice['region'] == "NE") {
                                                        echo " selected ";
                                                    }
                                                    ?>>North East</option>
                                                    <option value="SW" <?php
                                                            if ($practice['region'] == "SW") {
                                                                echo " selected ";
                                                            }
                                                            ?>>South West</option>
                                                    <option value="UPMW" <?php
                                                    if ($practice['region'] == "UPMW") {
                                                        echo " selected ";
                                                    }
                                                    ?>>Upper Mid West</option>
                                                    <option value="PAC" <?php
                                                    if ($practice['region'] == "PAC") {
                                                        echo " selected ";
                                                    }
                                                    ?>>Pacific</option>
                                                    <option value="AK" <?php
                                                    if ($practice['region'] == "AK") {
                                                        echo " selected ";
                                                    }
                                                    ?>>Alaska</option>
                                                </select>
                                            </td>
                                            </td></tr>
                                        <tr><td><b>Practice Name:</b></td><td><input type="text" name="pname" class="form-control" value="<?php echo $practice['pname']; ?>" /></td></tr>        
                                        <tr><td><b>Contact Name:</b></td><td> <input type="text" name="contactname" class="form-control" value="<?php echo $practice['contactname']; ?>" /></td></tr>
                                        <tr><td><b>Contact Title:</b></td><td> <input type="text" name="contacttitle" class="form-control" value="<?php echo $practice['contacttitle']; ?>" /></td></tr>
                                        <tr><td><b>Contact Email:</b></td><td> <input type="email" name="contactemail" class="form-control" value="<?php echo $practice['contactemail']; ?>" /></td></tr>
                                        <tr><td><b>Address:</b></td><td> <input type="text" name="address" class="form-control" value="<?php echo $practice['address']; ?>" /></td></tr>
                                        <tr><td><b>Address2:</b></td><td> <input type="text" name="address2" class="form-control" value="<?php echo $practice['address2']; ?>" /></td></tr>
                                        <tr><td><b>City:</b></td><td> <input type="text" name="city" class="form-control" value="<?php echo $practice['city']; ?>" /></td></tr>
                                        <tr><td><b>State:</b></td><td> <input type="text" name="state" class="form-control" value="<?php echo $practice['state']; ?>" /></td></tr>
                                        <tr><td><b>Zipcode</b></td><td> <input type="text" name="zip" class="form-control" value="<?php echo $practice['zip']; ?>" /></td></tr>
                                        <tr><td><b>Phone:</b></td><td> <input type="text" name="phone" class="form-control" value="<?php echo $practice['phone']; ?>" /></td></tr>
                                        <tr><td><b>Fax:</b></td><td> <input type="text" name="fax" class="form-control" value="<?php echo $practice['fax']; ?>" ></td></tr>
                                        <tr><td><b>ACCTID1:</b></td><td> <input type="text" name="ACCTID1" class="form-control" value="<?php echo $practice['ACCTID1']; ?>" ></td></tr>
                                        <tr><td><b>ACCTID2:</b></td><td> <input type="text" name="ACCTID2" class="form-control" value="<?php echo $practice['ACCTID2']; ?>" ></td></tr>
                                    </table>
                                    <fieldset>
                                        <br />
                                        <h4 class="text-center">Satelite Learning Centers Information:</h4>
                                        <table class="table noborder"  width="80%"> 
                                            <tr><td width="50%">
                                                    <div><b>Center:</b> <input type="text" name="locname1" class="form-control" value="<?php echo $practice['locname1']; ?>"  /></div>
                                                </td><td width="50%">
                                                    <div><b>Center:</b><input type="text" name="locname2" class="form-control" value="<?php echo $practice['locname2']; ?>"  /></div>
                                                </td></tr>
                                        </table>
                                        <table class="table noborder"  width="80%"> 
                                            <tr><td width="50%">
                                                    <div><b>Center:</b><input type="text" name="locname3" class="form-control" value="<?php echo $practice['locname3']; ?>"  /></div>
                                                </td><td width="50%">
                                                    <div><b>Center:</b><input type="text" name="locname4" class="form-control" value="<?php echo $practice['locname4']; ?>"  /></div>
                                                </td></tr>
                                        </table>
                                    </fieldset>
                                    <br />
                                    <fieldset>
                                        <h4 class="text-center">TEACHER INFORMATION:</h4>
                                        <div class="row text-left">
                                            <a href="drinfo_edit.php?pid=<?= $id ?>&type=Drinfo" class="test-btn">Edit Teachers</a>
                                        </div>
<?php
if (count($doctors) == 0) {
    $doctors = array(array('drname' => 'N/A', 'drlicensenum' => 'N/A', 'drnpi' => 'N/A', 'drdeanum' => 'N/A', 'dremail' => 'N/A'));
}
$i = 0;
foreach ($doctors as $doctor) {
    ?>
                                            <table class="table noborder" width="80%"> 
                                                <tr>
                                                    <td width="50%">
                                                        <div class="text-right">
                                                            <a href="delete.php?id=<?= $doctor['id'] ?>&type=Drinfo" class="btn btn-warning" onclick="return confirm_delete('<?php echo $doctor['drname']; ?>')" >Delete Doctor</a>
                                                        </div>
                                                        <table class="borderless">
                                                            <tr><td><b>Teacher Name: </b></td><td><input type="text" name="drname<?php echo $i ?>" value="<?php echo $doctor['drname']; ?>" class="form-control" disabled /></td></tr>
                                                            <tr><td><b>License #: </b></td><td><input type="text" name="drlicensenum<?php echo $i ?>" value="<?php echo $doctor['drlicensenum']; ?>"  class="form-control" disabled /></td></tr>
                                                            <tr><td><b>Cert#: </b></td><td><input type="text" name="drnpi<?php echo $i ?>" value="<?php echo $doctor['drnpi']; ?>"  class="form-control" disabled /></td></tr>
                                                            <tr><td><b>Areas: </b></td><td><input type="text" name="drdeanum<?php echo $i ?>" value="<?php echo $doctor['drdeanum']; ?>"  class="form-control" disabled /></td></tr>
                                                            <tr><td><b>Email: </b></td><td><input type="email" name="dremail<?php echo $i ?>" value="<?php echo $doctor['dremail']; ?>"  class="form-control" disabled /></td></tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
        <?php } ?>
                                    </fieldset>
                                    <div class="row text-right">
                                        <input class="test-btn" type="submit" name="submit" value="SAVE" />
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <br /><br />
        </div>
        <?php include '_includes/_footer.php' ?>
        <script>
            function confirm_delete(name) {
                var r = confirm("DELETE DOCTOR : " + name + " ?");
                if (r == true) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>

        <?php
           if ($_SESSION['debug'] == '1') {
              include '_includes/_debug.php';
           }
        ?>
    </body>
</html>

