<?php
include('dbconnection.php');
session_start();

   if(!isset($_SESSION['login'])){
      header("location:login.php");
      die();
   }




?>
<?php include('inc/header.php');?>

<div class="clearfix"></div>
    
  <div class="content-wrapper">
    <div class="container-fluid">

      <div class="row mt-3">
 <div class="col-12 col-lg-12 col-xl-12">
   <div class="row mt-3">
        <div class="col-4 col-lg-4 col-xl-4">
          <div class="card gradient-shifter">
              <div class="card-body">
                <div class="media align-items-center">
                  <div class="w-icon pr-3">
                      <i class="fa fa-briefcase text-white"></i></div>
                    <div class="media-body pl-3 border-left border-white-2">
                      <h5 class="text-white mb-0">
<?php
$result = mysqli_query($con,"SELECT * FROM asset");
$rows = mysqli_num_rows($result);
echo $rows;
 ?>

                       </h5>
                      <span class="text-white small-font">Total Assets</span>
                    </div>
                  </div>
              </div>
            
            </div>
        </div>
        <div class="col-4 col-lg-4 col-xl-4">
          <div class="card gradient-forest">
              <div class="card-body">
                <div class="media align-items-center">
                  <div class="w-icon pr-3">
                      <i class="fa fa-usd text-white"></i></div>
                    <div class="media-body pl-3 border-left border-white-2">
                      <h5 class="text-white mb-0">
<?php

 $query = "SELECT SUM(cost) FROM asset"; 
 $result = mysqli_query($con,$query);
 while($row = mysqli_fetch_array($result)){
    echo "SAR " . $row['SUM(cost)'];
 }
 ?>

                </h5>
                      <span class="text-white small-font">NAV: Net Asset Value</span>
                    </div>
                  </div>
              </div>
            
            </div>
        </div>
    
        <div class="col-4 col-lg-4 col-xl-4">
          <div class="card gradient-deepblue">
              <div class="card-body">
                <div class="media align-items-center">
                  <div class="w-icon pr-3">
                      <i class="fa fa-money text-white"></i></div>
                    <div class="media-body pl-3 border-left border-white-2">
                      <h5 class="text-white mb-0">
<?php

 $query = "SELECT SUM(cost) FROM asset"; 
 $result = mysqli_query($con,$query);
 while($row = mysqli_fetch_array($result)){
    echo "SAR " . $row['SUM(cost)'];
 }
 ?>
                      </h5>
                      <span class="text-white small-font">Value of assets</span>
                    </div>
                  </div>
              </div>
          
            </div>
        </div>


     


      </div><!--End Row-->

 </div>


      </div>
   
   <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Recent Assets</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Asset ID</th>
                        <th>Description</th>
                      
                        <th>Purchase Date</th>
                        <th>Cost</th>
                        <th>Status</th>
                        <th>Model</th>
                        
                        <th>Site</th>
                       
                        <th>Assigned to</th>
                       
                        <th>Condition</th>
                    </tr>
                </thead>
                <tbody>
                    <?php


                
                  $show = "SELECT * FROM asset order by id DESC LIMIT 10";
                  $final = $con->query($show);
if ($final->num_rows > 0) {
while($row = $final->fetch_assoc()) {
  echo "<tr>
  <td><a href='asset-full.php?id={$row["id"]}'>" . $row["asid"] . "</a></td>
  <td>" . $row["description"] . "</td>
  
  <td>" . $row["pdate"] . "</td>
  <td>" . $row["cost"] . "</td>
  <td>" . $row["status"] . "</td>
  <td>" . $row["model"] . "</td>
 
  <td>" . $row["site"] . "</td>
 
  
  <td>" . $row["employee"] . "</td>
  
  
  <td>" . $row["cond"] . "</td>
 

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



    <?php include('inc/footer.php');?>

