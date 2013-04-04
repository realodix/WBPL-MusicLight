<?php
include ('admin/inc/config.php');

//data dari user
if (isset($_POST['register_user'])) {
	$name_user = $_POST['name_user'];
	$username_user = $_POST['username_user'];
	$pass_user = $_POST['pass_user'];
	$cpass_user = $_POST['cpass_user'];
	/*$gender_user = $_POST['gender_user'];*/
	$address_user = $_POST['address_user'];
	$phone_user = $_POST['phone_user'];
	$email_user = $_POST['email_user'];


	/*$sql = "INSERT INTO wbpl_brand(kd_brand,nama_brand)
		VALUES('$kd_brand', '$nama_brand')";
	$result = mysql_query($sql) or die(mysql_error());*/

	//check if query successful
	if ($result) {
		header('location:index.php?page=registration&status=0');
	} else {
		header('location:index.php?page=registration&status=1');
	}
	mysql_close();
}
?>