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
if (isset($_GET['logout'])) {
	if ($_GET['logout'] == 1) {
		header("location:../index.php");
	}
}
?>