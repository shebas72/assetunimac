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

if (isset($_POST["upload"])) {
    
    $fileName = $_FILES["sitefile"]["tmp_name"];
    
    if ($_FILES["sitefile"]["size"] > 0) {
        
        $sitefile = fopen($fileName, "r");
        
        while (($column = fgetcsv($sitefile, 10000, ",")) !== FALSE) {
            $sqlInsert = "INSERT into site (site)
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
    $site=$_POST['site'];
    $description=$_POST['description'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $country=$_POST['country'];
   
    $test = mysqli_query($con,"SELECT * FROM site WHERE site='$site'");
     $testresult = mysqli_num_rows($test);
     if($testresult ===0){
 

     $query=mysqli_query($con, "INSERT INTO site (site, description, address, city, state, country) VALUES ('$site','$description','$address','$city','$state','$country')");
}
else
{
   echo '<script language="javascript" type="text/javascript"> 
                alert("Already exist");
                window.location = "site.php";
        </script>';
  }
    if ($query) {
    
     $_SESSION['FLASH'] = 'New site added.';
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

      <div class="row">
      <div class="col-lg-12">
         
         <div class="card">
           <div class="card-body">
           <div class="card-title">Add New Site</div>
           <hr>
             <?php if ( $message != '' ) { ?>
    <p class="message"><?php echo $message; ?></p>
    <p class="message"><?php echo $existmessage; ?></p>
    <?php } ?>
            <form action="" method="post">
           <div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">Site Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="site" name="site" placeholder="Enter Name" required>
            </div>
           
          </div>

           <div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="site" name="description" placeholder="Enter Description" >
            </div>
           
          </div>
          <div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="site" name="address" placeholder="Enter Address" >
            </div>
           
          </div>
<div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">City</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="site" name="city" placeholder="Enter City" >
            </div>
           
          </div>
          <div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">State</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="site" name="state" placeholder="Enter State" >
            </div>
           
          </div>
          <div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">Country</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="site" name="country" placeholder="Enter Country" >
            </div>
           
          </div>
        

           <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
            <button type="submit" name="submit" class="btn btn-primary px-5"><i class="icon-lock"></i> ADD SITE</button>
            </div>
          </div>
          </form>


             <form action="" method="post" enctype="multipart/form-data">
           <div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">Import</label>
            <div class="col-sm-10">
            <input type="file" class="form-control" id="site" name="sitefile" placeholder="Enter Name" required>
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
            <div class="card-header"><i class="fa fa-table"></i> Site</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="default-datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Site Name</th>
                        <th>Decription</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Action</th>
                
                      
                    </tr>
                </thead>
                <tbody>
               <?php


                  if (isset($_GET['del'])) {
  $site = $_GET['del'];
  $delrow = mysqli_query($con,"delete from site where site = '$site'");
  
  $_SESSION['message'] = "Address deleted!"; 
  //header('location: index.php');
}

                  $show = "SELECT * FROM site";
                  $final = $con->query($show);
if ($final->num_rows > 0) {
while($row = $final->fetch_assoc()) {
  echo "<tr><td>" . $row["site"] . "</td>
  <td>" . $row["description"] . "</td>
  <td>" . $row["address"] . "</td>
  <td>" . $row["city"] . "</td>
  <td>" . $row["state"] . "</td>
  <td>" . $row["country"] . "</td>
  <td>

 <a href=\"site.php?del=" . $row["site"] . "\"><i class=\"btn btn-danger waves-effect waves-light m-1 fa fa-trash-o\"></i></a>
 <a href=\"site-edit.php?edit=" . $row["id"] . "\"><i class=\"btn btn-info waves-effect waves-light m-1 fa fa-pencil\"></i></a>


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
