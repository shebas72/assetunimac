<?php
include('dbconnection.php');
session_start();

   if(!isset($_SESSION['login'])){
      header("location:login.php");
      die();
   }


$message = '';

if (isset($_SESSION['FLASH']))
 {
  $message = $_SESSION['FLASH'];
  // $existmessage = $_SESSION['FLASH2'];
  unset($_SESSION['FLASH']);
}

if(isset($_POST['report']))
  {
    $isent=$_POST['isent'];
    $idate=$_POST['idate'];
    $ilocation=$_POST['ilocation'];
    $iperson=$_POST['iperson'];
    $idesc=$_POST['idesc'];
    $inju=$_POST['inju'];
    $idamage=$_POST['idamage'];
    $icause=$_POST['icause'];
    

    $test = mysqli_query($con,"SELECT * FROM incident WHERE id='$id'");
     $testresult = mysqli_num_rows($test);
     if($testresult ===0){
 

     $query=mysqli_query($con, "insert into incident (isent, idate, ilocation, iperson, idesc, inju, idamage, icause) value ('$isent', '$idate', '$ilocation', '$iperson', '$idesc', '$inju', '$idamage', '$icause' )");

}
else
{
   echo '<script language="javascript" type="text/javascript"> 
                alert("Already exist");
                window.location = "asset-add.php";
        </script>';
  }
    if ($query) {
    
     $_SESSION['FLASH'] = 'Report sent.';
   header('location: incident.php'); //path to your success script
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
           <div class="card-title">New Incident Report</div>
           <hr>
            <form method="POST" action="" enctype="multipart/form-data">
               <?php if ( $message != '' ) { ?>
    <p class="message"><?php echo $message; ?></p>
    <p class="message"><?php echo $existmessage; ?></p>
    <?php } ?>
           <div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">Sent by</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="asid" name="isent" value="<?php echo $logedInUsername; ?>" readonly>
            </div>
              <label for="input-22" class="col-sm-2 col-form-label">Date of incident</label>
            <div class="col-sm-4">
            <input type="date" class="form-control" id="cost" name="idate" placeholder="Enter date" required="">
            </div>
          </div>

  <div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">Location</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="asid" name="ilocation" placeholder="Enter Location">
            </div>
              <label for="input-22" class="col-sm-2 col-form-label">Responsible person</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="cost" name="iperson" placeholder="Enter name">
            </div>
          </div>


          <div class="form-group row">
            <label for="input-22" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
              <textarea rows="4" name="idesc" class="form-control" id="basic-textarea"></textarea>
            
              </div>
           
          </div>

 

             <div class="form-group row">
            <label for="input-22" class="col-sm-2 col-form-label">Injury Details</label>
            <div class="col-sm-10">
              <textarea rows="4" name="inju" class="form-control" id="basic-textarea"></textarea>
            
              </div>
            
          </div>


 <div class="form-group row">
            <label for="input-22" class="col-sm-2 col-form-label">Damage Report</label>
            <div class="col-sm-10">
              <textarea rows="4" name="idamage" class="form-control" id="basic-textarea"></textarea>
            
              </div>
            
          </div>

           <div class="form-group row">
            <label for="input-22" class="col-sm-2 col-form-label">What caused the incident?</label>
            <div class="col-sm-10">
              <textarea rows="4" name="icause" class="form-control" id="basic-textarea"></textarea>
            
              </div>
            
          </div>




           <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
            <button type="submit" name="report" class="btn btn-primary px-5"><i class="icon-lock"></i> SEND REPORT</button>
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
