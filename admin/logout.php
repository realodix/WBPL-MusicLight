<?php 
session_start();
session_destroy();

/**
* Logout ke halaman login.
*/
header("location:login.php");

/**
* Logout ke halaman home.
*/
if (isset($_POST['Home_Submit_Logout'])) {
	header("location:../index.php");
}
?>