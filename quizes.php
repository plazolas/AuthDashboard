<?php
include('_includes/_config.php');
?>
<!DOCTYPE html>
<html lang="en">
    <?php
    include '_includes/_head.php' 
    ?>
    <body>
        <script src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>
        <script src="//cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
        <script src="//cdn.datatables.net/responsive/1.0.1/js/dataTables.responsive.js"></script>
        <?php
        include '_includes/_header.php'
        ?>
        <div class="container-fluid-full">
            <div class="row-fluid" >				
                <?php
                include '_includes/_nosidenav.php'
                ?>
                <noscript>
                <div class="alert alert-block span10">
                    <h4 class="alert-heading">Warning!</h4>
                    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
                </div>
                </noscript>
                <section id="content" class="span10" style="margin-left: 18%">
                    <div id="rowa" class="row-fluid" style="margin-top:-40px;">	
                        <?php
                        
                        $output_fields = array('id', 'techname', 'techemail', 'pid', 'location', 'score', 'user_id', 'quiz_datetime');
                        $Obj = new Quiz();
                        $rows = $Obj->get_all();
                        $columns = $Obj->fields;
                        
                        $Practice = new Practice();
                        ?>
                        <table><tr><td style="width: 40%"><h3>QUIZ MANAGER</h3></td>
                                   <td style="width: 40%">&nbsp;</td>
                                   <td style="width: 20%">
                                       &nbsp;
                                       <!--a href="_qualquiz.php">
                                           <input type="submit" name="submit" value="NEW QUIZ" class="test-btn"/>
                                       </a-->
                                   </td>
                        </table>
                        <table id="shTable" class="table table-striped table-bordered bootstrap-datatable datatable list-table">
                            <thead class="thead-inverse"><tr>
                                    <?php
                                    echo "<th>&nbsp;</th>";
                                    foreach ($columns as $column) {
                                        if($column == 'pid') {
                                            echo "<th><center><b>" . strtoupper('PRACTICE') . "</b></center></th>";
                                            continue;
                                        }
                                        if (in_array($column, $output_fields)) {
                                            echo "<th><center><b>" . strtoupper($column) . "</b></center></th>";
                                        }
                                    }
                                    ?>
                                </tr></thead>
                            <?php
                            foreach ($rows as $row) {
                                if($row['id'] == 99999) continue;
                                echo "<tr>";
                                    echo '<td id="icons" style="background-color: #08c; width: 40px;white-space: nowrap">'
                                    . '<a title="view" href="quiz_view.php?id=' . $row['id'] . '&type='.get_class($Obj).'"><i class="halflings-icon white eye-open"></i></a> | '
                                    . '<a title="delete" href="delete.php?id=' . $row['id'] . '&type='.get_class($Obj).'" onclick="return confirm_delete(' . $row['id'] . ')"><i class="halflings-icon white remove-sign"></i>'
                                    . '</td>';
                                
                                foreach ($columns as $column) {
                                        if (in_array($column, $output_fields)) {
                                          if($column == 'pid') {
                                              if($row[$column] == 0) { 
                                                  $tmp_practice['pname'] = 'N/A';
                                              } else {
                                                  $tmp_practice = $Practice->get($row[$column]);
                                              }
                                              $row[$column] = $tmp_practice['pname'];
                                          }
                                            $data = (isset($row[$column]) && $row[$column] != '') ? $row[$column] : '&nbsp;';
                                            echo "<td>" . $data . "</td>";
                                        }
                                }
                                echo "</tr>";
                            }
                            ?>
                        </table>
                    </div>
                </section>
            </div>
        </div>
        <?php include '_includes/_footer.php' ?>
        <?php
           if ($_SESSION['debug'] == '1') {
               include '_includes/_debug.php';
           }
        ?>

        <script>
            $(document).ready(function () {
                var shTable = $('#shTable').DataTable({
                    "fnDrawCallback": function (oSettings) {
                        $('#shTable_paginate ul').addClass('pagination-active-dark');
                    },
                    searchable: true,
                    "bFilter": true,
                    responsive: true,
                    "order": [[0, "desc"]]
                });

            });
        </script>
        <script>
            function confirm_delete(id) {
                var r = confirm("DELETE QUIZ WITH id: " + id + " ?");
                if (r == true) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
        <style>
            .paginate_enabled_next, .paginate_enabled_previous {
                padding-left: 30px;
                color: #C97626;
                text-decoration: underline;
            }
            .paginate_disabled_next, .paginate_disabled_previous {
                padding-left: 30px;
                color: #000;
            }
        </style>
    </body>
</html>












