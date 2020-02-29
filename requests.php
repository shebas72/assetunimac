<?php
include('dbconnection.php');
session_start();

   if(!isset($_SESSION['login'])){
      header("location:login.php");
      die();
   }


  

 $query1 = "SELECT * from asset"; 
$result1 = mysqli_query($con, $query1) or die ( mysqli_error($con));
$row1 = mysqli_fetch_assoc($result1);

if(isset($_POST['request']))
  {
    $asid=$_POST['asid'];
    $loginuser=$_POST['loginuser'];
    $rdate=$_POST['rdate'];
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
            <div class="card-header"><i class="fa fa-table"></i> Requests</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="" class="table table-bordered">
                <thead>
                    <tr>
                       <th>Date</th>
                        <th>Asset ID</th>
                       
                        <th>Requested by</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Notes</th>
                        <th>Action</th>
                     
                    </tr>
                </thead>
                <tbody>
                    <?php


                  if (isset($_GET['del'])) {
  $asid = $_GET['del'];
  $delrow = mysqli_query($con,"delete from request where asid = '$asid'");
  // mysqli_query($con, "DELETE FROM brand WHERE brand=$brand");
  $_SESSION['message'] = "Request deleted!"; 
  //header('location: index.php');
}
                
                  $show = "SELECT * FROM request order by id DESC";
                  $final = $con->query($show);
if ($final->num_rows > 0) {
while($row = $final->fetch_assoc()) {
  echo "<tr>
  <td>" . $row["rdate"] . "</td>
   
  <td>" . $row["asid"] . "</td>
  <td>" . $row["loginuser"] . "</td>
  <td>" . $row["fromdate"] . "</td>
  <td>" . $row["todate"] . "</td>
  <td>" . $row["notes"] . "</td>
 <td>

 <a href=\"requests.php?del=" . $row["asid"] . "\"><i class=\"btn btn-danger waves-effect waves-light m-1 fa fa-trash-o\"></i></a>

</td>
 

</tr>";
}
}
                  ?>
                 
                </tbody>
          
            </table>
            </div>
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

             