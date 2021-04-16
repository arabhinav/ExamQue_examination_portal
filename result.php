<?php
    session_start();
    include "connection.php";
    $date=date("Y-m-d H:i:s");
    $_SESSION["end_time"]=date("Y-m-d H:i:s", strtotime($date."+ $_SESSION[exam_time] minutes"));
    include "header.php";
?>


        <div class="row" style="margin: 0px; padding:0px; margin-bottom: 10px;">

            <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
                <?php
                $correct=0;
                $wrong=0;

                if (isset($_SESSION["answer"])) {
                    for($i=0; $i<=sizeof($_SESSION["answer"]); $i++)
                    {
                        $answer="";
                        $res=mysqli_query($link, "select * from questions where category='$_SESSION[exam_category]' && question_no=$i");
                        while ($row=mysqli_fetch_array($res)) 
                        {
                            $answer=$row["answer"];
                        }

                        if (isset($_SESSION["answer"][$i])) {
                            if ($answer==$_SESSION["answer"][$i]) {
                                $correct=$correct+1;
                            }
                            else
                            {
                                $wrong=$wrong+1;
                            }
                        }
                        else{
                            $wrong=$wrong+1;
                        }
                    }
                }

                $count=0;

                $res=mysqli_query($link, "select * from questions where category='$_SESSION[exam_category]'");
                $count=mysqli_num_rows($res);
                $wrong=$count-$correct;
                
                echo "<br>";  echo "<br";
                echo '<div style=margin:300px 0 0 0;>';
                echo '<h4 style="text-align: center;">';
                echo "Total Questions=".$count;
                echo "</h4>";
                echo '<h4 style="text-align: center; color:green">';
                echo "Correct Answer=".$correct;
                echo "</h4>";
                echo '<h4 style="text-align: center; color:red;">';
                echo "Wrong Answer=".$wrong;
                echo "</h4>";
                echo "</div>";
                ?>
            </div>
        </div>

<?php
if (isset($_SESSION["exam_start"])) 
{
    $date=date("Y-m-d");

    mysqli_query($link, "insert into exam_results(id, username, exam_type, total_question, correct_answer, wrong_answer, exam_time) values(NULL, '$_SESSION[username]', '$_SESSION[exam_category]', '$count', '$correct', '$wrong ', '$date')");
}

if (isset($_SESSION["exam_start"])) {

    unset($_SESSION["exam_start"]);
    ?>
    <script type="text/javascript">
        window.location.href=window.locatiom.href;
    </script>
    <?php
}

?>

<?php
    include "footer.php";
?>