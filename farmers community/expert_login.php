<?php
require('config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>Login</title>
</head>
<body>
  <div>
  <?php
  include("header.php");
  session_start(); 
if((isset($_POST['submit']))&&($_POST['submit']=="Login"))
{
$email=$_POST['email'];
$cpass=$_POST['cpass'];
$sql1="select * from expert where email='$email' and cpass=$cpass";
$result=mysqli_query($conn,$sql1);
$count=mysqli_num_rows($result);
	   if($count==1)	  
	   {
        $row = mysqli_fetch_assoc($result);

        // Store relevant information in session variables
        $_SESSION['id'] = $row['id'];
        $_SESSION['fname'] = $row['fname'];

		  echo"<script>alert('LOGIN SUCCESS');</script>";
      header("Location: view_problem.php");
				
	   }
	   else
	   {
			echo"<script>alert('Wrong Email & Password');</script>";
			//echo mysql_error();
	   }

}

?>
  </div>
<div class="container py-4">
    <div class="row">
        <div class="col-md-10">
           
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card border-secondary">
                        <div class="card-header">
                            <h3 class="mb-0 my-1">Sign In</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" action="expert_login.php" method="post" autocomplete="off">
                                <div class="form-group">
                                    <label for="inputName">Email</label>
                                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Enter your email">
                                    <label for="inputName">Password</label>
                                    <input type="password" class="form-control" id="inputCpass" name="cpass" placeholder="Enter your password">
                                </div>
                                <div class="form-group">
                                    <button type="submit"  class="btn btn-success btn-sm float-left" name="submit" value="Login">Login</button>
                                    </div>
                                <div class="form-group">
                                    <button type="reset"  class="btn btn-success btn-sm float-right" name="reset" value="clear">Reset</button>
                                </div>  
                               
                            </form>
                           
                                </div>
                               <!-- <center> <p>Not Have an Account?<a href="registration.php">click here</a></p></center> -->
                    </div>
                </div>
            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
    <!--/row-->
</div>
<!--/container-->
</body>
</html>