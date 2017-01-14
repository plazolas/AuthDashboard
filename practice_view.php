<?php
include('_includes/_config.php');

if(!isset($_REQUEST['id']) || $_REQUEST['id'] == '' ||  !isset($_REQUEST['type']) || $_REQUEST['type'] == ''){
    header("Location: dashboard.php?error=ERROR+VIEWING+REPORT");
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
}
$practice = $Obj1->get($id);
$doctors  = $Obj2->get_by_parent($id);

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
                            <div class="row text-right">
                                <a href="practice_edit.php?id=<?=$id?>&type=<?=$type?>"> <input class="test-btn" type="submit" name="submit" value="EDIT" /></a>
                            </div>
                            <div class="text-center"><h2><?php echo strtoupper($practice['pname']) ?></h2></div>
                            <div class="text-center">
                                <table class="borderless">
                                    <tr><td><b>Region</b></td> 
                                        <td>
                                                <select name="region" style="position: relative;right: 0px" disabled>
                                                    <option value="SE" <?php if($practice['region'] == "SE") { echo " selected ";} ?>>South East</option>
                                                    <option value="NE" <?php if($practice['region'] == "NE") { echo " selected ";} ?>>North East</option>
                                                    <option value="SW" <?php if($practice['region'] == "SW") { echo " selected ";} ?>>South West</option>
                                                    <option value="UPMW" <?php if($practice['region'] == "UPMW") { echo " selected ";} ?>>Upper Mid West</option>
                                                    <option value="PAC" <?php if($practice['region'] == "PAC") { echo " selected ";} ?>>Pacific</option>
                                                    <option value="AK" <?php if($practice['region'] == "AK") { echo " selected ";} ?>>Alaska</option>
                                                </select>
                                        </td>
                                    </td></tr>
                                    <tr><td><b>Practice Name:</b></td><td><input type="text" name="pname" class="form-control" value="<?php echo $practice['pname']; ?>" disabled/></td></tr>        
                                    <tr><td><b>Contact Name:</b></td><td> <input type="text" name="contactname" class="form-control" value="<?php echo $practice['contactname']; ?>" disabled/></td></tr>
                                    <tr><td><b>Contact Title:</b></td><td> <input type="text" name="contacttitle" class="form-control" value="<?php echo $practice['contacttitle']; ?>" disabled/></td></tr>
                                    <tr><td><b>Contact Email:</b></td><td> <input type="text" name="contactemail" class="form-control" value="<?php echo $practice['contactemail']; ?>" disabled/></td></tr>
                                            <tr><td><b>Address:</b></td><td> <input type="text" name="address" class="form-control" value="<?php echo $practice['address']; ?>" disabled/></td></tr>
                                            <tr><td><b>Address2:</b></td><td> <input type="text" name="address2" class="form-control" value="<?php echo $practice['address2']; ?>" disabled/></td></tr>
                                            <tr><td><b>City:</b></td><td> <input type="text" name="city" class="form-control" value="<?php echo $practice['city']; ?>" disabled/></td></tr>
                                            <tr><td><b>State:</b></td><td> <input type="text" name="state" class="form-control" value="<?php echo $practice['state']; ?>" disabled/></td></tr>
                                            <tr><td><b>Zipcode</b></td><td> <input type="text" name="zip" class="form-control" value="<?php echo $practice['zip']; ?>" disabled/></td></tr>
                                            <tr><td><b>Phone:</b></td><td> <input type="text" name="phone" class="form-control" value="<?php echo $practice['phone']; ?>" disabled/></td></tr>
                                            <tr><td><b>Fax:</b></td><td> <input type="text" name="fax" class="form-control" value="<?php echo $practice['fax']; ?>" disabled></td></tr>
                                </table>
                            </div>
                                <fieldset>
                                    <br />
                                    <h4 class="text-center">Secondary Practices Location:</h4>
                                    <table class="table noborder"  width="80%"> 
                                        <tr><td width="50%">
                                                <div><b>Main Practice:</b> <input type="text" name="locname1" class="form-control" value="<?php echo $practice['locname1']; ?>" disabled /></div>
                                            </td><td width="50%">
                                                <div><b>Practice 2:</b><input type="text" name="locname2" class="form-control" value="<?php echo $practice['locname2']; ?>" disabled /></div>
                                            </td></tr>
                                    </table>
                                    <table class="table noborder"  width="80%"> 
                                        <tr><td width="50%">
                                                <div><b>Practice 3:</b><input type="text" name="pname4" class="form-control" value="<?php echo $practice['locname3']; ?>" disabled /></div>
                                            </td><td width="50%">
                                                <div><b>Practice 4:</b><input type="text" name="pname5" class="form-control" value="<?php echo $practice['locname4']; ?>" disabled /></div>
                                            </td></tr>
                                    </table>
                                </fieldset>
                                <br />
                                <fieldset>
                                    <h4 class="text-center">PRACTITIONERS INFORMATION:</h4>
                                    <?php
                                    if(count($doctors) == 0) {
                                        $doctors = array(array('drname' => 'N/A','drlicensenum' => 'N/A','drnpi' => 'N/A','drdeanum' => 'N/A','dremail' => 'N/A'));
                                    }
                                    $i=0;
                                    foreach($doctors as $doctor) { ?>
                                    <table class="table noborder" width="80%"> 
                                        <tr>
                                            <td width="50%">
                                                <table class="borderless">
                                                <tr><td><b>Dr Name: </b></td><td><input type="text" name="drname<?php echo $i?>" value="<?php echo $doctor['drname']; ?>" class="form-control" disabled/></td></tr>
                                                <tr><td><b>License #: </b></td><td><input type="text" name="drlicensenum<?php echo $i?>" value="<?php echo $doctor['drlicensenum']; ?>"  class="form-control" disabled/></td></tr>
                                                <tr><td><b>NPI#: </b></td><td><input type="text" name="drnpi<?php echo $i?>" value="<?php echo $doctor['drnpi']; ?>"  class="form-control" disabled/></td></tr>
                                                <tr><td><b>DEA#: </b></td><td><input type="text" name="drdeanum<?php echo $i?>" value="<?php echo $doctor['drdeanum']; ?>"  class="form-control" disabled/></td></tr>
                                                <tr><td><b>Email: </b></td><td><input type="text" name="dremail<?php echo $i?>" value="<?php echo $doctor['dremail']; ?>"  class="form-control" disabled/></td></tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <?php }       ?>
                                </fieldset>
                                <div class="row text-right">
                                    <a href="practice_edit.php?id=<?=$id?>&type=<?=$type?>"> <input class="test-btn" type="submit" name="submit" value="EDIT" /></a>
                                </div>
                        </div>
                        </div>
                    </section>
                </div>
            </div>
            <br /><br />
        </div>
        <?php include '_includes/_footer.php' ?>
        <?php
        if ($_SESSION['email'] == 'kgeorge@allmedrx.net' && $_SESSION['debug'] == '1') {
            echo "<div>";
            echo "<pre>";
            print_r($_SESSION);
            echo "</pre>";
            echo "</div>";
        }
        ?>
    </body>
</html>

