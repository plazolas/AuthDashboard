<?php
include('_includes/_config.php');

if(!isset($_REQUEST['id']) || $_REQUEST['id'] == '' ||  !isset($_REQUEST['type']) || $_REQUEST['type'] == ''){
    header("Location: dashboard.php?error=ERROR_VIEWING_REPORT");
    exit();
}
$id = $_REQUEST['id'];
$type = $_REQUEST['type'];

$Obj1 = '';
$Obj2 = '';
switch ($type) {
    case 'User':
        $Obj1 = new User();
        break;
}
$user = $Obj1->get($id);

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
                            
                            <div class="text-center"><h2><?php echo strtoupper($user['name']) ?></h2></div>
                                <table class="borderless">
                                    <tr><td><b>ID:</b></td><td><input type="text" name="id" class="form-control" value="<?php echo $user['id']; ?>" disabled/></td></tr>        
                                    <tr><td><b>Region</b></td> 
                                        <td>
                                                <select name="region" style="position: relative;right: 0px" disabled>
                                                    <option value="SE" <?php if($user['region'] == "SE") { echo " selected ";} ?>>South East</option>
                                                    <option value="NE" <?php if($user['region'] == "NE") { echo " selected ";} ?>>North East</option>
                                                    <option value="SW" <?php if($user['region'] == "SW") { echo " selected ";} ?>>South West</option>
                                                    <option value="UPMW" <?php if($user['region'] == "UPMW") { echo " selected ";} ?>>Upper Mid West</option>
                                                    <option value="PAC" <?php if($user['region'] == "PAC") { echo " selected ";} ?>>Pacific</option>
                                                    <option value="AK" <?php if($user['region'] == "AK") { echo " selected ";} ?>>Alaska</option>
                                                </select>
                                        </td>
                                    </td></tr>
                                    <tr><td><b>user:</b></td><td> <input type="text" name="user" class="form-control" value="<?php echo $user['user']; ?>" disabled/></td></tr>
                                    <tr><td><b>name:</b></td><td> <input type="text" name="name" class="form-control" value="<?php echo $user['name']; ?>" disabled/></td></tr>
                                    <tr><td><b>email:</b></td><td> <input type="email" name="email" class="form-control" value="<?php echo $user['email']; ?>" disabled/></td></tr>
                                    <tr><td><b>password:</b></td><td> <input type="text" name="password" class="form-control" value="<?php echo $user['password']; ?>" disabled/></td></tr>
                                    <tr><td><b>role:</b></td><td> <input type="text" name="role" class="form-control" value="<?php echo $user['role']; ?>" disabled/></td></tr>
                                    <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                    <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                    <tr><td colspan="2">
                                        <div class="row text-right">
                                           <a href="user_edit.php?id=<?=$id?>&type=<?=$type?>"> <input class="test-btn" type="submit" name="submit" value="EDIT" /></a>
                                        </div>
                                        </td>
                                    </tr>
                                </table>
                            <br><br>
                        </div>
                        </div>
                    </section>
                </div>
            </div>
            <br /><br />
        </div>
        <?php include '_includes/_footer.php' ?>
        <?php
        if($_SESSION['debug'] == '1') {
            include '_includes/_debug.php';
        }
        ?>
    </body>
</html>

