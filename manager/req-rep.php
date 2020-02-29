<?php
include('dbconnection.php');
session_start();

   if(!isset($_SESSION['login'])){
      header("location:login.php");
      die();
   }


  

 $query1 = "SELECT * from request"; 
$result1 = mysqli_query($con, $query1) or die ( mysqli_error($con));
$row1 = mysqli_fetch_assoc($result1);

if(isset($_POST['reply']))
  {
    $asid=$_POST['asid'];
    $loginuser=$_POST['loginuser'];
    $q1=$_POST['q1'];
    $notesr=$_POST['notesr'];
   
  
  
     
 
 $query=mysqli_query($con, "insert into request (asid, loginuser, q1, notesr) value ('$asud', '$loginuser','$q1', '$notesr')");



    if ($query) {
    
     $_SESSION['FLASH'] = 'Reply sent.';
   header('location: req-rep.php'); //path to your success script
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
           <div class="card-title">Request Reply</div>
           <hr>
            <form method="POST" action="" enctype="multipart/form-data">
               <?php if ( $message != '' ) { ?>
    <p class="message"><?php echo $message; ?></p>
    <p class="message"><?php echo $existmessage; ?></p>
    <?php } ?>
           <div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">Asset ID</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="asid" name="asid" placeholder="Enter ID" value="<?php echo $row1['asid']; ?>" readonly>
            </div>
              <label for="input-22" class="col-sm-2 col-form-label">Requested by</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="loginuser" name="loginuser" value="<?php echo $logedInUsername; ?>" readonly>
            </div>
          </div>
         
            <div class="form-group row">
            <label for="input-23" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-8">
          <input type="radio" name="q1" value="Approved" />
Approved
<input type="radio" name="q1" value="Denied" />
Denied
<input type="radio" name="q1" value="Pending" />
Pending

            </div>
           
            </div>
             
       

            <div class="form-group row">
            <label for="input-22" class="col-sm-2 col-form-label">Notes</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="notesr" id="input-22" placeholder="Notes">
            </div>
              
          </div>
            





           <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
            <button type="submit" name="reply" class="btn btn-primary px-5"><i class="icon-lock"></i> REPLY</button>
            </div>
          </div>
          </form>
         </div>
       </div>

    
        </div>
      </div><!-- End Row-->

       
    

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
 
     table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
      
      } );

    </script>
</body>
</html>

             