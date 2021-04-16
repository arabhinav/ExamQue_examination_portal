<?php
    include "connection.php";
?>
<?php
  include "login_header.php";
?>


	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center custom-login">
				<h3>Register Now</h3>

			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="" name="form1" method="post">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" type="password" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Username</label>
                                    <input type="text" name="username" type="password" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                                <div class="form-group col-lg-12">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Contact</label>
                                    <input type="text" name="contact" class="form-control">
                                </div>
                              </div>
                            <div class="text-center">
                                <button type="submit" name="submit1" class="btn btn-success loginbtn">Register</button>

                            </div>
                            
                            <div id="success" class="alert alert-success" style="margin-top: 10px; text-align: center; display: none;">
                                 <strong>Success!</strong> Registration Complete.
                            </div>
                            <div id="failure" class="alert alert-danger" style="margin-top: 10px; text-align: center; display: none;">
                                <strong>Error!</strong> The User already exist. Try logging in.
                            </div>

                        </form>
                    </div>
                </div>
			</div>

		</div>   
    </div>

<?php
if(isset($_POST["submit1"]))
{
    $count=0;
    $res=mysqli_query($link, "select * from registration where username = '$_POST[username]'") or die(mysqli_error($link)) ; 
    $count=mysqli_num_rows($res);

    if ($count > 0) {
        ?>
        <script type="text/javascript">
            document.getElementById("success").style.display="none";
            document.getElementById("failure").style.display="block";        
        </script>
        <?php
    }
    else
    {
        mysqli_query($link, "insert into registration values(NULL, '$_POST[first_name]', '$_POST[last_name]', '$_POST[username]', '$_POST[password]', '$_POST[email]', '$_POST[contact]')") or die(mysqli_error($link)) ;
        ?>
        <script type="text/javascript">
            document.getElementById("success").style.display="block";   
            document.getElementById("failure").style.display="none"; 
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
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>