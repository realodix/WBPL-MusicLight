<?php

include ('konfigurasi.php');
require_once('wbpl_06pfm-function.php');

		$name_user = $_POST['name_user'];
		$username_user = $_POST['username_user'];
		$pass_user = $_POST['pass_user'];
		$cpass_user = $_POST['cpass_user'];
		$gender_user = $_POST['gender_user'];
		$address_user = $_POST['address_user'];
		$phone_user = $_POST['phone_user'];
		$email_user = $_POST['email_user'];
		
			$cpass_user = md5($cpass_user);
			
			$sql = "INSERT INTO wbpl_member(name,
											username,
											password,
											gender,
											address,
											phone,
											email)
				VALUES('$name_user',
						'$username_user',
						'$cpass_user',
						'$gender_user',
						'$address_user',
						'$phone_user',
						'$email_user')";
			$result = mysql_query($sql) or die(mysql_error());

			if ($result) {
				header('location:index.php?page=registration');
			} else {
				header('location:index.php?page=registration');
			}
			mysql_close();

?>