
<?php include('header.php');
$sql="SELECT * FROM users";
$query=mysqli_query($conn,$sql);
$rows=mysqli_num_rows($query);

?>

<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <h5 class="mb-2 text-gray-800">Chats</h5>
   <!-- DataTales Example -->
   <div class="card shadow">
      <div class="card-header py-3 d-flex justify-content-between">
         <div>
            <a href="">
               <h6 class="font-weight-bold text-primary mt-2">Show Chat</h6>
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
                     <th>First Name</th>
                     <th>Last Name</th>
                     <th>Email</th>
                     <th>Mobile</th>
                     <th>Address</th>
                     <th>City</th>
                     <th>State</th>
                     <th colspan="2">Action</th>
                  </tr>
               </thead>
               <tbody>
                <?php 
                    $count=0;
                    if($rows)
                    {
                        while($result=mysqli_fetch_assoc($query))
                        {
                            ?>
                            <tr>
                            <td><?= ++$count ?></td>
                            <td><?= $result['fname'] ?></td>
                            <td><?= $result['lname'] ?></td>
                            <td><?= $result['email'] ?></td>
                            <td><?= $result['mobile'] ?></td>
                            <td><?= $result['address'] ?></td>
                            <td><?= $result['city'] ?></td>
                            <td><?= $result['state'] ?></td>
                            <td>
                            <form class="mt-2" method="POST"onsubmit="return confirm('Are you sure you want to delete?')">
                              <input type="hidden" name="userid" value="<?= $result['id'] ?>">
                             
                              <input type="submit" name="deleteUser" value="Delete" class="btn btn-sm btn-danger">
                           </form>
                            </td>
                        </tr>
                        <?php
                        }
                    }
                    else
                    {
                        ?>
                        <tr><td>NO record Found</td></tr>
                        <?php
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
if(isset($_POST['deleteUser'])) 
{
   $id=$_POST['userid'];
   
   $delete="DELETE FROM users WHERE id='$id'";
   $run=mysqli_query($conn,$delete);
   if ($run) {
      
      echo"<script>alert('delete Successfully');</script>";
      // $msg=['Post has been deleted successfully','alert-success'];
      //    $_SESSION['msg']=$msg;
      // header("location:admin.php");
   }
   else
   {
    echo"<script>alert('cant delete');</script>";
   }
}
?>