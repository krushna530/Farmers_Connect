<?php include('header.php');

if(isset($_SESSION['admin_id']))
{
    $admin_id=$_SESSION['admin_id']['0'];
}
$blog_ID=$_GET['id'];
$sql="SELECT * FROM blog LEFT JOIN admin ON blog.admin_id=admin.admin_id WHERE bid='$blog_ID'";
$query=mysqli_query($conn,$sql);
$result=mysqli_fetch_assoc($query);
?>
<div class="container">
	<h5 class="mb-2 text-gray-800">Edit Blogs</h5>
	<div class="row">
		<div class="col-xl-8 col-lg-6">
			<div class="card">
				<div class="card-header">
					<h6 class="font-weight-bold text-primary mt-2">Edi Blog Title</h6>
				</div>
				<div class="card-body">
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="mb-3">
						<input type="text" name="btitle" placeholder="Title" class="form-control" required value="<?=$result['btitle']?>">
						</div>
                        <div class="mb-3">
							<label>Edit Body/Description</label>
							<textarea required class="form-control" name="bdesc" rows="2" id="blog">
							<?=$result['bdesc']?>
							</textarea>
						</div>
						<div class="mb-3">
							<input type="file" name="bimage" class="form-control">
							<img src="upload/<?=$result['bimage']?>" width="100px" class="border">
						</div>
						<div class="mb-3">
							<input type="submit" name="edit_blog" value="Update" class="btn btn-primary">

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
	
	if(!empty($filename)){
    if (in_array($image_ext, $allow_type)) {
		if ($size <= 2000000) {
			$unlink="upload/".$result['bimage'];
			unlink($unlink);
			move_uploaded_file($tmp_name, $destination);
			$sql2="UPDATE blog SET btitle='$title',bdesc='$desc',bimage='$filename',admin_id='$admin_id' WHERE bid='$blog_ID'";
			$query2=mysqli_query($conn,$sql2);
            if($query2){
                echo"<script>alert('Update Successfully');</script>";
				header("location:admin.php");
                
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
	// else{
	// 	if (in_array($image_ext, $allow_type)) {
	// 		if ($size <= 2000000) {
	// 			$unlink="upload/".$result['bimage'];
	// 			unlink($unlink);
	// 			move_uploaded_file($tmp_name, $destination);
	// 			$sql2="UPDATE blog SET btitle='$title',bdesc='$desc',admin_id='$admin_id' WHERE bid='$blog_ID'";
	// 			$query2=mysqli_query($conn,$sql2);
	// 			if($query2){
	// 				echo"<script>alert('Update Successfully');</script>";
					
	// 			}
	// 			else
	// 			{
	// 				echo"<script>alert('Failed');</script>";
	// 			}
	// 		}
		
	// 	}
		

	// }
    
}
}
?>