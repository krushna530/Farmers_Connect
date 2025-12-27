<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Messages and Expert Replies</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
        }
        .container {
            margin-top: 20px;
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .message {
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 8px;
            background-color: #f0f0f0;
        }
        .reply {
            margin-top: 10px;
            padding: 10px;
            border-radius: 8px;
            background-color: #d3e8d6;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Your Messages and Expert Replies</h1>

    <?php
    
// Start session to get user information
session_start();

// Check if user is logged in, redirect to login page if not
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

// Include database connection file
include("config.php");

// Retrieve user's ID from session
$user_id = $_SESSION['id'];

// Prepare SQL query to fetch user's messages and expert replies
$sqlSelect = "SELECT userproblem.name AS user_name, userproblem.message AS user_message, expert_replies.reply AS expert_reply
              FROM userproblem
              LEFT JOIN expert_replies ON userproblem.id = expert_replies.problem_id
              WHERE userproblem.user_id = $user_id";

// Execute SQL query
$result = mysqli_query($conn, $sqlSelect);

// Check for errors
if (!$result) {
    echo "Error: " . mysqli_error($conn);
    exit(); // Terminate script execution
}

// Check if there are any messages
if (mysqli_num_rows($result) > 0) {
    // Output each message and its corresponding expert reply
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="message">';
        // echo '<p><strong>User:</strong> ' . $row['user_name'] . '</p>';
        echo '<p><strong>User Message:</strong> ' . $row['user_message'] . '</p>';
        if (!empty($row['expert_reply'])) {
            echo '<div class="reply">';
            echo '<p><strong>Expert Reply:</strong> ' . $row['expert_reply'] . '</p>';
            echo '</div>';
        } else {
            echo '<p><em>No reply provided yet.</em></p>';
        }
        echo '</div>';
    }
} else {
    echo "<p>You Havent Post any question.</p>";
}

// Close database connection
mysqli_close($conn);
?>

</div>

</body>
</html>
