
<?php include('header.php') 

?>

<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <h5 class="mb-2 text-gray-800">Blog Posts</h5>
   <!-- DataTales Example -->
   <div class="card shadow">
      <div class="card-header py-3 d-flex justify-content-between">
         <div>
            <a href="add_blog.php">
               <h6 class="font-weight-bold text-primary mt-2">Add New</h6>
            </a>
         </div>
         <div>
         </div>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>Sr.No</th>
                     <th>Title</th>
                     <th>Admin Username</th>
                     <th>Date</th>
                     <th colspan="2">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                  $sql="SELECT * FROM blog LEFT JOIN admin ON blog.admin_id=admin.admin_id ORDER BY blog.publish_date DESC";
                  $query=mysqli_query($conn,$sql);
                  $rows=mysqli_num_rows($query);
                  $count=0;
                  if($rows){
                           while($result=mysqli_fetch_assoc($query)){
                              ?>
                              <tr>
                                 <td><?= ++$count ?></td>
                                 <td><?= $result['btitle'] ?></td>
                                 <td><?= $result['username'] ?></td>
                                 <td><?= date('d-M-Y',strtotime($result['publish_date'])) ?></td>
                           
                                 <td><a href="edit_blog.php?id=<?= $result['bid'] ?>" class="btn btn-sm btn-success">Edit</a></td>
                        <td>
                           <form class="mt-2" method="POST"onsubmit="return confirm('Are you sure you want to delete?')">
                              <input type="hidden" name="id" value="<?= $result['bid'] ?>">
                              <input type="hidden" name="image" value="<?= $result['bimage'] ?>">
                              <input type="submit" name="deletePost" value="Delete" class="btn btn-sm btn-danger">
                           </form>
                        </td>
                              </tr>
                            <?php
                           }
                  }
                  else{
                     echo"no record";
                  }
                  ?>

               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<!-- /.container-fluid -->
</div>
<?php include('footer.php'); 
if(isset($_POST['deletePost'])) 
{
   $id=$_POST['id'];
   $image="upload/".$_POST['image'];
   $delete="DELETE FROM blog WHERE bid='$id'";
   $run=mysqli_query($conn,$delete);
   if ($run) {
      unlink($image);
      echo"<script>alert('delete Successfully');</script>";
      // $msg=['Post has been deleted successfully','alert-success'];
      //    $_SESSION['msg']=$msg;
      // header("location:admin.php");
   }
   else
   {
      $msg=['Failed,please try again','alert-danger'];
         $_SESSION['msg']=$msg;
      header("location:admin.php");
   }
}



?>