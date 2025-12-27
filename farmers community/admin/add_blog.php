<?php include('header.php');

if(isset($_SESSION['admin_id']))
{
    $admin_id=$_SESSION['admin_id']['0'];
    
}
?>
<div class="container">
	<h5 class="mb-2 text-gray-800">Blogs</h5>
	<div class="row">
		<div class="col-xl-7 col-lg-5">
			<div class="card">
				<div class="card-header">
					<h6 class="font-weight-bold text-primary mt-2">Create Blog</h6>
				</div>
				<div class="card-body">
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="mb-3">
						<input type="text" name="btitle" placeholder="Title" class="form-control" required>
						</div>
                        <div class="mb-3">
							<label>Body/Description</label>
							<textarea required class="form-control" name="bdesc" rows="2" id="blog"></textarea>
						</div>
						<div class="mb-3">
							<input type="file" name="bimage" class="form-control" required>
						</div>
						<div class="mb-3">
							<input type="submit" name="add_blog" value="Add" class="btn btn-primary">

							<a href="categories.php" class="btn btn-secondary">Back</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include "footer.php";
if (isset($_POST['add_blog'])) 
{
	$title=mysqli_real_escape_string($conn,$_POST['btitle']);
	$desc=mysqli_real_escape_string($conn,$_POST['bdesc']);
	$filename=$_FILES['bimage']['name'];
	$tmp_name=$_FILES['bimage']['tmp_name'];
	$size=$_FILES['bimage']['size'];
	$image_ext=strtolower(pathinfo($filename,PATHINFO_EXTENSION));
	$allow_type=['jpg','png','jpeg'];
	$destination="upload/".$filename;
    if (in_array($image_ext, $allow_type)) {
		if ($size <= 2000000) {
			move_uploaded_file($tmp_name, $destination);
            $sql2="INSERT INTO blog(btitle,bdesc,bimage,admin_id) VALUES('$title','$desc','$filename','$admin_id')";
            $query2=mysqli_query($conn,$sql2);
            if($query2){
                echo"<script>alert('Publish Successfully');</script>";
                
            }
            else
			{
				echo"<script>alert('Failed');</script>";
		    }
        }
        else
        {
            echo"<script>alert('Image size is not greater than 2mb');</script>";
        }
    }
    else
    {
        echo"<script>alert('only jpg,png,jpeg file allowed');</script>";

    }
}

?>