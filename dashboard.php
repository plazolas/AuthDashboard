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
    echo "<h1>ERROR: you must re login...</h1>";
}

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
                <!------------------------------------ start: Main SIDE Menu ---------------------------------------------------------------------->
                <?php include '_includes/_nosidenav.php' ?>
                <!-------------------------------------------- end: Main Side Menu ------------------------------------------------>
                <noscript>
                <div class="alert alert-block span10">
                    <h4 class="alert-heading">Warning!</h4>
                    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
                </div>
                </noscript>
                <!----------------------------------------- CONTENT SECTION ------------------------------------------------------->
                
                <section>
                    <div class="main">
                        <div class="container-fluid right-pain">
                    <!--------------------------------- BREADCRUMB ---------------------------------------->
                    <!--<ul class="breadcrumb" style="background:#ffffff;font-size:11px;margin-top:-30px;">
                            <li>
                                    <i class="icon-home"></i>
                                    <a href="index.html">Home</a>
                                    <i class="icon-angle-right">></i>
                            </li>
                            <li><a href="frame3.php">Dashboard</a></li>
                    </ul>-->
                    <!--------------------------------------- [start: Content]--------------------------------------->
                    <!--------SEARCH ------>
                    <div id="rowa" class="row-fluid" style="margin-top:-40px;">	
                        <!-------------------[DASHBOARD]-------------------------->
                        <?php
                        //ADMIN
                        if ($_SESSION['role'] == "admin") {
                            include '_widgets/dashboard/admin.php';
                        }
                        //PRACTICE
                        elseif ($_SESSION['role'] == "practice") {
                            include '_widgets/dashboard/practice.php';
                        }
                        //SALES
                        elseif ($_SESSION['role'] == "sales") {

                            include '_widgets/dashboard/sales.php';
                        }
                        //MARKET
                        elseif ($_SESSION['role'] == "market") {

                            include '_widgets/dashboard/market.php';
                        }
                        // NOT LOGGED IN
                        else {
                            echo "Please Login";
                        }
                        ?>	
                        </div>
                    </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="modal hide fade" id="myModal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Settings</h3>
            </div>
            <div class="modal-body">
                <p>Here settings can be configured...</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn" data-dismiss="modal">Close</a>
                <a href="#" class="btn btn-primary">Save changes</a>
            </div>
        </div>

        <div class="clearfix"></div>
        <!------------------------------ [FOOTER] ---------------------------------------------------------------------------->
        <?php
        include '_includes/_footer.php';
        if($_SESSION['debug'] == '1') {
            include '_includes/_debug.php';
        }
        ?>
    </body>
</html>
