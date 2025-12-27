<?php
session_start();
require('config.php');

// Check if the user is logged in
if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    $fname = $_SESSION['fname'];
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit;
}

// Function to send messages
function sendMessage($conn, $userId, $message) {
    $message = mysqli_real_escape_string($conn, $message);

    // Insert the new chat message
    $sqlInsertMessage = "INSERT INTO message(user_id, message) VALUES ('$userId', '$message')";
    $queryInsertMessage = mysqli_query($conn, $sqlInsertMessage);
}

// Function to fetch messages
function fetchMessages($conn) {
    $sqlFetchMessages = "
        SELECT users.fname, message.message, message.timestamp
        FROM message
        JOIN user ON users.id = message.id
        ORDER BY message.timestamp DESC
    ";
    $resultFetchMessages = mysqli_query($conn, $sqlFetchMessages);
    $chatMessages = mysqli_fetch_all($resultFetchMessages, MYSQLI_ASSOC);

    foreach ($chatMessages as $chatMessage) {
        echo "<p><strong>{$chatMessage['fname']}</strong> ({$chatMessage['timestamp']}): {$chatMessage['message']}</p>";
    }
}

// Check if the request is for sending a message
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    sendMessage($conn, $userId, $_POST['message']);
    exit; // Stop further execution to avoid fetching messages on sending
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chat App</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/chatcss.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function(){
            // Function to send messages using AJAX
            function sendMessage() {
                var message = $('#message_box').val();
                
                $.ajax({
                    url: 'chat1.php',
                    method: 'POST',
                    data: { message: message },
                    success: function(response) {
                        $('#message_box').val('');
                        fetchMessages(); // Refresh the chat messages after sending
                    }
                });
            }

            // Function to fetch messages using AJAX
            function fetchMessages() {
                $.ajax({
                    url: 'chat1.php',
                    method: 'GET',
                    success: function(response) {
                        $('#chat_box_message1').html(response);
                    }
                });
            }

            // Set up an interval to periodically fetch messages
            setInterval(fetchMessages, 2000);

            // Event listener for the send button
            $('#send_icon').click(function(e) {
                e.preventDefault();
                sendMessage();
            });
        });
    </script>
</head>
<body>
    <div id="container">
        <div id="" style="">
            <label style="float: left; margin-left: 10px; margin-top: 27px; font-weight: bold;"></label>
            <a id="logout" href="logout.php">Logout</a><br><br><br>
            <hr>
        </div>
        <div id="chat">
            <div id="chat_box_main1">
                <div id="chat_box_message1">
                    <?php
                    fetchMessages($conn); // Initial fetch of messages
                    ?>
                </div>
                <div style="margin-left: 400px;">
                </div>
            </div>
        </div>
        <div id="message">
            <form>
                <input id="message_box" type="text" name="message" placeholder="Write message" required>
                <button id="send_icon" style="background: none; border: none;">Send</button>
            </form>
        </div>
    </div>
</body>
</html>
