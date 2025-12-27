<?php
require('config.php');

$sql = "SELECT fname, chat, time FROM message ORDER BY time ASC";
$query = mysqli_query($conn, $sql);

if (!$query) {
    die("Error in SQL query: " . mysqli_error($conn));
}

if (mysqli_num_rows($query) > 0) {
    echo '<div style="max-width: 600px; margin: 20px auto; padding: 10px; background-color: #f4f4f4; border-radius: 8px;">';
    while ($row = mysqli_fetch_array($query)) {
        echo '<div style="margin-bottom: 10px;">';
        echo '<span style="font-weight: bold; color: #3498db;">' . $row['fname'] . '</span>: ';
        echo '<span style="margin-right: 10px;">' . $row['chat'] . '</span>';
        echo '<span style="font-size: 0.8em; color: #888;">(' . $row['time'] . ')</span>';
        echo '</div>';
    }
    echo '</div>';
}
?>
