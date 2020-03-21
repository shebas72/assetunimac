<?php
include('dbconnection.php');
session_start();

   if(!isset($_SESSION['login'])){
      header("location:login.php");
      die();
   }

$id = $_GET["id"];
$asid = $_GET["asid"];

?>
<?php include('inc/header.php');?>

<?php


                
                  $show = "SELECT * FROM asset where $id = id";
                  $final = $con->query($show);
if ($final->num_rows > 0) {
while($row = $final->fetch_assoc()) {
   $imageURL = 'images/'.$row["propic"];
   $imageURL1 = 'images/'.$row["propic1"];
   $imageURL2 = 'images/'.$row["propic2"];
//   echo "<tr>
//   <td><a href='asset-full.php?id={$row["id"]}'>" . $row["asid"] . "</a></td>
//   <td>" . $row["description"] . "</td>
//   <td>" . $row["pno"] . "</td>
//   <td>" . $row["pdate"] . "</td>
//   <td>" . $row["cost"] . "</td>
//   <td>" . $row["status"] . "</td>
//   <td>" . $row["model"] . "</td>
//   <td>" . $row["sno"] . "</td>
//   <td>" . $row["site"] . "</td>
//   <td>" . $row["location"] . "</td>
//   <td>" . $row["category"] . "</td>
//   <td>" . $row["department"] . "</td>
//   <td>" . $row["employee"] . "</td>
//   <td>" . $row["brand"] . "</td>
//   <td>" . $row["uid"] . "</td>
//   <td>" . $row["cond"] . "</td>
 
 

// </tr>";

                  ?>

<div class="clearfix"></div>
  
  <div class="content-wrapper">

      <div class="row">
      <div class="col-lg-12">
         
         <div class="card">
           <div class="card-body">
           <div class="card-title">Asset Details</div>
           <hr>
 <div class="row">
 
      <div class="col-lg-4">

        <h4 style="color:#fe8b0a;"> <?php echo $row['description']; ?> </h4>
<img onerror="this.src='images/default-image.jpg'" src="<?php echo $imageURL; ?>" width="100%" alt="" />

     </div>
      <div class="col-lg-4">
<table class="table table-bordered">
               
                <tbody>
                  <tr>
                    <th scope="row">Asset ID</th>
                    <td><?php echo $row['asid']; ?></td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Plate</th>
                    <td><?php echo $row['pno']; ?></td>
                  
                  </tr>
                  <tr>
                    <th scope="row">Purchase Date</th>
                    <td><?php echo $row['pdate']; ?></td>
                 
                  </tr>

                   <tr>
                    <th scope="row">Cost</th>
                    <td><?php echo $row['cost']; ?></td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Status</th>
                    <td><?php echo $row['status']; ?></td>
                  
                  </tr>
                  <tr>
                    <th scope="row">Model</th>
                    <td><?php echo $row['model']; ?></td>
                 
                  </tr>
                    <tr>
                    <th scope="row">Unimac ID</th>
                    <td><?php echo $row['uid']; ?></td>
                 
                  </tr>
                </tbody>
              </table>
      </div>
      <div class="col-lg-4">
        <table class="table table-bordered">
               
                <tbody>
 <tr>
                    <th scope="row">Serial Number</th>
                    <td><?php echo $row['sno']; ?></td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Site</th>
                    <td><?php echo $row['site']; ?></td>
                  
                  </tr>
                  <tr>
                    <th scope="row">Location</th>
                    <td><?php echo $row['location']; ?></td>
                 
                  </tr>
                   <tr>
                    <th scope="row">Department</th>
                    <td><?php echo $row['department']; ?></td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Assigned to</th>
                    <td><?php echo $row['employee']; ?></td>
                  
                  </tr>
                  <tr>
                    <th scope="row">Brand</th>
                    <td><?php echo $row['brand']; ?></td>
                 
                  </tr>
                    <tr>
                    <th scope="row">Condition</th>
                    <td><?php echo $row['cond']; ?></td>
                 
                  </tr>
                </tbody>
              </table>
      </div>
    </div>

    
      <div class="row">
        <div class="col-lg-12">
           <div class="card">
              <div class="card-body"> 
                <ul class="nav nav-tabs nav-tabs-primary">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tabe-1"> <span class="hidden-xs">Photos</span></a>
                  </li>

                        <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabe-4"> <span class="hidden-xs">Additional Information</span></a>
                  </li>
                
                
                   <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabe-2"> <span class="hidden-xs">History</span></a>
                  </li>
              
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabe-3"> <span class="hidden-xs">Actions</span></a>
                  </li>
                 
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div id="tabe-1" class="container tab-pane active">
                 <div class="row">
        <div class="col-lg-6">
<img onerror="this.src='images/default-image.jpg'" src="<?php echo $imageURL1; ?>" width="100%" alt="" />
        </div>
        <div class="col-lg-6">

 <img onerror="this.src='images/default-image.jpg'" src="<?php echo $imageURL2; ?>" width="100%" alt="" />
  
        </div>
      </div>

                  </div>


<div id="tabe-4" class="container tab-pane fade">
 <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                      </tr>
                      <td>
                        <?php echo $row['customname']; ?>
                      </td>
</thead>
</table>


 </div>

  <?php
}
}
?>

                  <div id="tabe-2" class="container tab-pane fade">
                 

<div class="table-responsive">
              <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Earlier Status</th>
                        <th>Assigned to</th>
                        <th>Status</th>
                         <th>Condition</th>
                          <th>Site</th>
                        
                        <th>Unimac ID</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php


                
                  $show = "SELECT * FROM asset_his where id='$id' ";
                  $final = $con->query($show);
if ($final->num_rows > 0) {
while($row = $final->fetch_assoc()) {
  echo "<tr>
   <td>" . $row["ev_date"] . "</td>
  <td>" . $row["status"] . "</td>
  <td>" . $row["employee"] . "</td>
  <td>" . $row["status"] . "</td>
    <td>" . $row["cond"] . "</td>
 
  <td>" . $row["site"] . "</td>
 

  <td>" . $row["uid"] . "</td>

 

</tr>";
}
}
                  ?>
                 
                </tbody>
          
            </table>
            </div>

                  </div>



 

                  <div id="tabe-3" class="container tab-pane fade">
                   <div class="card-body">


                     <?php


                  if (isset($_GET['del'])) {
  $id = $_GET['del'];
  
  $delrow = mysqli_query($con,"delete from asset where id = '$id'");
  // mysqli_query($con, "DELETE FROM category WHERE category=$category");
  $_SESSION['message'] = "Address deleted!"; 
  //header('location: index.php');
}

                  $show1 = "SELECT * FROM asset where $id = id";
                  $final1 = $con->query($show1);
if ($final1->num_rows > 0) {
while($row1 = $final1->fetch_assoc()) {
  // $show2 = "SELECT * FROM asset where status = 'available'";
  // echo $row1['status'];
  if ($row1['status'] == 'Available')

  {
  echo "

 

<a href=\"asset-rq.php?rq=" . $row1["id"] . "\" class=\"btn btn-info btn-lg waves-effect waves-light m-1\">REQUEST</a>

";

}
 else
 {
   echo "

";

 }

}
}

                  ?>
                 
       
          </div>
                  </div>
                </div>
              </div>
           </div>

        </div>

      
      </div><!--End Row-->


        
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
