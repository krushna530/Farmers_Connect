<?php
require('config.php');
include('header.php');
session_start(); // Start the session

// Check if the user is logged in
if (isset($_SESSION['id'])) {
    $fname = $_SESSION['fname'];
    //echo "Welcome, $fname!";
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit;
}
$sql="SELECT * FROM blog ORDER BY blog.publish_date DESC";
$query=mysqli_query($conn,$sql);
$row=mysqli_num_rows($query);
?>
<div class="container mt-5">
    <div class="col-lg-12">
        <?php 
            if($row){
                while($result=mysqli_fetch_assoc($query))
                {
                    ?>
                
        
    <div class="card shadow">

  <div class="card-body">
    <!--  -->
    <div class="">
    <h5 class="card-title">
        <?= $result['btitle']?>
    </h5>
    </div>
    <div class="mt-3">
    <p class="card-text">
    <?= strip_tags(substr($result['bdesc'],0,500)).". . . . . . . . . ."?></p>
    </div>
    <div class="mt-3">
       
    </div>
    <div class="mt-3">
    <?php $date=$result["publish_date"] ?>
    <?=date('d-M-Y',strtotime($date))?>
    <span>
    <a href="view.php?bid=<?=$result['bid']?>" class="btn btn-primary">Continue Reading</a>
    <span>
</div>
</div>
</div>
<?php } } ?>
</div>
</div>
<div class="mt-3">

</div>
<?php
// include('footer.php');
?>