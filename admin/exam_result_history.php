<?php
    session_start();
    include "header.php";
    include "../connection.php";
    
    if (!isset($_SESSION["admin"])) {
        ?>
        <script type="text/javascript">
            window.location = "index.php";
        </script>
        <?php
    }
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>All Exam Results</h1>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-body">

                                <?php
                                $count=0;
                                $res=mysqli_query($link, "select * from exam_results order by id desc");
                                $count=mysqli_num_rows($res);

                                if ($count==0) {
                                    ?>
                                    <h4 style="text-align: center; margin-top: 10px;">No Results Found</h1>
                                    <?php
                                }
                                else {
                                    echo "<table class='table table-bordered''>";
                                    echo "<tr style='background-color: #40394a; color:white''>";
                                        echo "<th>"; echo "Student Name"; echo "</th>";
                                        echo "<th>"; echo "Exame Name"; echo "</th>";
                                        echo "<th>"; echo "Total Questions"; echo "</th>";
                                        echo "<th>"; echo "Correct Answers"; echo "</th>";
                                        echo "<th>"; echo "Wrong Answers"; echo "</th>";
                                        echo "<th>"; echo "Exam Time"; echo "</th>";
                                    echo "</tr>";

                                    while ($row=mysqli_fetch_array($res)) {
                                        echo "<tr>";
                                        echo "<td>"; echo $row["username"]; echo "</td>";
                                        echo "<td>"; echo $row["exam_type"]; echo "</td>";
                                        echo "<td>"; echo $row["total_question"]; echo "</td>";
                                        echo "<td>"; echo $row["correct_answer"]; echo "</td>";
                                        echo "<td>"; echo $row["wrong_answer"]; echo "</td>";
                                        echo "<td>"; echo $row["exam_time"]; echo "</td>";
                                    echo "</tr>";
                                    }
                                    echo "</table>";
                                }
                                ?>

                            </div>
                        </div>

                    </div>
                    <!--/.col-->

                    


 

  
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

    <?php
        include "footer.php";
    ?>