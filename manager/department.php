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
  unset($_SESSION['FLASH']);
}

if (isset($_POST["upload"])) {
    
    $fileName = $_FILES["depfile"]["tmp_name"];
    
    if ($_FILES["depfile"]["size"] > 0) {
        
        $depfile = fopen($fileName, "r");
        
        while (($column = fgetcsv($depfile, 10000, ",")) !== FALSE) {
            $sqlInsert = "INSERT into department (department)
                   values ('" . $column[0] . "')";
            $result = mysqli_query($con, $sqlInsert);
            
            if (! empty($result)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }
}


if(isset($_POST['submit']))
  {
    $department=$_POST['department'];
   
   $test = mysqli_query($con,"SELECT * FROM department WHERE department='$department'");
     $testresult = mysqli_num_rows($test);
     if($testresult ===0){
 

     $query=mysqli_query($con, "insert into department (department) value ('$department')");
}
else
{
   echo '<script language="javascript" type="text/javascript"> 
                alert("Already exist");
                window.location = "department.php";
        </script>';
  }
    if ($query) {
    
     $_SESSION['FLASH'] = 'New department added.';
   header('location: department.php'); //path to your success script
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
           <div class="card-title">Add New Department</div>
           <hr>
            <form action="" method="post">
           <div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">Department Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="department" name="department" placeholder="Enter Name" required>
            </div>
            
          </div>

         <?php if ( $message != '' ) { ?>
    <p class="message"><?php echo $message; ?></p>
    <?php } ?>

           <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
            <button type="submit" name="submit" class="btn btn-primary px-5"><i class="icon-lock"></i> ADD DEPARTMENT</button>
            </div>
          </div>
          </form>


<form action="" method="post" enctype="multipart/form-data">
           <div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">Import</label>
            <div class="col-sm-10">
            <input type="file" class="form-control" id="site" name="depfile" placeholder="Enter Name" required>
            </div>
          
    
          </div>

        

           <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
            <button type="submit" name="upload" class="btn btn-primary px-5"><i class="icon-lock"></i> UPLOAD</button>
            </div>
          </div>
          </form>
           <div id="labelError"></div>
<a href="assets/inputCSV.csv" class="btn btn-info px-5">Download sample template </a>
         </div>
       </div>




    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Department</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="default-datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Department Name</th>
                        <th>Action</th>
                
                      
                    </tr>
                </thead>
                <tbody>

<?php


                  if (isset($_GET['del'])) {
  $department = $_GET['del'];
  $delrow = mysqli_query($con,"delete from department where department = '$department'");
 
  $_SESSION['message'] = "Address deleted!"; 
  //header('location: index.php');
}

                  $show = "SELECT department FROM department";
                  $final = $con->query($show);
if ($final->num_rows > 0) {
while($row = $final->fetch_assoc()) {
  echo "<tr><td>" . $row["department"] . "</td>
  <td>

 <a href=\"department.php?del=" . $row["department"] . "\"><i class=\"btn btn-danger waves-effect waves-light m-1 fa fa-trash-o\"></i></a>

</td>

</tr>";
}
}
                  ?>


                   
                     
                     
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
