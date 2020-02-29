<?php
include('dbconnection.php');
session_start();

   if(!isset($_SESSION['login'])){
      header("location:login.php");
      die();
   }


if( isset($_GET['del']) )
  {
    $id = $_GET['del'];
    $sql= "DELETE FROM asset WHERE id='$id'";
$result = mysqli_query($con,$sql) or die ( mysqli_error());
    echo "<meta http-equiv='refresh' content='0;url=asset-list.php'>";
  }
?>
             