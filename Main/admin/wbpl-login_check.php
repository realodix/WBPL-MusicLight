<?php
//file konfigurasi
include ('../../wbpl-config.php');

/**
* Validasi khusus untuk halaman login.
*/
if (isset($_POST['Submit_Login'])) {

session_start();
$session = array('username');

$username = $_POST['username'];
$password = $_POST['password'];

$password = md5($password);

$sql= "select * from wbpl_member
		where
		username='$username' and password='$password' ";

$userquery = mysql_query($sql) or die(mysql_error());

if (mysql_num_rows($userquery) == 1) {

	header('location:../index.php');
	$valid = true;
	$_SESSION['username'] = $username;
	
}

if ($valid == false) {
	header("Location:../login.php?status=1");
}
}


/**
* Validasi khusus untuk halaman home.
*/
if (isset($_POST['Home_Submit_Login'])) {
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(strlen($username) == 0){
		header('location:../../index.php?&err=1');
	}
	else if(strlen($password) == 0){
		header('location:../../index.php?&err=2');
	}else{
	
		session_start();
		$session = array('username');

		$password = md5($password);

		$sql= "select * from wbpl_member
			where
			username='$username' and password='$password' ";

		$userquery = mysql_query($sql) or die(mysql_error());

		if (mysql_num_rows($userquery) == 1) {
			header('location:../../index.php');
			$valid = true;
			$_SESSION['username'] = $username;
		}

		if ($valid == false) {
			header("Location:../../index.php?err=3");
		}
	}

}else if (isset($_POST['Home_Submit_Regiter'])) {

	header("Location:../../registration.php");

}
?>