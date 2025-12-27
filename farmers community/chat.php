
<?php
session_start();
require('config.php');

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send'])) {
    $fname = $_SESSION['fname'];
    $chat = $_POST['message'];

    // Insert the chat message with user's first name
    $sql = "INSERT INTO message (fname, chat) VALUES ('$fname', '$chat')";
    $query = mysqli_query($conn, $sql);

    // Redirect to prevent form resubmission
    header("Location: chat.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chat App</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            function fetchMessages() {
                $.ajax({
                    url: 'fetch_messages.php',
                    method: 'GET',
                    success: function(response) {
                        $('#chat').html(response);
                    }
                });
            }

            fetchMessages();
            setInterval(fetchMessages, 5000);

            $('#send_icon').click(function(e) {
                e.preventDefault();
                var message = $('#message_box').val();

                $.ajax({
                    url: 'send_message.php',
                    method: 'POST',
                    data: { message: message },
                    success: function(response) {
                        $('#message_box').val('');
                        fetchMessages();
                    }
                });
            });
        });
    </script>
</head>
<body>
    <?php include('header.php'); ?>
    <div class="container mt-4">
        <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                Welcome, <?php echo $_SESSION['fname']; ?>!
                <!-- <a href="logout.php" class="btn btn-danger float-right">Logout</a> -->
            </div>
            <div class="card-body">
                <div id="chat">
                    <!-- Messages will be dynamically loaded here -->
                </div>
            </div>
            <div class="card-footer">
                <form>
                    <div class="input-group">
                        <input id="message_box" type="text" name="message" class="form-control" placeholder="Write message" required>
                        <div class="input-group-append">
                            <button id="send_icon" class="btn btn-primary" type="button">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

