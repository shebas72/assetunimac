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
    
    $fileName = $_FILES["categoryfile"]["tmp_name"];
    
    if ($_FILES["categoryfile"]["size"] > 0) {
        
        $categoryfile = fopen($fileName, "r");
        
        while (($column = fgetcsv($categoryfile, 10000, ",")) !== FALSE) {
            $sqlInsert = "INSERT into category (category)
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
    $category=$_POST['category'];
   
    
$test = mysqli_query($con,"SELECT * FROM category WHERE category='$category'");
     $testresult = mysqli_num_rows($test);
     if($testresult ===0){
 

     $query=mysqli_query($con, "insert into category (category) value ('$category')");
}
else
{
   echo '<script language="javascript" type="text/javascript"> 
                alert("Already exist");
                window.location = "category.php";
        </script>';
  }

    if ($query) {
    
     $_SESSION['FLASH'] = 'New category added.';
   header('location: category.php'); //path to your success script
   exit;
    
    // header('Location: category.php');
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
           <div class="card-title">Add New Category</div>
           <hr>
           <form action="" method="post">
           <div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">Category Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="category" name="category" placeholder="Enter Name" required>
            </div>
            
          </div>

         <?php if ( $message != '' ) { ?>
    <p class="message"><?php echo $message; ?></p>
    <?php } ?>

        
 </p>

           <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
            <button type="submit" name="submit" class="btn btn-primary px-5"><i class="icon-lock"></i> ADD CATEGORY</button>
            </div>
          </div>
          </form>


 <form action="" method="post" enctype="multipart/form-data">
           <div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">Import</label>
            <div class="col-sm-10">
            <input type="file" class="form-control" id="site" name="categoryfile" placeholder="Enter Name" required>
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
            <div class="card-header"><i class="fa fa-table"></i> Category</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="default-datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Action</th>
                
                      
                    </tr>
                </thead>
                <tbody>
                    <?php


                  if (isset($_GET['del'])) {
  $category = $_GET['del'];
  $delrow = mysqli_query($con,"delete from category where category = '$category'");
  // mysqli_query($con, "DELETE FROM category WHERE category=$category");
  $_SESSION['message'] = "Address deleted!"; 
  //header('location: index.php');
}

                  $show = "SELECT category FROM category";
                  $final = $con->query($show);
if ($final->num_rows > 0) {
while($row = $final->fetch_assoc()) {
  echo "<tr><td>" . $row["category"] . "</td>
  <td>

 <a href=\"category.php?del=" . $row["category"] . "\"><i class=\"btn btn-danger waves-effect waves-light m-1 fa fa-trash-o\"></i></a>

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
