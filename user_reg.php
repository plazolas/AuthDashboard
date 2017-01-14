<?php
require_once('_includes/_config.php');

$Practice = new Practice();

$mypid = '';
if(isset($_REQUEST['pid']) && $_REQUEST['pid'] != ''){
    $tmp_pid = trim(filter_input(INPUT_GET, 'pid'));
    $mypid = $Practice->db->real_escape_string($tmp_pid);
}

if($mypid != ''){
    $my_practice = $Practice->get($mypid);
    $_SESSION['newuser']['region'] = $my_practice['region'];
    $_SESSION['newuser']['practice'] = $my_practice['pname'];
    $_SESSION['newuser']['role'] = 'practice';
    $_SESSION['newuser']['user'] = '';
    $_SESSION['newuser']['name'] = '';
    $_SESSION['newuser']['password'] = '';
    $allpractices = $Practice->get_by_region($_SESSION['newuser']['region']);
} else {
    $allpractices = $Practice->get_by_region($_SESSION['region']);
}
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
                <div class="main" style="position: relative; top: 30px">
                    <section>
                        <div class="container-fluid right-pane" style="position: relative; left: 8%">
                        <div class="row-fluid">
                            <?php
            if(isset($_REQUEST['error']) &&  $_REQUEST['error'] != ''){
                echo "<div class='alert' style='width:50%'>";
                echo $_REQUEST['error'];
                echo "</div>";
            }
        ?>
                            <form action="user_save.php" method="POST">
                            <div class="text-center"><h2>NEW USER REGISTRATION</h2></div>
                                <table class="borderless">
                                    <tr><td>&nbsp;</td><td><input type="hidden" name="id" class="form-control" value="0" /></td></tr>        
                                    <tr><td><b>Region</b></td> 
                                        <td>
                                                <select name="region" style="position: relative;right: 0px" onChange="getPractices(this.value);">
                                                    <option value="SE"   <?php if (isset($_SESSION['newuser']['region']) && $_SESSION['newuser']['region'] == "SE")   { echo " selected "; } ?>>South East</option>
                                                    <option value="NE"   <?php if (isset($_SESSION['newuser']['region']) && $_SESSION['newuser']['region'] == "NE")   { echo " selected "; } ?>>North East</option>
                                                    <option value="SW"   <?php if (isset($_SESSION['newuser']['region']) && $_SESSION['newuser']['region'] == "SW")   { echo " selected "; } ?>>South West</option>
                                                    <option value="UPMW" <?php if (isset($_SESSION['newuser']['region']) && $_SESSION['newuser']['region'] == "UPMW") { echo " selected "; } ?>>Upper Mid West</option>
                                                    <option value="PAC"  <?php if (isset($_SESSION['newuser']['region']) && $_SESSION['newuser']['region'] == "PAC")  { echo " selected "; } ?>>Pacific</option>
                                                    <option value="AK"   <?php if (isset($_SESSION['newuser']['region']) && $_SESSION['newuser']['region'] == "AK")   { echo " selected "; } ?>>Alaska</option>
                                                </select>
                                        </td>
                                    </td></tr>
                                    <tr><td><b>Practice</b></td>
                                        <td>
                                    <select id="practice-list" name="practice" style="position: relative;right: 0px" >
<?php
foreach ($allpractices as $mypractice) {
    echo '<option value="' . $mypractice['pname'] . '"';
    if (isset($_SESSION['newuser']['practice'])) {
        if($_SESSION['newuser']['practice'] == $mypractice['pname']){
           echo " selected ";
        }
    } else {
        if($_SESSION['practice'] == $mypractice['pname']) {
           echo " selected ";
        }
    }
    echo ' >' . $mypractice['pname'] . '</option>';
}
?>
                                    </select>
                                    </td></tr>
                                    <tr><td><b>user:</b></td><td> <input type="text" name="user" class="form-control" value="<?php echo (isset($_SESSION['newuser']['user']) && $_SESSION['newuser']['user'] != '') ? $_SESSION['newuser']['user'] : ''; ?>" required /></td></tr>
                                    <tr><td><b>name:</b></td><td> <input type="text" name="name" class="form-control" value="<?php echo (isset($_SESSION['newuser']['name']) && $_SESSION['newuser']['name'] != '') ? $_SESSION['newuser']['name'] : ''; ?>" required /></td></tr>
                                    <tr><td><b>email:</b></td><td> <input type="email" name="email" class="form-control"  value="<?php echo (isset($_SESSION['newuser']['email']) && $_SESSION['newuser']['email'] != '') ? $_SESSION['newuser']['email'] : ''; ?>" required /></td></tr>
                                    <tr><td><b>password:</b></td><td> <input type="text" name="password" class="form-control"  value="<?php echo (isset($_SESSION['newuser']['password']) && $_SESSION['newuser']['password'] != '') ? $_SESSION['newuser']['password'] : ''; ?>" required /></td></tr>
                                    <tr><td><b>role</b></td> 
                                        <td>
                                                <select name="role" style="position: relative;right: 0px" >
                                                    <option value="sales" <?php if (isset($_SESSION['newuser']['role']) && $_SESSION['newuser']['role'] == "sales")   { echo " selected "; } ?>>Sales</option>
                                                    <option value="marketing" <?php if (isset($_SESSION['newuser']['role']) && $_SESSION['newuser']['role'] == "marketing")   { echo " selected "; } ?>>Marketing</option>
                                                    <option value="practice" <?php if (isset($_SESSION['newuser']['role']) && $_SESSION['newuser']['role'] == "practice")   { echo " selected "; } ?>>Practice</option>
                                                    <?php if($_SESSION['role'] == 'admin') { ?>
                                                    <option value="admin" <?php if (isset($_SESSION['newuser']['role']) && $_SESSION['newuser']['role'] == "admin")   { echo " selected "; } ?>>Administrator</option>
                                                    <?php } ?>
                                                </select>
                                        </td>
                                    <tr><td colspan="2">&nbsp;</td></tr>
                                    <tr><td colspan="2">
                                        <div class="text-center">
                                           <input class="test-btn" type="submit" name="submit" value="CREATE NEW USER" />
                                        </div>
                                        </td>
                                    </tr>
                                </table>
                            
                            <br><br><br><br><br>
                                
                            </form>
                        </div>
                        </div>
                    </section>
                </div>
            </div>
            <br /><br />
        </div>
        <?php include '_includes/_footer.php' ?>
        <?php
           if ($_SESSION['debug'] == '1') {
               include '_includes/_debug.php';
           }
        ?>
        
<script src="js/jquery.js"></script>
<script>
function getPractices(region) {
   $.ajax({
	type: "POST",
	url: 'get_practices_by_region.php?region='+region+'&hash='+'<?php echo $_COOKIE['authID']; ?>',
	data: { },
	success: function(data){
		$("#practice-list").html(data);
	    },
        error: function (request, status, error) {
            alert(request.responseText);
        } 
   });
}
</script>
    </body>
</html>

