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
 <div class="col-12 col-lg-6 col-xl-6">
   <div class="row mt-3">
        <div class="col-12 col-lg-12 col-xl-12">
          <div class="card gradient-shifter">
              <div class="card-body">
                <div class="media align-items-center">
                  <div class="w-icon pr-3">
                      <i class="fa fa-briefcase text-white"></i></div>
                    <div class="media-body pl-3 border-left border-white-2">
                      <h5 class="text-white mb-0">1115 </h5>
                      <span class="text-white small-font">Total Assets</span>
                    </div>
                  </div>
              </div>
            
            </div>
        </div>
        <div class="col-12 col-lg-12 col-xl-12">
          <div class="card gradient-forest">
              <div class="card-body">
                <div class="media align-items-center">
                  <div class="w-icon pr-3">
                      <i class="fa fa-usd text-white"></i></div>
                    <div class="media-body pl-3 border-left border-white-2">
                      <h5 class="text-white mb-0">SAR 470,549</h5>
                      <span class="text-white small-font">NAV: Net Asset Value</span>
                    </div>
                  </div>
              </div>
            
            </div>
        </div>
    
        <div class="col-12 col-lg-12 col-xl-12">
          <div class="card gradient-deepblue">
              <div class="card-body">
                <div class="media align-items-center">
                  <div class="w-icon pr-3">
                      <i class="fa fa-money text-white"></i></div>
                    <div class="media-body pl-3 border-left border-white-2">
                      <h5 class="text-white mb-0">SAR 470,549</h5>
                      <span class="text-white small-font">Value of assets</span>
                    </div>
                  </div>
              </div>
          
            </div>
        </div>


        <div class="col-12 col-lg-12 col-xl-12">
          <div class="card gradient-deepblue">
              <div class="card-body">
                <div class="media align-items-center">
                  <div class="w-icon pr-3">
                      <i class="fa fa-truck text-white"></i></div>
                    <div class="media-body pl-3 border-left border-white-2">
                      <h5 class="text-white mb-0">0 </h5>
                      <span class="text-white small-font">Puchases(Fiscal yr)</span>
                    </div>
                  </div>
              </div>
            
            </div>
        </div>


      </div><!--End Row-->

 </div>

  <div class="col-12 col-lg-6 col-xl-6">
  <div class="col-lg-12 col-xl-12">
          <div class="card">
            <div class="card-header text-uppercase">Assets by category</div>
            <div class="card-body">
              <canvas id="pieChart" height="240"></canvas>
            </div>
          </div>
        </div>
  </div>
      </div>
   


    <?php include('inc/footer.php');?>

