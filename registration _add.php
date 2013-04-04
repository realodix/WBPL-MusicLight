<?php
include ('admin/inc/config.php');
require_once('inc/common_function.php');

//data dari user
if (isset($_POST['register_user'])) {
	$Kd_member = kode_member();
	$name_user = $_POST['name_user'];
	$username_user = $_POST['username_user'];
	$cpass_user = $_POST['cpass_user'];
	$gender_user = $_POST['gender_user'];
	$address_user = $_POST['address_user'];
	$phone_user = $_POST['phone_user'];
	$email_user = $_POST['email_user'];

	
	$sql = "INSERT INTO wbpl_member(Kd_member,member_name,
									member_username,
									member_password,
									member_gender,
									member_address,
									member_phone,
									member_email)
		VALUES('$Kd_member','$name_user',
				'$username_user',
				'$cpass_user',
				'$gender_user',
				'$address_user',
				'$phone_user',
				'$email_user')";
	$result = mysql_query($sql) or die(mysql_error());

	//check if query successful
	if ($result) {
		header('location:index.php?page=registration&status=0');
	} else {
		header('location:index.php?page=registration&status=1');
	}
	mysql_close();
}
?>