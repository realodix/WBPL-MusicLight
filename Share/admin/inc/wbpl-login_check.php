<?php
//file konfigurasi
include ('config.php');

/**
* Validasi khusus untuk halaman login.
*/
if (isset($_POST['Submit_Login'])) {

session_start();
$session = array('username');

$username = $_POST['username'];
$password = $_POST['password'];

$password = md5($password);

$sql= "select * from wbpl_member where username='$username' and password='$password' ";

$userquery = mysql_query($sql) or die(mysql_error());
// 	$valid=false;
if (mysql_num_rows($userquery) == 1) {

	header('location:../index.php');
	$valid = true;
	$_SESSION['username'] = $username;
	
}

if ($valid == false) {
	header("Location:../login.php");
}
}


/**
* Validasi khusus untuk halaman home.
*/
if (isset($_POST['Home_Submit_Login'])) {
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
		session_start();
		$session = array('username');

		$password = md5($password);

		$sql= "select * from wbpl_member where username='$username' and password='$password' ";

		$userquery = mysql_query($sql) or die(mysql_error());
		// 	$valid=false;
		if (mysql_num_rows($userquery) == 1) {
			header('location:../../index.php');
			$valid = true;
			$_SESSION['username'] = $username;
		}else if ($valid == false) {
			header("Location:../../index.php");
		}

}
?>