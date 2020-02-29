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
  <link href="assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <link href="assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
   
</head>

<body>


<!-- Start wrapper-->
 <div id="wrapper">

 <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="index.php">
     
       <h5 class="logo-text">Unimac Assets</h5>
     </a>
   </div>

   <?php

 $show55 = "SELECT * from admin"; 
$final55 = $con->query($show55);
if ($final55->num_rows > 0) {
while($row55 = $final55->fetch_assoc()) {
    $imageURL = '../images/'.$row55['usrimg'];
     // $imageURL1 = '../images/'.$row['usrimg'];
   ?>
   <div class="user-details">
    <div class="media align-items-center user-pointer collapsed" data-toggle="collapse" data-target="#user-dropdown">
      <div class="avatar"><img onerror="this.src='../images/default-image.jpg'" class="mr-3 side-user-img" src="<?php echo $imageURL; ?>" alt="user avatar"></div>
       <div class="media-body">
       <h6 class="side-user-name"><?php echo $row55['fname']; ?></h6>
      </div>
       </div>
     <div id="user-dropdown" class="collapse">
      <ul class="user-setting-menu">
            <li><a href="user-edit.php?edit=<?php echo $row55['id'] ?>"><i class="icon-user"></i>  My Profile</a></li>
         
      <li><a href="logout.php"><i class="icon-power"></i> Logout</a></li>
      </ul>
     </div>
      </div>


      <?php
      }
}
                  ?>
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
        <a href="requests.php" class="waves-effect">
          <i class="zmdi zmdi-card-travel"></i>
          <span>Requests</span> 
        </a>
      
      </li>
      <li>
        <a href="incident.php" class="waves-effect">
          <i class="zmdi zmdi-email"></i>
          <span>Send Incident Report</span> 
        </a>
      
      </li>

       <li>
        <a href="ireports.php" class="waves-effect">
          <i class="zmdi zmdi-lock"></i>
          <span>Incident Reports</span> 
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


   