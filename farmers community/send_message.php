<?php
session_start();
require('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    $fname = $_SESSION['fname'];
    $chat = $_POST['message'];

    $sql = "INSERT INTO message (fname, chat) VALUES ('$fname', '$chat')";
    $query = mysqli_query($conn, $sql);
}
?>
