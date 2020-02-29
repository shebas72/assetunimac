<?php
include('dbconnection.php');
session_start();

   if(!isset($_SESSION['login'])){
      header("location:login.php");
      die();
   }


    $id = $_GET['rq'];
  $query = "SELECT * from asset where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);

 $query1 = "SELECT * from employees"; 
$result1 = mysqli_query($con, $query1) or die ( mysqli_error($con));
$row1 = mysqli_fetch_assoc($result1);

if(isset($_POST['request']))
  {
    $asid=$_POST['asid'];
    $loginuser=$_POST['loginuser'];
    $fromdate=$_POST['fromdate'];
    $todate=$_POST['todate'];
    $notes=$_POST['notes'];
  
  
     
 
 $query=mysqli_query($con, "insert into request (asid, loginuser, fromdate, todate, notes) value ('$asid', '$loginuser', '$fromdate', '$todate', '$notes')");



    if ($query) {
    
     $_SESSION['FLASH'] = 'Request sent.';
   header('location: asset-rq.php'); //path to your success script
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

$logedInUsername = $_SESSION['login'];
?>

<?php include('inc/header.php');?>


   
<div class="clearfix"></div>
  
  <div class="content-wrapper">

      <div class="row">
      <div class="col-lg-12">
         
         <div class="card">
           <div class="card-body">
           <div class="card-title">Request Asset</div>
           <hr>
            <form method="POST" action="" enctype="multipart/form-data">
               <?php if ( $message != '' ) { ?>
    <p class="message"><?php echo $message; ?></p>
    <p class="message"><?php echo $existmessage; ?></p>
    <?php } ?>
           <div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">Asset ID</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="asid" name="asid" placeholder="Enter ID" value="<?php echo $row['asid']; ?>" readonly>
            </div>
              <label for="input-22" class="col-sm-2 col-form-label">Requested by</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="loginuser" name="loginuser" value="<?php echo $logedInUsername; ?>" readonly>
            </div>
          </div>


           
         
            <div class="form-group row">
            <label for="input-23" class="col-sm-2 col-form-label">From</label>
            <div class="col-sm-4">
            <input type="date" class="form-control" id="fromdate" name="fromdate" placeholder="Enter date">
            </div>
            <label for="input-22" class="col-sm-2 col-form-label">To</label>
            <div class="col-sm-4">
            <input type="date" class="form-control" id="todate" name="todate" placeholder="Enter Date">
            </div>
            </div>
             
       

            <div class="form-group row">
            <label for="input-22" class="col-sm-2 col-form-label">Notes</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="notes" id="input-22" placeholder="Notes">
            </div>
              
          </div>
            





           <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
            <button type="submit" name="request" class="btn btn-primary px-5"><i class="icon-lock"></i> REQUEST</button>
            </div>
          </div>
          </form>
         </div>
       </div>

    

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
 
  
</body>
</html>

             