<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>Register</title>
</head>
<body>
    <div>
    <?php
include("header.php");

if(isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $checkQuery = "SELECT * FROM users WHERE email='$email'";
$checkResult = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($checkResult) > 0) {
    echo "<script>alert('Email already exists');</script>";
} else {

    $sql = "INSERT INTO users (fname, lname, email, mobile, address, city, state, password, cpassword) 
            VALUES ('$fname', '$lname', '$email', '$mobile', '$address', '$city', '$state', '$password', '$cpassword')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Data inserted successfully');</script>";
        header("location: index.php");
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}
}
?>
</div>
<div class="container py-3">
    <div class="row">
        <div class="col-md-10">
           
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card border-secondary">
                        <div class="card-header">
                            <h3 class="mb-0 my-1">Sign Up</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" action="registration.php" method="post" autocomplete="off">
                                <div class="form-group">
                                    <label for="inputName">First Name</label>
                                    <input type="text" class="form-control" id="inputName" name="fname" placeholder="First name">
                                    <label for="inputName">Last Name</label>
                                    <input type="text" class="form-control" id="inputName" name="lname" placeholder="Last name">
                                </div>
                                
                                 <div class="form-group">
                                    <label for="inputEmail3">Email</label>
                                    <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="email@gmail.com" required="">
                                </div> 
                                <div class="form-group">
                                    <label for="inputName">Mobile No</label>
                                    <input type="text" class="form-control" id="inputMobile" name="mobile" placeholder="Mobile">
                                </div>
                                <div class="form-group">
                                    <label for="inputAdd">Address</label>
                                    <input type="text" class="form-control" id="inputAdd" name="address" placeholder="Address">
                                </div>

                                <div class="form-group">
                                    <label for="inputCity">City</label>
                                    <input type="text" class="form-control" id="inputCity" name="city" placeholder="City">
                                 </div>

                                <div class="form-group">
                                    <label for="inputState">State</label>
                                    <input type="text" class="form-control" id="inputState" name="state" placeholder="State">
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputPassword">Password</label>
                                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="password" title="At least 6 characters with letters and numbers" required="">
                                </div>
                                <div class="form-group">
                                    <label for="inputCpass">Confirm Password</label>
                                    <input type="password" class="form-control" id="inputCpass" name="cpassword" placeholder="password (again)" required="">
                                </div>
                                <div class="form-group">
                                    <button type="submit"  class="btn btn-success btn-sm float-right" name="submit" value="signup">Register</button>
                                </div>
                            </form>
                        </div>
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
