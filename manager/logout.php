<?php
session_start();
$_SESSION['login']=="";

session_destroy(); 
$_SESSION['action1']="You have logged out successfully..!";
?>
<script language="javascript">
document.location="login.php";
</script>