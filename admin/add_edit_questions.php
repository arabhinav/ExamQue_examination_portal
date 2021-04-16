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

    $id=$_GET["id"];
    $exam_category='';
    $res=mysqli_query($link, "select * from exam_category where id=$id");
    while ($row=mysqli_fetch_array($res)) 
    {
        $exam_category=$row["category"];
    }
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add / Edit Questions in <?php echo "<font color='blue'>" .$exam_category. "</font>"; ?></h1>
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
                                
                <div class="col-lg-12">
                        <form name = "form1" action="" method="post" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header"><strong>Add New Question</strong> </div>

                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">Question</label><input 
                                type="text" name="question" placeholder="Add question" class="form-control">    
                                </div>
                                                            
                                <div class="form-group"><label for="company" class=" form-control-label">Option 1</label><input 
                                type="text" name="opt1" placeholder="Add option 1" class="form-control">    
                                </div>
                            
                                <div class="form-group"><label for="company" class=" form-control-label">Option 2</label><input 
                                type="text" name="opt2" placeholder="Add option 2" class="form-control">    
                                </div>
                            
                                <div class="form-group"><label for="company" class=" form-control-label">Option 3</label><input 
                                type="text" name="opt3" placeholder="Add option 3" class="form-control">    
                                </div>
                            
                                <div class="form-group"><label for="company" class=" form-control-label">Option 4</label><input 
                                type="text" name="opt4" placeholder="Add option 4" class="form-control">    
                                </div>

                                <div class="form-group"><label for="company" class=" form-control-label">Answer</label><input 
                                type="text" name="answer" placeholder="Add answer" class="form-control">    
                                </div>
                                

                                <div class="form-group">
                                    <input type="submit" name="submit1" value="Add Question" class="btn btn-success">
                                </div>
                            </div>
                        </div>   

                    </div>


                </div>
                        </div>

                    </div>
                    <!--/.col-->
                </div>


 <!-- ---------------- Question List---------------- -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Question</th>
                                            <th>Option1</th>
                                            <th>Option2</th>
                                            <th>Option3</th>
                                            <th>Option4</th>
                                            <th>Answer</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                
                                    <?php

                                        $res=mysqli_query($link, "select * from questions where category='$exam_category' order by question_no asc");
                                        while ($row=mysqli_fetch_array($res)) {
                                        echo "<tr>";
                                            echo "<td>"; echo $row["question_no"];  echo "</td>";
                                            echo "<td>"; echo $row["question"];  echo "</td>";

                                            echo "<td>"; 
                                                if (strpos($row["opt1"], 'opt_images/' !== false)) {    
                                                    ?>
                                                    <img src="<?php echo$row["opt1"] ?>" alt="option1" height="50" width="50">
                                                    <?php
                                                }
                                                else {
                                                    echo $row["opt1"];
                                                }
                                            echo "</td>";

                                            echo "<td>"; 
                                            if (strpos($row["opt2"], 'opt_images/' !== false)) {    
                                                ?>
                                                <img src="<?php echo$row["opt2"] ?>" alt="option2" height="50" width="50">
                                                <?php
                                            }
                                            else {
                                                echo $row["opt2"];
                                            }
                                            echo "</td>";
                                            
                                            echo "<td>"; 
                                            if (strpos($row["opt3"], 'opt_images/' !== false)) {    
                                                ?>
                                                <img src="<?php echo$row["opt3"] ?>" alt="option3" height="50" width="50">
                                                <?php
                                            }
                                            else {
                                                echo $row["opt3"];
                                            }
                                            echo "</td>";
                                            
                                            echo "<td>"; 
                                            if (strpos($row["opt4"], 'opt_images/' !== false)) {    
                                                ?>
                                                <img src="<?php echo$row["opt4"] ?>" alt="option1" height="50" width="50">
                                                <?php
                                            }
                                            else {
                                                echo $row["opt4"];
                                            }
                                            echo "</td>";

                                            echo "<td>"; 
                                            if (strpos($row["answer"], 'opt_images/' !== false)) {    
                                                ?>
                                                <img src="<?php echo$row["answer"] ?>" alt="answer" height="50" width="50">
                                                <?php
                                            }
                                            else {
                                                echo $row["answer"];
                                            }
                                            echo "</td>";

                        // -----------------For Edit action
                                            echo "<td>";
                                            if (strpos($row["answer"], 'opt_images/' !== false)) {    
                                                ?>
                                               <a href="edit_option_images.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?> ">Edit</a>
                                                <?php
                                            }
                                            else {
                                                ?>
                                               <a href="edit_option.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?> ">Edit</a>
                                                <?php
                                            }
                                            echo "</td>";

                        // -----------------For Delete action
                                            echo "<td>";
                                                ?>
                                                <a href="delete_option.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?> ">Delete</a>
                                                <?php
                                            echo "</td>";

                                        
                                        echo "</tr>";
                                        }
                                    ?>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div><!-- .animated -->
        </div><!-- .content -->

    <?php
        if (isset($_POST["submit1"])) {
            $loop=0;

            $res=mysqli_query($link, "select * from questions where category='$exam_category' order by id asc") or die(mysqli_error($link));
            
            $count=mysqli_num_rows($res);

            if ($count==0) {
                
            }
            else {
                while ($row=mysqli_fetch_array($res)) {
                    $loop=$loop+1;
                    mysqli_query($link, "update questions set question_no='$loop' where id=$row[id]");
                }
            }

            $loop=$loop+1;

            mysqli_query($link, "insert into questions values(NULL, '$loop', '$_POST[question]', '$_POST[opt1]', '$_POST[opt2]', '$_POST[opt3]', '$_POST[opt4]', '$_POST[answer]', '$exam_category')") or die(mysqli_error($link));
        
            ?>
             <script type="text/javascript">
                window.location.href = window.location.href;
            </script>
            <?php
        }

        
    
    
    
    ?>

    <?php
        include "footer.php";
    ?>
