<?php
include('dbconnection.php');
session_start();

   if(!isset($_SESSION['login'])){
      header("location:login.php");
      die();
   }

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

 $test = mysqli_query($con,"SELECT * FROM admin WHERE email='$email'");
     $testresult = mysqli_num_rows($test);
     if($testresult ===0){
 
switch($_POST['roles']) {
    case 'Admin':
      
     $query=mysqli_query($con, "insert into admin (fname, lname, title, email, password, unid, phone, roles,usrimg) value ('$fname', '$lname', '$title', '$email', '$password', '$unid', '$phone', '$roles', '$usrimg' )");

move_uploaded_file($file_loc,$target.$usrimg);
        break;
    case 'Manager':
         $query=mysqli_query($con, "insert into manager (fname, lname, title, email, password, unid, phone, roles,usrimg) value ('$fname', '$lname', '$title', '$email', '$password', '$unid', '$phone', '$roles', '$usrimg' )");

move_uploaded_file($file_loc,$target.$usrimg);
        break;
    case 'Viewer':
         $query=mysqli_query($con, "insert into viewer (fname, lname, title, email, password, unid, phone, roles,usrimg) value ('$fname', '$lname', '$title', '$email', '$password', '$unid', '$phone', '$roles', '$usrimg' )");

move_uploaded_file($file_loc,$target.$usrimg);
        break; 
   
}
}
else
{
   echo '<script language="javascript" type="text/javascript"> 
                alert("Already exist");
                window.location = "new-user.php";
        </script>';
  }
    if ($query) {
    
     $_SESSION['FLASH'] = 'New user added.';
   header('location: users.php'); //path to your success script
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

      <div class="row">
      <div class="col-lg-12">
         
         <div class="card">
           <div class="card-body">
           <div class="card-title">Add New User</div>
           <hr>
           <form method="POST" action="" enctype="multipart/form-data">
               <?php if ( $message != '' ) { ?>
    <p class="message"><?php echo $message; ?></p>
    <p class="message"><?php echo $existmessage; ?></p>
    <?php } ?>
           <div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">First Name</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="input-21" name="fname" placeholder="Enter first name">
            </div>
          
          </div>

 <div class="form-group row">
           
              <label for="input-22" class="col-sm-2 col-form-label">Last Name</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="input-22" name="lname" placeholder="Enter last name">
            </div>
          </div>

          <div class="form-group row">
            <label for="input-22" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="input-22" name="title" placeholder="Enter title">
            </div>
          </div>
            <div class="form-group row">
            <label for="input-23" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="input-23" name="email" placeholder="Enter email">
            </div>
           
            </div>
               <div class="form-group row">
            <label for="input-23" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="input-23" name="password" placeholder="Enter email">
            </div>
           
            </div>
             <div class="form-group row">
            <label for="input-23" class="col-sm-2 col-form-label">Unimac ID</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="input-23" name="unid" placeholder="Enter email">
            </div>
           
            </div>
               <div class="form-group row">
          
            <label for="input-22" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="input-22" name="phone" placeholder="Enter phone">
            </div>
            </div>
             
          <div class="form-group row">
            <label for="input-22" class="col-sm-2 col-form-label">Group</label>
            <div class="col-sm-4"> 
             <select class="custom-select" name="roles" id="inputGroupSelect01 status">
                    <option selected>Choose...</option>
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
            <button type="submit" name="submit" class="btn btn-primary px-5"><i class="icon-lock"></i> ADD USER</button>
            </div>
          </div>
          </form>
         </div>
       </div>


<script type="text/javascript">
  
       function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

 <!--start overlay-->
    <div class="overlay toggle-menu"></div>
  <!--end overlay-->

    

   </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 
  
</body>
</html>
