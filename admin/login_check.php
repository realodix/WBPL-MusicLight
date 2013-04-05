<?php
session_start();
$session = array('username');

//file konfigurasi
include ('inc/config.php');


/**
* Validasi khusus untuk halaman login.
*/
$username = $_POST['username'];
$password = $_POST['password'];

$password = md5($password);

$sql= "select * from wbpl_member where member_username='$username' and member_password='$password' ";

$userquery = mysql_query($sql) or die(mysql_error());
// 	$valid=false;
if (mysql_num_rows($userquery) == 1) {

	header('location:index.php');
	$valid = true;
	$_SESSION['username'] = $username;
}

if ($valid == false) {
	header("Location:login.php?status=1");
}

/**
* Validasi khusus untuk halaman home.
*/
if (isset($_POST['Home_Submit_Login'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];

	$password = md5($password);

	$sql= "select * from wbpl_member where member_username='$username' and member_password='$password' ";

	$userquery = mysql_query($sql) or die(mysql_error());
	// 	$valid=false;
	if (mysql_num_rows($userquery) == 1) {
		header('location:../home.php');
		$valid = true;
		$_SESSION['username'] = $username;
	}

	if ($valid == false) {
		header("Location:index.php?status=1");
	}

}
?>

