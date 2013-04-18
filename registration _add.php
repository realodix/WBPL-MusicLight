<?php
include ('admin/inc/config.php');
require_once('inc/common_function.php');

//data dari user
if (isset($_POST['register_user'])) {
	$Kd_member = kode_member();
	$name_user = $_POST['name_user'];
	$username_user = $_POST['username_user'];
	$pass_user = $_POST['pass_user'];
	$cpass_user = $_POST['cpass_user'];
	$gender_user = $_POST['gender_user'];
	$address_user = $_POST['address_user'];
	$phone_user = $_POST['phone_user'];
	$email_user = $_POST['email_user'];
	
	if(strlen($name_user) == 0){
		header('location:registration.php?&err=1');
	}else if (filter_var($name_user, FILTER_VALIDATE_INT)){
		header('location:registration.php?&err=2');
	}else if(strlen($username_user) == 0){
		header('location:registration.php?&err=3');
	}else if(strlen($pass_user) == 0){
		header('location:registration.php?&err=4');
	}else if(strlen($cpass_user) == 0){
		header('location:registration.php?&err=5');
	}else if($cpass_user != $pass_user){
		header('location:registration.php?&err=51');
	}else if(strlen($gender_user) == 0){
		header('location:registration.php?&err=6');
	}else if(strlen($address_user) == 0){
		header('location:registration.php?&err=7');
	}else if(!strpos($address_user, "street")){
		header('location:registration.php?&err=71');
	}else if(strlen($phone_user) == 0){
		header('location:registration.php?&err=8');
	}else if (!filter_var($phone_user, FILTER_VALIDATE_INT)){
		header('location:registration.php?&err=81');
	}else if(strlen($email_user) == 0){
		header('location:registration.php?&err=9');
	}else if(!filter_var($email_user, FILTER_VALIDATE_EMAIL)){
		header('location:registration.php?&err=91');
	}else{
		$cpass_user = md5($cpass_user);
		
		$sql = "INSERT INTO wbpl_member(Kd_member,name,
										username,
										password,
										gender,
										address,
										phone,
										email)
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
			header('location:registration.php?&status=1');
		}
		mysql_close();
	}
}
?>