<?php
include('dbconnection.php');
session_start();

   if(!isset($_SESSION['login'])){
      header("location:login.php");
      die();
   }


  $id = $_GET["id"];

 $query1 = "SELECT * from incident where $id = id";



$result1 = mysqli_query($con, $query1) or die ( mysqli_error($con));
$row1 = mysqli_fetch_assoc($result1);


$logedInUsername = $_SESSION['login'];
?>

<?php include('inc/header.php');?>


   
<div class="clearfix"></div>
  
  <div class="content-wrapper">

     <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Full report</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="" class="table table-bordered">
               
               <tbody>
                  <tr>
                    <th scope="row">Sent by</th>
                    <td><?php echo $row1['isent']; ?></td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Date of Incident</th>
                    <td><?php echo $row1['idate']; ?></td>
                  
                  </tr>
                  <tr>
                    <th scope="row">Location</th>
                    <td><?php echo $row1['ilocation']; ?></td>
                 
                  </tr>

                   <tr>
                    <th scope="row">Responsible person</th>
                    <td><?php echo $row1['iperson']; ?></td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Description</th>
                    <td><?php echo $row1['idesc']; ?></td>
                  
                  </tr>
                  <tr>
                    <th scope="row">Injury details</th>
                    <td><?php echo $row1['inju']; ?></td>
                 
                  </tr>
                    <tr>
                    <th scope="row">Damage of report</th>
                    <td><?php echo $row1['idamage']; ?></td>
                 
                  </tr>
                   <tr>
                    <th scope="row">Causes of incident</th>
                    <td><?php echo $row1['icause']; ?></td>
                 
                  </tr>
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

             