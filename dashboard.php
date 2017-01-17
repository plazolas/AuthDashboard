<?php
include('_includes/_config.php');

if(isset($_SESSION['quiz_completed'])) {
    unset($_SESSION['quiz_completed']);
}

$mypid = $_SESSION['pid'];
if($mypid == ''){
    $User = new User();
    $user_arr = $User->get($_SESSION['user_id']);
    $mypid = $user_arr['pid'];
    unset($User);
} 

$Practice = new Practice();
$practice_arr = $Practice->get($mypid);
if($practice_arr == false) {
    header("Location: logout.php");
    exit();
}

unset($_SESSION['config']);
$_SESSION['config']['practice'] = $practice_arr;

if (count($practice_arr) > 0) {
    $pid = $_SESSION['config']['practice']['id'];
    $Drinfo = new Drinfo();
    $doctors = $Drinfo->get_by_parent($pid);
    $_SESSION['config']['doctors'] = $doctors;
    
}
?>
<!DOCTYPE html>
<html lang="en">
    <?php
           include '_includes/_head.php'
    ?>
    <body>
        <?php include '_includes/_header.php'; ?>
        <div class="container-fluid-full">
            <div class="row-fluid" >				
                <?php include '_includes/_nosidenav.php' ?>
                <section>
                    <div class="main">
                        <div class="container-fluid right-pain">
                    <div id="rowa" class="row-fluid" style="margin-top:-40px;">	
                        <?php
                        //ADMIN
                        if ($_SESSION['role'] == "admin") {
                            include '_chunks/admin.php';
                        }
                        //PRACTICE or FACULTY
                        elseif ($_SESSION['role'] == "practice") {
                            include '_chunks/practice.php';
                        }
                        //SALES
                        elseif ($_SESSION['role'] == "sales") {

                            include '_chunks/sales.php';
                        }
                        //MARKETING
                        elseif ($_SESSION['role'] == "market") {
                            include '_chunks/market.php';
                        }
                        // NOT LOGGED IN
                        else {
                            header("Location: logout.php");
                            exit();
                        }
                        ?>	
                        </div>
                    </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="clearfix"></div>
        <?php
        include '_includes/_footer.php';
        ?>
    </body>
</html>
