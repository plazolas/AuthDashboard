<?php
require_once('_includes/_config.php');

if (!isset($_REQUEST['id']) || $_REQUEST['id'] == '' || !isset($_REQUEST['type']) || $_REQUEST['type'] == '') {
    header("Location: dashboard.php?error=unable+to+edit+user");
    exit();
}
$id = $_REQUEST['id'];
$type = $_REQUEST['type'];

$Obj1 = '';
$Obj2 = '';
switch ($type) {
    case 'User':
        $Obj1 = new User();
        $Obj2 = new Practice();
        break;
}
$user = $Obj1->get($id);
$mypractice = $Obj2->get_by_name($user['practice']);
$pid = $mypractice['id'];
$allpractices = $Obj2->get_by_region($user['region']);
$demo_in = false;
foreach ($allpractices  as $this_practice) {
    if($this_practice['id'] == DEMOPRACTICE) {
        $demo_in = true;
    }
}

// always include demo practice when first edit
if($demo_in == false) {
    $allpractices[] = $Obj2->get(DEMOPRACTICE);
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
                <div class="main">
                    <section style="position: relative; left: 2%">
                        <div class="container-fluid right-pane">
                            <div class="row-fluid">
                                <form action="user_save.php" method="POST">
                                    <div class="text-center"><h2><?php echo strtoupper($user['name']) ?></h2></div>
                                    <table class="borderless">
                                        <tr><td><b>ID:</b></td><td><input type="text" name="my_user_id" class="form-control" value="<?php echo $user['id']; ?>" disabled /></td></tr>        
                                        <tr><td>&nbsp;</td><td><input type="hidden" name="id" class="form-control" value="<?php echo $user['id']; ?>" /></td></tr>        
                                        <tr><td><b>Region</b></td> 
                                            <td>
                                                <select name="region" style="position: relative;right: 0px" onChange="getPractices(this.value);">
                                                    <option value="SE" <?php if ($user['region'] == "SE") {
                    echo " selected ";
                } ?>>South East</option>
                                                    <option value="NE" <?php if ($user['region'] == "NE") {
                    echo " selected ";
                } ?>>North East</option>
                                                    <option value="SW" <?php if ($user['region'] == "SW") {
                    echo " selected ";
                } ?>>South West</option>
                                                    <option value="UPMW" <?php if ($user['region'] == "UPMW") {
                    echo " selected ";
                } ?>>Upper Mid West</option>
                                                    <option value="PAC" <?php if ($user['region'] == "PAC") {
                    echo " selected ";
                } ?>>Pacific</option>
                                                    <option value="AK" <?php if ($user['region'] == "AK") {
                                                        echo " selected ";
                                                    } ?>>Alaska</option>
                                                </select>
                                            </td>
                                            </td></tr>
                                        <tr><td><b>Practice</b></td> 
                                            <td>
                                                <select id="practice-list" name="practice" style="position: relative;right: 0px" >
<?php
foreach ($allpractices as $mypractice) {
    echo '<option value="' . $mypractice['pname'] . '"';
    if ($user['practice'] == $mypractice['pname']) {
        echo " selected ";
    }
    echo ' >' . $mypractice['pname'] . '</option>';
}
?>
                                                </select>
                                            </td>
                                            </td></tr>
                                        <tr><td><b>user:</b></td><td> <input type="text" name="user" class="form-control" value="<?php echo $user['user']; ?>" /></td></tr>
                                        <tr><td><b>name:</b></td><td> <input type="text" name="name" class="form-control" value="<?php echo $user['name']; ?>" /></td></tr>
                                        <tr><td><b>email:</b></td><td> <input type="email" name="email" class="form-control" value="<?php echo $user['email']; ?>" /></td></tr>
                                        <tr><td><b>password:</b></td><td> <input type="text" name="password" class="form-control" value="<?php echo $user['password']; ?>" /></td></tr>
                                        <tr><tr><td><b>role</b></td> 
                                            <td>
                                                <select name="role" style="position: relative;right: 0px" >
                                                    <option value="sales" <?php if ($user['role'] == "sales") {
    echo " selected ";
} ?>>Sales</option>
                                                    <option value="marketing" <?php if ($user['role'] == "marketing") {
    echo " selected ";
} ?>>Marketing</option>
                                                    <option value="practice" <?php if ($user['role'] == "practice") {
    echo " selected ";
} ?>>Practice</option>
        <?php if ($_SESSION['role'] == 'admin') { ?>
                                                        <option value="admin" <?php if ($user['role'] == "admin") {
                echo " selected ";
            } ?>>Administrator</option>
        <?php } ?>
                                                </select>
                                            </td>
                                    </table>
                                    <div class="row text-center">
                                        <input type="hidden" name="currpass" value="<?php echo $user['password']; ?>" />
                                        <input type="hidden" name="curremail" value="<?php echo $user['email']; ?>" />
                                        <input type="hidden" name="pid" value="<?php echo $pid; ?>" />
                                        <input class="test-btn" type="submit" name="submit" value="SAVE" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <br /><br /><br />
        </div>
<?php include '_includes/_footer.php' ?>
<script>
function getPractices(region) {
	$.ajax({
	type: "POST",
	url: 'get_practices_by_region.php?region='+region+'&hash='+'<?php echo $_COOKIE['authID']; ?>',
	data: { },
	success: function(data){
		$("#practice-list").html(data);
	    }
	});
}
</script>
<?php
if ($_SESSION['debug'] == '1') {
    include '_includes/_debug.php';
}
?>
    </body>
</html>

