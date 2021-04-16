<?php
    session_start();
    include "connection.php";
?>
<?php
    include "login_header.php";
?>

	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				

			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="" name="form1" method="post" role="login">
                        <h3 style="text-align: center;"> Student Login </h3>
                            <div class="form-group">
                                <input type="text" placeholder="username" title="Please enter you username" required="" value="" name="username" id="username" class="form-control">

                            </div>
                            <div class="form-group">
                                <input type="password" title="Please enter your password" placeholder="password" required="" value="" name="password" id="password" class="form-control">

                            </div>

                            <button type="submit" name="login" class="btn btn-success btn-block loginbtn">Login</button>
                            Don't have an account?<a href="register.php">Register</a>

                            <div id="failure" class="alert alert-danger" style="margin-top: 10px; text-align: center; display: none;">
                                <strong>Error!</strong> Incorrect login credential.
                            </div>

                        </form>
                    </div>
                </div>
			</div>

		</div>   
    </div>
    


<?php
if (isset($_POST["login"])) 
{
    $count = 0;
    $res = mysqli_query($link, "select * from registration where username = '$_POST[username]' && password = '$_POST[password]'") or die(mysqli_error($link)) ;  
      
    $count = mysqli_num_rows($res);
    if ($count == 0) {
    ?>
        <script type="text/javascript">
            document.getElementById("failure").style.display = "block";
        </script>
    <?php
    }  
    else {
        
        $_SESSION["username"] = $_POST["username"];

    ?>       
        <script type = "text/javascript">
            window.location="select_exam.php";
        </script>
    <?php
    }

}
?>

    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery-price-slider.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>

</body>

</html>