<?php
include '_includes/_config.php';

if (isset($_SESSION['quiz_completed'])) {
    header("Location: dashboard.php");
    exit();
}
$_SESSION['quiz_completed'] = '1';
$practice = $_SESSION['config']['practice']['pname'];

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
             <!--div class="main" style="position: relative; top: 30px"-->
                 <section id="content" class="span10" style="margin-left: 18%">
                    <div id="rowa" class="row-fluid" style="margin-top:-40px;">	
                    <?php
                    $techname = ucwords(strtolower(stripslashes(trim(filter_input(INPUT_POST, 'techname')))));
                    $techemail = strtolower(stripslashes(trim(filter_input(INPUT_POST, 'techemail'))));
                    $location = stripslashes(trim(filter_input(INPUT_POST, 'location')));
                    $pid = stripslashes(trim(filter_input(INPUT_POST, 'pid')));
                    $a1 = stripslashes(trim(filter_input(INPUT_POST, 'A1')));
                    $a2 = stripslashes(trim(filter_input(INPUT_POST, 'A2')));
                    $a3 = stripslashes(trim(filter_input(INPUT_POST, 'A3')));
                    $a4 = stripslashes(trim(filter_input(INPUT_POST, 'A4')));
                    $a5 = stripslashes(trim(filter_input(INPUT_POST, 'A5')));
                    $a6 = stripslashes(trim(filter_input(INPUT_POST, 'A6')));
                    $a7 = stripslashes(trim(filter_input(INPUT_POST, 'A7')));
                    $a8 = stripslashes(trim(filter_input(INPUT_POST, 'A8')));
                    $a9 = stripslashes(trim(filter_input(INPUT_POST, 'A9')));
                    $a10 = stripslashes(trim(filter_input(INPUT_POST, 'A10')));
                    $this_user_id = stripslashes(trim(filter_input(INPUT_POST, 'user_id')));

                    $score = 0;
                    /* Getting quiz answers */
                    $Quiz = new Quiz();
                    $answer = $Quiz->get_answers();

                    $c1 = strtoupper($answer['A1']);
                    $c2 = strtoupper($answer['A2']);
                    $c3 = strtoupper($answer['A3']);
                    $c4 = strtoupper($answer['A4']);
                    $c5 = strtoupper($answer['A5']);
                    $c6 = strtoupper($answer['A6']);
                    $c7 = strtoupper($answer['A7']);
                    $c8 = strtoupper($answer['A8']);
                    $c9 = strtoupper($answer['A9']);
                    $c10 = strtoupper($answer['A10']);

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

                    $myquiz = new stdClass();
                    $myquiz->id = 0;
                    $myquiz->techname = $techname;
                    $myquiz->techemail = $techemail;
                    $myquiz->pid = $pid;
                    $myquiz->location = $location;
                    $myquiz->A1 = $a1;
                    $myquiz->A2 = $a2;
                    $myquiz->A3 = $a3;
                    $myquiz->A4 = $a4;
                    $myquiz->A5 = $a5;
                    $myquiz->A6 = $a6;
                    $myquiz->A7 = $a7;
                    $myquiz->A8 = $a8;
                    $myquiz->A9 = $a9;
                    $myquiz->A10 = $a10;
                    $myquiz->score = $score;
                    $myquiz->user_id = $this_user_id;
                    $myquiz->quiz_datetime = date('Y-m-d H:i:s');
                    
                    $qid = $Quiz->create($myquiz);
                    if ($qid === false || $qid == 0) {
                        die("ERROR: a database error has occured;");
                    }

                    /*  Create Results Page */
                    echo "<h3>Faculty Certification Quiz Results</h3><br />";
                    echo "<div><center>";
                    echo "<table class='table noborder'><tr>";
                    echo "<td style='width: 100px'><strong>Learning Center:</strong></td><td>" . strtoupper($practice) . "</td>";
                    echo "<td tyle='width: 100px'><strong>Location:</strong></td><td>" . $location . "</td></tr>";
                    echo "<tr><td style='width: 100px'><strong>Name:</strong></td><td>" . $techname . "</td>";
                    echo "<td><strong>Quiz Number:</strong></td><td>" . $qid . "</td></tr>";
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

                    if ($score > 79) {
                        ?>
                        <style type="text/css">
                            @font-face {
                                font-family: "diploma-regular";
                                src: url(http://localhost/fonts/diploma-regular.ttf) format("truetype");
                            }
                        </style>
                        <?php
                        $font_size = "72px";
                        $name_length = strlen($techname);
                        switch (true) {
                            case $name_length > 21:
                                $font_size = "52px";
                                break;
                        }
                        $output = '
                            <style type="text/css">
                            @font-face {
                               font-family: "diploma-regular";
                               src: url(http://localhost/fonts/diploma-regular.ttf) format("truetype");
                            }
                           </style>
                           <page orientation="landscape" format="370x200" > 
                           <img style="width: 1300px; height: 300px" src="images/cert/header.jpg" />'
                                . '<table style="width: 100%; padding-top:-10px;">
                           <tr>
                           <td style="text-align: center;width=33%;">&nbsp;</td>
                           <td style="text-align: center;width=33%; padding-top:-5px;">
                           <h1 style="font-size: '.$font_size.';font-family: diploma-regular; white-space: nowarp;" >' . $techname . '</h1>
                           </td>
                           <td style="text-align: center;width=33%;">&nbsp;</td>
                           </tr>
                           </table>
                           <img style="width: 1300px; height: 300px" src="images/cert/footer.jpg" />
                           </page>';
                        
                        $myfontfile = __DIR__ . '/vendor/tecnickcom/tcpdf/fonts/diploma-regular.php';
                         
                        $filename = __DIR__ . '/certificates/cert_' . $qid . '.pdf';
                        $html2pdf = new HTML2PDF('L', 'A4', 'en');
                        $html2pdf->addFont('diploma-regular', '', $myfontfile);
                        $html2pdf->WriteHTML($output);
                        $html2pdf->Output($filename, 'F');

                        echo '<table width="90%" border="0"><tr><td class="text-center">';
                        echo "<h3><a href='dashboard.php'>Return to Dashboard</a></h3>";
                        echo '</td><td class="text-center">';
                        echo '<a target="_blank" href="download_cert.php?id=' . $qid . '&type=Quiz"><h3 style="white-space: nowrap">Download Certificate</h3></a>';
                        echo '</td></tr>';
                        echo '</table>';
                        echo '<img src="images/cert/header.jpg" />';
                        echo "<div><center><span style='color: #000; font-family: diploma-regular; font-size: {$font_size}'>{$techname}</span></center></div>";
                        echo '<img src="images/cert/footer.jpg" />';
                    } else {
                        echo "<br /><h3 align='center'> <a href='dashboard.php'>Return to Dashboard</a></h3>";
                    }
                    ?>
                </div>
               </section>
        </div>
    </div>
    <?php
    include '_includes/_footer.php';
    ?>
    <?php
        if ($_SESSION['debug'] == '1') {
            include '_includes/_debug.php';
        }
    ?>
</body>
</html>
