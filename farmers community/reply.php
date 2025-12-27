<?php
include("exp_include/header.php");
require("config.php");

// Check if the problem ID is provided in the URL
if (isset($_GET['id'])) {
    $problem_id = $_GET['id'];
    
    // Fetch the problem details from the database
    $sqlSelect = "SELECT name, message FROM userproblem WHERE id=$problem_id";
    $result = mysqli_query($conn, $sqlSelect);
    $data = mysqli_fetch_array($result);
    
    // Handle form submission for replying to the problem
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form data
        $reply = $_POST['reply'];
        
        // Insert the reply into the database with the associated problem ID
        $insertQuery = "INSERT INTO expert_replies (problem_id, reply) VALUES ('$problem_id', '$reply')";
        mysqli_query($conn, $insertQuery);

        echo "<script>alert('Submitted Successfully');</script>";
        
        // Redirect back to the same page after submitting the reply
        // header("Location: view_problem.php?id=$problem_id");
        // exit;
    }
    
    // Display the problem details and reply form
    ?>
    <div class="container">
        <h2>View Farmer's Problem</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Name: <?php echo $data["name"]?></h5>
                <p class="card-text">Message: <?php echo $data["message"]?></p>
            </div>
        </div>
        <hr>
        <h2>Reply to Farmer's Problem</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $problem_id; ?>">
            <div class="form-group">
                <label for="reply">Your Reply:</label>
                <textarea class="form-control" rows="5" id="reply" name="reply" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Reply</button>
        </form>
    </div>
    <?php
} else {
    // Redirect to an error page if ID is not provided
    header("Location: error.php");
    exit;
}

//include("exp_include/footer.php");
?>
