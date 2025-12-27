<?php 
    require('config.php');
    include('header.php');

    $id = $_GET['bid'];
    if(empty($id))
    {
        header("location:blog.php");
    }
    $sql="SELECT * FROM blog WHERE bid='$id'";
    $query=mysqli_query($conn,$sql);
    $post=mysqli_fetch_assoc($query);
?>

<div class="post-list mt-5">
        <div class="container">
            <?php
               
                //    while ($data = mysqli_fetch_array($result)) {
                    ?>
                       <div class="post bg-light p-4 mt-5">
                        <div class="container">
                            <?php $img=$post['bimage']?>
                            <img src="admin/upload/<?= $img ?>" style="height:200px; width:250px;" alt="">
                        </div>
                        <hr>
                        <h1><?= $post['btitle']; ?></h1>
                        <!-- <p><?= $post['publish_date']; ?> </p> -->
                        <p><?= strip_tags($post['bdesc']); ?> </p>
                       </div>
                    <?php
                 //   }
                // }else{
                //     echo "No post found";
                // }
            ?>
         </div>
    </div>
<?php 
    // include('footer.php');
?>