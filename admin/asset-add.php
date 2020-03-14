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
    
    $fileName = $_FILES["assetfile"]["tmp_name"];
    
    if ($_FILES["assetfile"]["size"] > 0) {
        
        $assetfile = fopen($fileName, "r");
        
        while (($column = fgetcsv($assetfile, 10000, ",")) !== FALSE) {
            $sqlInsert = "INSERT into asset (asid, cost, description, pno, pdate, model, status, sno, site, category, location, department, employee, brand, uid, cond)
                   values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[7] . "','" . $column[8] . "','" . $column[9] . "','" . $column[10] . "','" . $column[11] . "','" . $column[12] . "','" . $column[13] . "','" . $column[14] . "','" . $column[15] . "')";
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
    $asid=$_POST['asid'];
    $cost=$_POST['cost'];
    $description=$_POST['description'];
    $pno=$_POST['pno'];
    $pdate=$_POST['pdate'];
    $model=$_POST['model'];
    $status=$_POST['status'];
    $sno=$_POST['sno'];
    $site=$_POST['site'];
    $category=$_POST['category'];
    $location=$_POST['location'];
    $department=$_POST['department'];
    $employee=$_POST['employee'];
    $brand=$_POST['brand'];
    $uid=$_POST['uid'];
    $cond=$_POST['cond'];
    $propic=rand(1000,100000)."-".$_FILES['propic']['name']; 
    $propic1=rand(1000,100000)."-".$_FILES['propic1']['name']; 
    $propic2=rand(1000,100000)."-".$_FILES['propic2']['name']; 
    $file_loc = $_FILES['propic']['tmp_name'];
    $file_loc1 = $_FILES['propic1']['tmp_name'];
    $file_loc2 = $_FILES['propic2']['tmp_name'];
    // $tmp_name =  $_FILES['propic']['tmp_name'];
    // $tmp_name1 =  $_FILES['propic1']['tmp_name'];
    // $tmp_name2 =  $_FILES['propic2']['tmp_name'];
   
      //$target = "images/".basename($propic);
      $target = "images/";
 $new_name = $target.time()."-".rand(1000, 9999)."-".$propic;
 $new_name1 = $target.time()."-".rand(1000, 9999)."-".$propic1;
 $new_name2 = $target.time()."-".rand(1000, 9999)."-".$propic2;


    $test = mysqli_query($con,"SELECT * FROM asset WHERE asid='$asid'");
     $testresult = mysqli_num_rows($test);
     if($testresult ===0){
 

     $query=mysqli_query($con, "insert into asset (asid, cost, description, pno, pdate, model, status, sno, site, category, location, department, employee, brand, uid, cond, propic, propic1, propic2) value ('$asid', '$cost', '$description', '$pno', '$pdate', '$model', '$status', '$sno', '$site', '$category', '$location',  '$department', '$employee', '$brand', '$uid', '$cond', '$propic', '$propic1', '$propic2' )");

move_uploaded_file($file_loc,$target.$propic);
move_uploaded_file($file_loc1,$target.$propic1);
move_uploaded_file($file_loc2,$target.$propic2);

     // move_uploaded_file($_FILES['propic']['name'], $target);
     // move_uploaded_file($_FILES['propic1']['name'], $target);
     // move_uploaded_file($_FILES['propic2']['name'], $target);
     // move_uploaded_file($tmp_name, $new_name);
     // move_uploaded_file($tmp_name1, $new_name1);
     // move_uploaded_file($tmp_name2, $new_name2);
}
else
{
   echo '<script language="javascript" type="text/javascript"> 
                alert("Already exist");
                window.location = "asset-add.php";
        </script>';
  }
    if ($query) {
    
     $_SESSION['FLASH'] = 'New asset added.';
   header('location: asset-add.php'); //path to your success script
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
     <div class="container-fluid">
  <div class="row pt-2 pb-2">
        <div class="col-sm-9">
        <h4 class="page-title">Add New Asset</h4>
       
     </div>
     <div class="col-sm-3">
       <div class="btn-group float-sm-right">
         <button class="btn btn-primary btn-block m-1" data-toggle="modal" data-target="#formemodal">Import</button>
       
       
        </button>
       
      </div>
     </div>
     </div>
   </div>
      <div class="row">
      <div class="col-lg-12">
         
         <div class="card">
           <div class="card-body">
       
            <form method="POST" action="" enctype="multipart/form-data">
               <?php if ( $message != '' ) { ?>
    <p class="message"><?php echo $message; ?></p>
    <p class="message"><?php echo $existmessage; ?></p>
    <?php } ?>
           <div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">Asset ID</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="asid" name="asid" placeholder="Enter ID" required>
            </div>
              <label for="input-22" class="col-sm-2 col-form-label">Cost</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="cost" name="cost" placeholder="Enter Cost">
            </div>
          </div>
          <div class="form-group row">
            <label for="input-22" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description">
              </div>
              <label for="input-22" class="col-sm-2 col-form-label">Plate number</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="pno" name="pno" placeholder="Enter Plate">
          
            </div>
          </div>
            <div class="form-group row">
            <label for="input-23" class="col-sm-2 col-form-label">Purchase date</label>
            <div class="col-sm-4">
            <input type="date" class="form-control" id="pdate" name="pdate" placeholder="Enter Purchase date">
            </div>
            <label for="input-22" class="col-sm-2 col-form-label">Model</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="model" name="model" placeholder="Enter Model">
            </div>
            </div>
             
          <div class="form-group row">
            <label for="input-22" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-4"> 
             <select class="custom-select" name="status" id="inputGroupSelect01 status">
                    <option selected>Choose...</option>
                    <option value="Available">Available</option>
                    <option value="Disposed">Disposed</option>
                    <option value="Checked Out">Checked Out </option>
                   
                  </select>
            </div>
             <label for="input-22" class="col-sm-2 col-form-label">Serial no.</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="input-22" name="sno" placeholder="Enter Serial no.">
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
            <label for="input-22" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-4">
      <select name="category" class="custom-select" id="inputGroupSelect01">
  <option selected>Choose...</option>
<?php 
$sql = mysqli_query($con, "SELECT category FROM category");
while ($row = $sql->fetch_assoc()){
echo "<option value=".$row['category'].">" . $row['category'] . "</option>";
}
?>
</select>
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
            <label for="input-22" class="col-sm-2 col-form-label">Assigned to</label>
            <div class="col-sm-4">
           
  <select name="employee" class="custom-select" id="inputGroupSelect01">
  <option selected>Choose...</option>
<?php 
$sql = mysqli_query($con, "SELECT * FROM employees");
while ($row = $sql->fetch_assoc()){
echo "<option value=".$row['name'].">" . $row['name'] . "</option>";
}
?>
</select>


            </div>
               <label for="input-22" class="col-sm-2 col-form-label">Brand</label>
            <div class="col-sm-4">
             <select name="brand" class="custom-select" id="inputGroupSelect01">
  <option selected>Choose...</option>
<?php 
$sql = mysqli_query($con, "SELECT brand FROM brand");
while ($row = $sql->fetch_assoc()){
echo "<option value=".$row['brand'].">" . $row['brand'] . "</option>";
}
?>
</select>
            </div>
          </div>
            <div class="form-group row">
            <label for="input-22" class="col-sm-2 col-form-label">Unimac ID</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" name="uid" id="input-22" placeholder="Enter Unimac ID">
            </div>
               <label for="input-22" class="col-sm-2 col-form-label">Condition</label>
            <div class="col-sm-4">
       
                  <select class="custom-select" name="cond" id="inputGroupSelect01">
                    <option selected>Choose...</option>
                    <option value="Major Repair">Major Repair</option>
                    <option value="Minor Repair">Minor Repair</option>
                    <option value="Operational">Operational </option>
                    <option value="Scrap">Scrap </option>
                  </select>
            </div>
          </div>
            
 <div class="form-group row">
        <div class="input-group mb-3">
                <label for="input-22" class="col-sm-2 col-form-label">Image 1</label>
                  <div class="custom-file col-sm-4">
                   <input type="file" name="propic" class="custom-file-input" id="inputGroupFile01 upname2">
                    <label class="custom-file-label" for="inputGroupFile01"> <div id="file-upload-filename"></div></label>
  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                  </div>
                </div>
              </div>



      
 <div class="form-group row">
        <div class="input-group mb-3">
                <label for="input-22" class="col-sm-2 col-form-label">Image 2</label>
                  <div class="custom-file col-sm-4">
                   <input type="file" name="propic1" class="custom-file-input" id="inputGroupFile01 upname2">
                    <label class="custom-file-label" for="inputGroupFile01"> <div id="file-upload-filename"></div></label>
  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                  </div>
                </div>
              </div>


         
 <div class="form-group row">
        <div class="input-group mb-3">
                <label for="input-22" class="col-sm-2 col-form-label">Image 3</label>
                  <div class="custom-file col-sm-4">
                   <input type="file" name="propic2" class="custom-file-input" id="inputGroupFile01 upname3">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                  </div>
                </div>
              </div> 

           <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
            <button type="submit" name="submit" class="btn btn-primary px-5"><i class="icon-lock"></i> ADD ASSET</button>
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
   <div class="modal fade" id="formemodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Import</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <form action="" method="post" enctype="multipart/form-data">
           <div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">Import</label>
            <div class="col-sm-10">
            <input type="file" class="form-control" id="site" name="assetfile" placeholder="Enter Name" required>
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
<a href="assets/assetsample.csv" class="btn btn-info px-5">Download sample template </a>
         </div>
       </div>
                      </div>
                    </div>
                  </div>
                </div>


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
