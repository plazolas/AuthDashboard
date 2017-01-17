<?php 
include('_includes/_config.php');

if(!isset($_REQUEST['id']) || $_REQUEST['id'] == '' ||  !isset($_REQUEST['type']) || $_REQUEST['type'] == ''){
    header("Location: dashboard.php?error=ERROR_VIEWING_REPORT");
    exit();
}
$id = $_REQUEST['id'];
$type = $_REQUEST['type'];

$Obj1 = '';
switch ($type) {
    case 'Quiz':
        $Obj1 = new Quiz();
        $Obj2 = new Practice();
        break;
}
$quiz = $Obj1->get($id);
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
                    <div class="row-fluid">	
                        <?php

                        $techname = $quiz['techname'];
                        $location = $quiz['location'];
                        $techemail = $quiz['techemail'];
                        $pid = $quiz['pid'];
                        $a1 = $quiz['A1'];
                        $a2 = $quiz['A2'];
                        $a3 = $quiz['A3'];
                        $a4 = $quiz['A4'];
                        $a5 = $quiz['A5'];
                        $a6 = $quiz['A6'];
                        $a7 = $quiz['A7'];
                        $a8 = $quiz['A8'];
                        $a9 = $quiz['A9'];
                        $a10 = $quiz['A10'];
                        
                        $tmp_practice = $Obj2->get($pid);
                        
                        $score = 0;
                        /* Getting quiz answers */
                        $answer = $Obj1->get_answers();
                        
                        $c1 = $answer['A1'];
                        $c2 = $answer['A2'];
                        $c3 = $answer['A3'];
                        $c4 = $answer['A4'];
                        $c5 = $answer['A5'];
                        $c6 = $answer['A6'];
                        $c7 = $answer['A7'];
                        $c8 = $answer['A8'];
                        $c9 = $answer['A9'];
                        $c10 = $answer['A10'];

                        /* Gradre Test */
                        if ($a1 == $c1) {
                            $score = $score + 10;
                            $a1status = "<p style='color:#00ff00;'><strong>correct</strong></p>";
                        } else {
                            $a1status = "<p style='color:#ff0000;'><strong>incorrect</strong></p>";
                        }

                        if ($a2 == $c2) {
                            $score = $score + 10;
                            $a2status = "<p style='color:#00ff00;'><strong>correct</strong></p>";
                        } else {
                            $a2status = "<p style='color:#ff0000;'><strong>incorrect</strong></p>";
                        }

                        if ($a3 == $c3) {
                            $score = $score + 10;
                            $a3status = "<p style='color:#00ff00;'><strong>correct</strong></p>";
                        } else {
                            $a3status = "<p style='color:#ff0000;'><strong>incorrect</strong></p>";
                        }

                        if ($a4 == $c4) {
                            $score = $score + 10;
                            $a4status = "<p style='color:#00ff00;'><strong>correct</strong></p>";
                        } else {
                            $a4status = "<p style='color:#ff0000;'><strong>incorrect</strong></p>";
                        }

                        if ($a5 == $c5) {
                            $score = $score + 10;
                            $a5status = "<p style='color:#00ff00;'><strong>correct</strong></p>";
                        } else {
                            $a5status = "<p style='color:#ff0000;'><strong>incorrect</strong></p>";
                        }

                        if ($a6 == $c6) {
                            $score = $score + 10;
                            $a6status = "<p style='color:#00ff00;'><strong>correct</strong></p>";
                        } else {
                            $a6status = "<p style='color:#ff0000;'><strong>incorrect</strong></p>";
                        }

                        if ($a7 == $c7) {
                            $score = $score + 10;
                            $a7status = "<p style='color:#00ff00;'><strong>correct</strong></p>";
                        } else {
                            $a7status = "<p style='color:#ff0000;'><strong>incorrect</strong></p>";
                        }

                        if ($a8 == $c8) {
                            $score = $score + 10;
                            $a8status = "<p style='color:#00ff00;'><strong>correct</strong></p>";
                        } else {
                            $a8status = "<p style='color:#ff0000;'><strong>incorrect</strong></p>";
                        }

                        if ($a9 == $c9) {
                            $score = $score + 10;
                            $a9status = "<p style='color:#00ff00;'><strong>correct</strong></p>";
                        } else {
                            $a9status = "<p style='color:#ff0000;'><strong>incorrect</strong></p>";
                        }

                        if ($a10 == $c10) {
                            $score = $score + 10;
                            $a10status = "<p style='color:#00ff00;'><strong>correct</strong></p>";
                        } else {
                            $a10status = "<p style='color:#ff0000;'><strong>incorrect</strong></p>";
                        }

                        /*  Create Results Page */
                        echo "<h3 class='text-center'>Education Center Certification Quiz Results</h3><br />";
                        echo "<div><center>";
                        echo "<table class='table noborder'><tr>";
                        echo "<td style='width: 100px'><strong>Education Center:</strong></td><td>" . strtoupper($tmp_practice['pname']) . "</td>";
                        echo "<td tyle='width: 100px'><strong>Location:</strong></td><td>" . $location . "</td></tr>";
                        echo "<tr><td style='width: 100px'><strong>Name:</strong></td><td>" . $techname . "</td>";
                        echo "<td><strong>Quiz Number:</strong></td><td>" . $id . "</td></tr>";
                        echo "<tr><td style='width: 100px'><strong>Email:</strong></td><td>" . $techemail . "</td>";
                        echo "<td><strong>&nbsp;</strong></td><td>&nbsp;</td></tr>";
                        echo "</table></center></div>";

                        //Determine Pass/Fail >80 
                        if ($score > 79) {
                            $result = "PASSED";
                            echo "<h2 align='center'>Congradulations! You have PASSED!</h2>";
                        } else {
                            $result = "FAILED";
                            echo "<h2 align='center'>You <span style='color: red'>FAILED.</span></h2>";
                        }
                        //echo "<p align='center'><em>Please <a href=''>print</a> for your records</em></p><hr /><br /><h3>Your Results</h3></p>";
                        echo "<table class='table' style='border: 1px solid black;'>";
                        echo "<tr><td style='border-left: 1px solid black;border-top: 1px solid black;'><strong>Q1:</strong></td><td style='border-top: 1px solid black;'>&nbsp;" . $a1 . "&nbsp;</td><td style='border-right: 1px solid black; border-top: 1px solid black;'>" . $a1status . "</td>";
                        echo "<td style='border-top: 1px solid black;'><strong>Q2:</strong></td><td style='border-top: 1px solid black;'>&nbsp;" . $a2 . "&nbsp;</td><td style='border-right: 1px  solid black; border-top: 1px  solid black;'>" . $a2status . "</td>";
                        echo "<td style='border-top: 1px solid black;'><strong>Q3:</strong></td><td style='border-top: 1px solid black;'>&nbsp;" . $a3 . "&nbsp;</td><td style='border-right: 1px  solid black; border-top: 1px  solid black;'>" . $a3status . "</td>";
                        echo "<td style='border-top: 1px solid black;'><strong>Q4:</strong></td><td style='border-top: 1px solid black;'>&nbsp;" . $a4 . "&nbsp;</td><td style='border-right: 1px  solid black; border-top: 1px  solid black;'>" . $a4status . "</td>";
                        echo "<td style='border-top: 1px solid black;'><strong>Q5:</strong></td><td style='border-top: 1px solid black;'>&nbsp;" . $a5 . "&nbsp;</td><td style='border-right: 1px  solid black; border-top: 1px  solid black;'>" . $a5status . "</td>";
                        echo "<tr><td style='border-left: 1px  solid black;'><strong>Q6:</strong></td><td>&nbsp;" . $a6 . "&nbsp;</td><td style='border-right: 1px  solid black;'>" . $a6status . "</td>";
                        echo "<td><strong>Q7:</strong></td><td>&nbsp;" . $a7 . "&nbsp;</td><td style='border-right: 1px  solid black;'>" . $a7status . "</td>";
                        echo "<td><strong>Q8:</strong></td><td>&nbsp;" . $a8 . "&nbsp;</td><td style='border-right: 1px  solid black;'>" . $a8status . "</td>";
                        echo "<td><strong>Q9:</strong></td><td>&nbsp;" . $a9 . "&nbsp;</td><td style='border-right: 1px  solid black;'>" . $a9status . "</td>";
                        echo "<td><strong>Q10:</strong></td><td>&nbsp;" . $a10 . "&nbsp;</td><td style='border-right: 1px  solid black;'>" . $a10status . "</td></tr>";
                        echo "</table>";
                        
                        if($score > 79 ) {
                            ?>
<style type="text/css">
@font-face {
    font-family: "diploma-regular";
    src: url(fonts/diploma-regular.ttf) format("truetype");
}
</style>
                            <?php
                            echo '<table width="90%" border="0"><tr><td class="text-center">';
                            echo "<h3><a href='dashboard.php'>Return to Dashboard</a></h3>";
                            echo '</td><td class="text-center">';
                            echo '<a target="_blank" href="download_cert.php?id='.$id.'&type=Quiz"><h3>Download Certificate</h3></a>';
                            echo '</td></tr>';
                            if ($_SESSION['role'] == 'admin') {
                               echo "<tr><td class='text-center' colspan='2'><a href='email_cert.php?id={$id}&type=Quiz'><span class='test-btn'>EMAIL CERTIFICATE</span></a></td></tr>";
                            }
                            echo '</table>';
                            echo "<br><br><hr />";
                            echo "<div>";
                            echo '<img src="images/cert/header.jpg" />';
                            echo "<div class='clearfix'>&nbsp;</div>";
                            echo "<div><center><span style='color: #000; font-family: diploma-regular; font-size: 64px'>{$techname}</span></center></div>";
                            echo "<div class='clearfix'>&nbsp;</div>";
                            echo '<img src="images/cert/footer.jpg" />';
                            echo "</div>";
                            echo "<hr /><br />";
                           
                        } else {
                            echo "<br /><h3 align='center'> <a href='dashboard.php'>Return to Dashboard</a></h3>";
                        }
                        
                        ?>
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
    </body>
</html>

