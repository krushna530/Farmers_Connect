<?php
include("exp_include/header.php");
require("config.php");

// Check if the problem ID is provided for deletion
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    
    // Delete the record from the userproblem table
    $sqlDelete = "DELETE FROM userproblem WHERE id = $delete_id";
    if (mysqli_query($conn, $sqlDelete)) {
        // Deletion successful
        echo "<script>alert('Delete Successfully');</script>";
    } else {
        // Error occurred while deleting
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

?>

<div class="posts-list w-100 p-5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width:5%;">Sr No</th>
                <th style="width:10%;">Name</th>
                <th style="width:10%;">Email</th>
                <th style="width:10%;">Phone</th>
                <th style="width:35%;">Message</th>
                <th style="width:25%;">Action</th>
                <th style="width:15%;">Status</th> <!-- Added Status column header -->
            </tr>
        </thead>
        <tbody>
            <?php
            $sqlSelect = "SELECT u.*, er.problem_id AS replied 
                          FROM userproblem u 
                          LEFT JOIN expert_replies er ON u.id = er.problem_id";
            $result = mysqli_query($conn, $sqlSelect);
            $count = 0;
            while ($data = mysqli_fetch_array($result)) {
                $status = ($data["replied"] !== null) ? "Completed" : "Pending"; // Set status based on replied flag
                ?>
                <tr>
                    <td><?= ++$count ?></td>
                    <td><?php echo $data["name"] ?></td>
                    <td><?php echo $data["email"] ?></td>
                    <td><?php echo $data["phone"] ?></td>
                    <td><?php echo $data["message"] ?></td>
                    <td>
                        <a class="btn btn-warning" href="reply.php?id=<?php echo $data["id"] ?>">Reply</a>
                        <a class="btn btn-danger" href="view_problem.php?delete_id=<?php echo $data["id"] ?>">Delete</a>
                    </td>
                    <td><?php echo $status ?></td> <!-- Display status -->
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
</div>
</body>
</html>
