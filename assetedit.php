<?php
include('dbconnection.php');
session_start();

   if(!isset($_SESSION['login'])){
      header("location:login.php");
      die();
   }


    $id = $_GET['edit'];
  $query = "SELECT * from asset where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);

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


   
     
 
 $query=mysqli_query($con, "update asset set asid='$asid',cost='$cost',description='$description',pno='$pno',pdate='$pdate',model='$model',status='$status',sno='$sno',site='$site',category='$category',location='$location',department='$department',employee='$employee',brand='$brand',uid='$uid',cond='$cond',propic='$propic',propic1='$propic1',propic2='$propic2' where id='$id'");



     // $query=mysqli_query($con, "update asset set (asid, cost, description, pno, pdate, model, status, sno, site, category, location, department, employee, brand, uid, cond, propic, propic1, propic2) value ('$asid', '$cost', '$description', '$pno', '$pdate', '$model', '$status', '$sno', '$site', '$category', '$location',  '$department', '$employee', '$brand', '$uid', '$cond', '$propic', '$propic1', '$propic2' ) where id='$id'");

move_uploaded_file($file_loc,$target.$propic);
move_uploaded_file($file_loc1,$target.$propic1);
move_uploaded_file($file_loc2,$target.$propic2);

     // move_uploaded_file($_FILES['propic']['name'], $target);
     // move_uploaded_file($_FILES['propic1']['name'], $target);
     // move_uploaded_file($_FILES['propic2']['name'], $target);
     // move_uploaded_file($tmp_name, $new_name);
     // move_uploaded_file($tmp_name1, $new_name1);
     // move_uploaded_file($tmp_name2, $new_name2);


    if ($query) {
    
     $_SESSION['FLASH'] = 'Asset updated.';
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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Unimac Asset Management</title>
  <!--favicon-->
  <!-- <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon"> -->
  <!-- simplebar CSS-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <link href="assets/plugins/dropzone/css/dropzone.css" rel="stylesheet" type="text/css">
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
  <!-- skins CSS-->
  <link href="assets/css/skins.css" rel="stylesheet"/>

   
</head>

<body>


<!-- Start wrapper-->
 <div id="wrapper">

 <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="index.html">
     
       <h5 class="logo-text">Unimac Assets</h5>
     </a>
   </div>
   <div class="user-details">
    <div class="media align-items-center user-pointer collapsed" data-toggle="collapse" data-target="#user-dropdown">
      <div class="avatar"><img class="mr-3 side-user-img" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
       <div class="media-body">
       <h6 class="side-user-name">Shebas Khan</h6>
      </div>
       </div>
     <div id="user-dropdown" class="collapse">
      <ul class="user-setting-menu">
            <li><a href="javaScript:void();"><i class="icon-user"></i>  My Profile</a></li>
         
      <li><a href="logout.php"><i class="icon-power"></i> Logout</a></li>
      </ul>
     </div>
      </div>
   <ul class="sidebar-menu">
      <li class="sidebar-header">MAIN NAVIGATION</li>
      <li>
        <a href="index.php" class="waves-effect">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
    
      </li>
      <li>
        <a href="asset-list.php" class="waves-effect">
          <i class="zmdi zmdi-layers"></i>
          <span>Assets List</span> 
        </a>
      
      </li>

   <li>
        <a href="asset-add.php" class="waves-effect">
          <i class="zmdi zmdi-plus-box"></i>
          <span>Add New Asset</span> 
        </a>
      
      </li>

     
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-account"></i> <span>Users</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="new-user.php"><i class="zmdi zmdi-dot-circle-alt"></i> Add New User</a></li>
          <li><a href="users.php"><i class="zmdi zmdi-dot-circle-alt"></i> Users</a></li>
            </ul>
       </li>
     <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-settings"></i> <span>Settings</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
            <li><a href="site.php"><i class="zmdi zmdi-dot-circle-alt"></i> Site</a></li>
            <li><a href="category.php"><i class="zmdi zmdi-dot-circle-alt"></i> Category</a></li>
            <li><a href="location.php"><i class="zmdi zmdi-dot-circle-alt"></i> Location</a></li>
            <li><a href="department.php"><i class="zmdi zmdi-dot-circle-alt"></i> Department</a></li>
  <li><a href="brand.php"><i class="zmdi zmdi-dot-circle-alt"></i> Brand</a></li>
       <li><a href="employees-add.php"><i class="zmdi zmdi-dot-circle-alt"></i> Employees</a></li>
        
         </ul>
       </li>
    
    
    </ul>
   
   </div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav id="header-setting" class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
    <li class="nav-item">
      <form class="search-bar">
        <input type="text" class="form-control" placeholder="Enter keywords">
         <a href="javascript:void();"><i class="icon-magnifier"></i></a>
      </form>
    </li>
  </ul>
     
 
</nav>
</header>
<!--End topbar header-->


   
<div class="clearfix"></div>
  
  <div class="content-wrapper">

      <div class="row">
      <div class="col-lg-12">
         
         <div class="card">
           <div class="card-body">
           <div class="card-title">Edit Asset</div>
           <hr>
            <form method="POST" action="" enctype="multipart/form-data">
               <?php if ( $message != '' ) { ?>
    <p class="message"><?php echo $message; ?></p>
    <p class="message"><?php echo $existmessage; ?></p>
    <?php } ?>
           <div class="form-group row">
            <label for="input-21" class="col-sm-2 col-form-label">Asset ID</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="asid" name="asid" placeholder="Enter ID" value="<?php echo $row['asid']; ?>" required>
            </div>
              <label for="input-22" class="col-sm-2 col-form-label">Cost</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="cost" name="cost" value="<?php echo $row['cost']; ?>" placeholder="Enter Cost">
            </div>
          </div>
          <div class="form-group row">
            <label for="input-22" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" value="<?php echo $row['description']; ?>">
              </div>
              <label for="input-22" class="col-sm-2 col-form-label">Plate number</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="pno" name="pno" value="<?php echo $row['pno']; ?>" placeholder="Enter Plate">
          
            </div>
          </div>
            <div class="form-group row">
            <label for="input-23" class="col-sm-2 col-form-label">Purchase date</label>
            <div class="col-sm-4">
            <input type="date" class="form-control" id="pdate" name="pdate" value="<?php echo $row['pdate']; ?>" placeholder="Enter Purchase date">
            </div>
            <label for="input-22" class="col-sm-2 col-form-label">Model</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="model" name="model" value="<?php echo $row['model']; ?>" placeholder="Enter Model">
            </div>
            </div>
             
          <div class="form-group row">
            <label for="input-22" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-4"> 
             <select class="custom-select" name="status" id="inputGroupSelect01 status">
                    <option selected><?php echo $row['status']; ?></option>
                    <option value="Available">Available</option>
                    <option value="Disposed">Disposed</option>
                    <option value="Checked Out">Checked Out </option>
                   
                  </select>
            </div>
             <label for="input-22" class="col-sm-2 col-form-label">Serial no.</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="input-22" name="sno" value="<?php echo $row['sno']; ?>" placeholder="Enter Serial no.">
            </div>
          </div>

             <div class="form-group row">

<label for="input-22" class="col-sm-2 col-form-label">Site</label>
            <div class="col-sm-4">
          <select name="site" class="custom-select" id="inputGroupSelect01">
  <option selected><?php echo $row['site']; ?></option>
<?php 
$sql = mysqli_query($con, "SELECT site FROM site");
while ($row11 = $sql->fetch_assoc()){
echo "<option value=".$row11['site'].">" . $row11['site'] . "</option>";
}
?>
</select>

            </div>


  <label for="input-22" class="col-sm-2 col-form-label">Location </label>
            <div class="col-sm-4">
           <select name="location" class="custom-select" id="inputGroupSelect02">
  <option selected><?php echo $row['location']; ?></option>
<?php 
$sql = mysqli_query($con, "SELECT location FROM location");
while ($row31 = $sql->fetch_assoc()){
echo "<option value=".$row31['location'].">" . $row31['location'] . "</option>";
}
?>
</select>
            </div>


            
             
          </div>

           <div class="form-group row">
            <label for="input-22" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-4">
      <select name="category" class="custom-select" id="inputGroupSelect01">
  <option selected><?php echo $row['category']; ?></option>
<?php 
$sql = mysqli_query($con, "SELECT category FROM category");
while ($row21 = $sql->fetch_assoc()){
echo "<option value=".$row21['category'].">" . $row21['category'] . "</option>";
}
?>
</select>
            </div>
               <label for="input-22" class="col-sm-2 col-form-label">Department</label>
            <div class="col-sm-4">
              <select name="department" class="custom-select" id="inputGroupSelect01">
  <option selected><?php echo $row['department']; ?></option>
<?php 
$sql = mysqli_query($con, "SELECT department FROM department");
while ($row41 = $sql->fetch_assoc()){
echo "<option value=".$row41['department'].">" . $row41['department'] . "</option>";
}
?>
</select>
            </div>
          </div>

            <div class="form-group row">
            <label for="input-22" class="col-sm-2 col-form-label">Assigned to</label>
            <div class="col-sm-4">
           
  <select name="employee" class="custom-select" id="inputGroupSelect01">
  <option selected><?php echo $row['employee']; ?></option>
<?php 
$sql = mysqli_query($con, "SELECT * FROM employees");
while ($row51 = $sql->fetch_assoc()){
echo "<option value=".$row51['name'].">" . $row51['name'] . "</option>";
}
?>
</select>


            </div>
               <label for="input-22" class="col-sm-2 col-form-label">Brand</label>
            <div class="col-sm-4">
             <select name="brand" class="custom-select" id="inputGroupSelect01">
  <option selected><?php echo $row['brand']; ?></option>
<?php 
$sql = mysqli_query($con, "SELECT brand FROM brand");
while ($row61 = $sql->fetch_assoc()){
echo "<option value=".$row61['brand'].">" . $row61['brand'] . "</option>";
}
?>
</select>
            </div>
          </div>
            <div class="form-group row">
            <label for="input-22" class="col-sm-2 col-form-label">Unimac ID</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" name="uid" value="<?php echo $row['uid']; ?>" id="input-22" placeholder="Enter Unimac ID">
            </div>
               <label for="input-22" class="col-sm-2 col-form-label">Condition</label>
            <div class="col-sm-4">
       
                  <select class="custom-select" name="cond" id="inputGroupSelect01">
                    <option selected><?php echo $row['cond']; ?></option>
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
            <button type="submit" name="submit" class="btn btn-primary px-5"><i class="icon-lock"></i> UPDATE</button>
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

             