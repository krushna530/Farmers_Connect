<?php
// Include config file for database connection
require_once('config.php');
session_start(); // Start the session

// Check if the user is logged in
if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
    $fname = $_SESSION['fname'];
    //echo "Welcome, $fname!";
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit;
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $msg = $_POST['msg'];

    // SQL query to insert data into the database
    $sql = "INSERT INTO userproblem (user_id, name, email, phone, message) VALUES ('$user_id', '$uname', '$email', '$phone', '$msg')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Your Problem Received by the Expert');</script>";
        // Redirect the user to another page after submitting the problem
        // header("Location: another_page.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection (if required)
// $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Your Problem</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* Additional CSS styles here */
        .form-box {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(36, 67, 40, 0.8);
            padding: 15px;
            border-radius: 8px;
        }
        label {
            font-size: 17px;
            color: green;
            font-weight: 600;
        }
        input,
        textarea {
            border-radius: 10px;
        }
        .field {
            margin-bottom: 15px; /* Add margin between fields */
        }
        button {
            background-color: #368b44;
            color: #fff;
            border: none;
            border-radius: 25px;
            font-size: 15px;
            transition: .2s linear;
            margin-top: 10px; /* Add margin to the top of the button */
        }
        h1 {
            color: green;
        }
    </style>
</head>
<body>
    <?php include('header.php'); ?>
    <center><button type="button" class="btn btn-warning mt-5"><a href="answer.php">Your Solution</a></button></center>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-box">
                    <form method="post">
                        <label for="uname">
                            <i class="fa fa-solid fa-user"></i>
                            Name
                        </label>
                        <input type="text" id="uname" name="uname" class="form-control field" required>

                        <label for="email">
                            <i class="fa fa-solid fa-envelope"></i>
                            Email Address
                        </label>
                        <input type="email" id="email" name="email" class="form-control field" required>

                        <label for="phone">
                            <i class="fa-solid fa-phone"></i>
                            Phone No
                        </label>
                        <input type="tel" id="phone" name="phone" class="form-control field" required>

                        <label for="msg">
                            <i class="fa-solid fa-comments" style="margin-right: 3px;"></i>
                            Write your Problems:
                        </label>
                        <textarea id="msg" name="msg" class="form-control field" rows="4" required></textarea>

                        <!-- Add a hidden input field to store the user's ID -->
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

                        <button type="submit" class="btn btn-success btn-block" name="submit">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
