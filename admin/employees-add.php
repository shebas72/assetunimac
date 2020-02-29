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

if(isset($_POST['submit']))
  {
    $name=$_POST['name'];
    $eid=$_POST['eid'];
    $title=$_POST['title'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $department=$_POST['department'];
    $site=$_POST['site'];
    $location=$_POST['location'];
    $notes=$_POST['notes'];
 
   
    $test = mysqli_query($con,"SELECT * FROM employees WHERE eid='$eid'");
     $testresult = mysqli_num_rows($test);
     if($testresult ===0){
 

     $query=mysqli_query($con, "INSERT INTO employees(name, eid, title, phone, email, department,site, location, notes) VALUES ('$name', '$eid', '$title', '$phone', '$email', '$department','$site', '$location', '$notes')");
}
else
{
   echo '<script language="javascript" type="text/javascript"> 
                alert("Employee already exist");
                window.location = "employees-add.php";
        </script>';
  }
    if ($query) {
    
     $_SESSION['FLASH'] = 'New Employee added.';
   header('location: employees-add.php'); //path to your success script
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
           <div class="card-title">Add New Employee</div>
           <hr>
            <form action="" method="post">
           <div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
            </div>
              <label for="input-22" class="col-sm-2 col-form-label">Employee ID</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="eid" name="eid" placeholder="Enter Employee ID" required>
            </div>
          </div>

           <div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required>
            </div>
              <label for="input-22" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone">
            </div>
          </div>
        
           <div class="form-group row">
            <label for="input-22" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" required>
            </div>
               <label for="input-22" class="col-sm-2 col-form-label">Department</label>
            <div class="col-sm-4">
             <select name="department" class="custom-select" id="inputGroupSelect01">
  <option selected>Choose...</option>
<?php 
$sql = mysqli_query($con, "SELECT department FROM department");
while ($row = $sql->fetch_assoc()){
echo "<option value=".$row['department'].">" . $row['department'] . "</option>";
}
?>
</select>
            </div>
          </div>

             <div class="form-group row">
            <label for="input-22" class="col-sm-2 col-form-label">Site</label>
            <div class="col-sm-4">

<select name="site" class="custom-select" id="inputGroupSelect01">
  <option selected>Choose...</option>
<?php 
$sql = mysqli_query($con, "SELECT site FROM site");
while ($row = $sql->fetch_assoc()){
echo "<option value=".$row['site'].">" . $row['site'] . "</option>";
}
?>
</select>

           
            </div>
               <label for="input-22" class="col-sm-2 col-form-label">Location</label>
            <div class="col-sm-4">
            <select name="location" class="custom-select" id="inputGroupSelect01">
  <option selected>Choose...</option>
<?php 
$sql = mysqli_query($con, "SELECT location FROM location");
while ($row = $sql->fetch_assoc()){
echo "<option value=".$row['location'].">" . $row['location'] . "</option>";
}
?>
</select>
            </div>
          </div>

        

            <div class="form-group row">
            <label for="input-22" class="col-sm-2 col-form-label">Notes</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="notes" name="notes" placeholder="Enter notes">
            </div>
              
          </div>
          
       

           <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
            <button type="submit" name="submit" class="btn btn-primary px-5"><i class="icon-lock"></i> ADD EMPLOYEE</button>
            </div>
          </div>
          </form>
         </div>
       </div>

 <?php if ( $message != '' ) { ?>
    <p class="message"><?php echo $message; ?></p>
    <p class="message"><?php echo $existmessage; ?></p>
    <?php } ?>


    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Employees</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="default-datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Employee ID</th>
                        <th>Title</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Department</th>
                        <th>Site</th>
                        <th>Location</th>
                        <th>Notes</th>
                        <th>Action</th>
                      
                    </tr>
                </thead>
                <tbody>
                <?php


                  if (isset($_GET['del'])) {
  $eid = $_GET['del'];
  $delrow = mysqli_query($con,"delete from employees where eid = '$eid'");
  
  $_SESSION['message'] = "Employee deleted!"; 
  //header('location: index.php');
}

                  $show = "SELECT * FROM employees";
                  $final = $con->query($show);
if ($final->num_rows > 0) {
while($row = $final->fetch_assoc()) {
  echo "<tr><td>" . $row["name"] . "</td>
  <td>" . $row["eid"] . "</td>
<td>" . $row["title"] . "</td>
<td>" . $row["email"] . "</td>
<td>" . $row["phone"] . "</td>
<td>" . $row["department"] . "</td>
<td>" . $row["site"] . "</td>
<td>" . $row["location"] . "</td>
<td>" . $row["notes"] . "</td>
  <td>

 <a href=\"employees-add.php?del=" . $row["eid"] . "\"><i class=\"btn btn-danger waves-effect waves-light m-1 fa fa-trash-o\"></i></a>

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
