<?php 
session_start();
session_destroy();
header("location:login.php");

if (isset($_POST['Home_Submit_Logout'])) {
	header("location:../index.php");
}
?>