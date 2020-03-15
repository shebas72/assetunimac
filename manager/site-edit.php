<?php
include('dbconnection.php');
session_start();

   if(!isset($_SESSION['login'])){
      header("location:login.php");
      die();
   }

  $id = $_GET['edit'];
  $query = "SELECT * from site where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);

if(isset($_POST['submit'])){
   $site=$_POST['site'];
    $description=$_POST['description'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $country=$_POST['country'];


 $query=mysqli_query($con, "update site set site='$site',description='$description',address='$address',city='$city',state='$state',country='$country' where id='$id'")or die(mysqli_error($con));


    if ($query) {
    
     $_SESSION['FLASH'] = 'Site updated.';
   header('location: site.php'); //path to your success script
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
           <div class="card-title">Edit Site</div>
           <hr>
         
          <form action="" method="post">
           <div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">Site Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="site" name="site" value="<?php echo $row['site']; ?>" required>
            </div>
           
          </div>

           <div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="site" name="description" value="<?php echo $row['description']; ?>" >
            </div>
           
          </div>
          <div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="site" name="address" value="<?php echo $row['address']; ?>" >
            </div>
           
          </div>
<div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">City</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="site" name="city" value="<?php echo $row['city']; ?>" >
            </div>
           
          </div>
          <div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">State</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="site" name="state" value="<?php echo $row['state']; ?>" >
            </div>
           
          </div>
          <div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">Country</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="site" name="country" value="<?php echo $row['country']; ?>" >
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
