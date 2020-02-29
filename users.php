<?php
include('dbconnection.php');
session_start();

   if(!isset($_SESSION['login'])){
      header("location:login.php");
      die();
   }




?>
<?php include('inc/header.php');?>
<?php


                
                  $show = "SELECT * FROM manager";
                  $show .= "SELECT * FROM admin";
                  $show .= "SELECT * FROM viewer";
                  $final = $con->query($show);
if ($final->num_rows > 0) {
while($row = $final->fetch_assoc()) {
   $imageURL = 'images/'.$row["usrimg"];
   }
 }

   ?>

<div class="clearfix"></div>
  
  <div class="content-wrapper">
   
  
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Users</div>
            <div class="card-body">

 
      <div class="row">
        <div class="col-lg-12">
          
             
                <ul class="nav nav-tabs nav-tabs-primary">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tabe-1"> <span class="hidden-xs">Admin</span></a>
                  </li>
                
                   <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabe-2"> <span class="hidden-xs">Manager</span></a>
                  </li>
              
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabe-3"> <span class="hidden-xs">Viewer</span></a>
                  </li>
                 
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div id="tabe-1" class="container tab-pane active">
                 <div class="row">
        <div class="col-lg-12">
<div class="table-responsive">
              <table id="" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Email</th>
                       
                        <th>Unimac ID</th>
 <th>Phone</th>
                        <th>Group</th>
                       
                        <th>Actions</th>
                       
                      
                    </tr>
                </thead>
                <tbody>

<?php

                    $show = "SELECT * FROM admin";
               
                  $final = $con->query($show);
if ($final->num_rows > 0) {
while($row = $final->fetch_assoc()) {
  echo "<tr>
  <td>" . $row["fname"] . " " . $row["lname"] . " </td>
   <td>" . $row["title"] . " </td>
    <td>" . $row["Email"] .  " </td>
    
      <td>" . $row["Unimac ID"] .  " </td>
      <td>" . $row["phone"] .  " </td>
       <td>" . $row["Group"] .  " </td>
       
 
  <td>

 <a href=\"users.php?del=" . $row["email"] . "\"><i class=\"btn btn-primary waves-effect waves-light m-1 fa fa-pencil\"></i></a>

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



   <div id="tabe-2" class="container tab-pane">
                 <div class="row">
        <div class="col-lg-12">
<div class="table-responsive">
              <table id="" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Email</th>
                       
                        <th>Unimac ID</th>
 <th>Phone</th>
                        <th>Group</th>
                       
                        <th>Actions</th>
                       
                      
                    </tr>
                </thead>
                <tbody>

<?php

                    $show = "SELECT * FROM manager";
               
                  $final = $con->query($show);
if ($final->num_rows > 0) {
while($row = $final->fetch_assoc()) {
  echo "<tr>
  <td>" . $row["fname"] . " " . $row["lname"] . " </td>
   <td>" . $row["title"] . " </td>
    <td>" . $row["Email"] .  " </td>
    
      <td>" . $row["Unimac ID"] .  " </td>
      <td>" . $row["phone"] .  " </td>
       <td>" . $row["Group"] .  " </td>
       
 
  <td>

 <a href=\"users.php?del=" . $row["email"] . "\"><i class=\"btn btn-primary waves-effect waves-light m-1 fa fa-pencil\"></i></a>

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


   <div id="tabe-3" class="container tab-pane">
                 <div class="row">
        <div class="col-lg-12">
<div class="table-responsive">
              <table id="" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Email</th>
                       
                        <th>Unimac ID</th>
 <th>Phone</th>
                        <th>Group</th>
                       
                        <th>Actions</th>
                       
                      
                    </tr>
                </thead>
                <tbody>

<?php

                    $show = "SELECT * FROM viewer";
               
                  $final = $con->query($show);
if ($final->num_rows > 0) {
while($row = $final->fetch_assoc()) {
  echo "<tr>
  <td>" . $row["fname"] . " " . $row["lname"] . " </td>
   <td>" . $row["title"] . " </td>
    <td>" . $row["Email"] .  " </td>
    
      <td>" . $row["Unimac ID"] .  " </td>
      <td>" . $row["phone"] .  " </td>
       <td>" . $row["Group"] .  " </td>
       
 
  <td>

 <a href=\"users.php?del=" . $row["email"] . "\"><i class=\"btn btn-primary waves-effect waves-light m-1 fa fa-pencil\"></i></a>

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





</div>










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
