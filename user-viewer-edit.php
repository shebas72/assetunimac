<?php
include('dbconnection.php');
session_start();

   if(!isset($_SESSION['login'])){
      header("location:login.php");
      die();
   }

  $id = $_GET['edit'];
  $query = "SELECT * from viewer where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);

if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $title=$_POST['title'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $unid=$_POST['unid'];
    $phone=$_POST['phone'];
    $roles=$_POST['roles'];
 $usrimg=rand(1000,100000)."-".$_FILES['usrimg']['name']; 
$file_loc = $_FILES['usrimg']['tmp_name'];
 $target = "../images/";
 $new_name = $target.time()."-".rand(1000, 9999)."-".$usrimg;



        // $query=mysqli_query($con, "insert into admin (fname, lname, title, email, password, unid, phone, roles,usrimg) value ('$fname', '$lname', '$title', '$email', '$password', '$unid', '$phone', '$roles', '$usrimg' )");


 $query=mysqli_query($con, "update viewer set fname='$fname',lname='$lname',title='$title',email='$email',password='$password',unid='$unid',phone='$phone',roles='$roles',usrimg='$usrimg' where id='$id'");


move_uploaded_file($file_loc,$target.$usrimg);

    if ($query) {
    
     $_SESSION['FLASH'] = 'user updated.';
   header('location: user-edit.php'); //path to your success script
   exit;
    
    // header('Location: brand.php');
    // $msg="Item submitted succeesfully.";
    // exit();
  }
  else
    {
      $msg="Something Went Wrong. Please try again.";
    }




}
?>
<?php include('inc/header.php');?>


<div class="clearfix"></div>
  
  <div class="content-wrapper">
   
    <div class="card">
           <div class="card-body">
           <div class="card-title">Edit Admin</div>
           <hr>
           <form method="POST" action="" enctype="multipart/form-data">
               <?php if ( $message != '' ) { ?>
    <p class="message"><?php echo $message; ?></p>
    <p class="message"><?php echo $existmessage; ?></p>
    <?php } ?>
           <div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">First Name</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="input-21" name="fname" placeholder="Enter first name" value="<?php echo $row['fname']; ?>">
            </div>
          
          </div>

 <div class="form-group row">
           
              <label for="input-22" class="col-sm-2 col-form-label">Last Name</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="input-22" name="lname" placeholder="Enter last name" value="<?php echo $row['lname']; ?>">
            </div>
          </div>

          <div class="form-group row">
            <label for="input-22" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="input-22" name="title" placeholder="Enter title" value="<?php echo $row['title']; ?>">
            </div>
          </div>
            <div class="form-group row">
            <label for="input-23" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="input-23" name="email" placeholder="Enter email" value="<?php echo $row['email']; ?>">
            </div>
           
            </div>
               <div class="form-group row">
            <label for="input-23" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="input-23" name="password" placeholder="Enter password">
            </div>
           
            </div>
             <div class="form-group row">
            <label for="input-23" class="col-sm-2 col-form-label">Unimac ID</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="input-23" name="unid" placeholder="Enter id" value="<?php echo $row['unid']; ?>">
            </div>
           
            </div>
               <div class="form-group row">
          
            <label for="input-22" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="input-22" name="phone" placeholder="Enter phone" value="<?php echo $row['phone']; ?>">
            </div>
            </div>
             
          <div class="form-group row">
            <label for="input-22" class="col-sm-2 col-form-label">Group</label>
            <div class="col-sm-4"> 
             <select class="custom-select" name="roles" id="inputGroupSelect01 status">
                    <option selected><?php echo $row['roles']; ?></option>
                    <option value="Admin">Admin</option>
                    <option value="Manager">Manager</option>
                    <option value="Viewer">Viewer </option>
                   
                  </select>
            </div>
        
          </div>
<div class="row">
 <div class="col-lg-2">
       
        <p>&nbsp;</p>
      </div>

           <div class="col-lg-4">
        <img class="mr-3 rounded-circle" id="blah" src="http://placehold.it/180" alt="your image" width="180" height="180" />
        <p>&nbsp;</p>
      </div>

    </div>
 <div class="form-group row">
        <div class="input-group mb-3">
 <label for="input-22" class="col-sm-2 col-form-label">Profile picture</label>
                  <div class="custom-file col-sm-4">

                    <input onchange="readURL(this);" type="file" name="usrimg" class="custom-file-input" id="inputGroupFile01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                  </div>
                </div>
              </div>
           <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
            <button type="submit" name="submit" class="btn btn-primary px-5"><i class="icon-lock"></i> UPDATE</button>
            </div>
          </div>
          </form>
         </div>
       </div>

 <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
  
  <!--Start footer-->
  <footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © <?php echo date('Y'); ?> Unimac Assets
        </div>
      </div>
    </footer>
  <!--End footer-->
  
   
  </div><!--End wrapper-->
  
<!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  
  <!-- simplebar js -->
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>

  <!--Data Tables js-->
  <script src="assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/jszip.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/pdfmake.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/vfs_fonts.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/buttons.html5.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/buttons.print.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js"></script>

    <script>
     $(document).ready(function() {
      //Default data table
       $('#default-datatable').DataTable();


       var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'print']
      } );

         var table = $('#example1').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'print']
      } );
 

   var table = $('#example2').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'print']
      } );
 
 
     table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
      
      } );

    </script>
  
</body>
</html>
