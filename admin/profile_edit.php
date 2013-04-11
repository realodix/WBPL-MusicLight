<?php
include ('inc/config.php');
//data dari user
if (isset($_POST['UpdateProfile'])) {
	$member_name = $_POST['Name'];
	$member_address = $_POST['Address'];
	$member_phone = $_POST['Phone'];
	$member_email = $_POST['Email'];
	


	$sql = " update wbpl_member set 
				address='$member_address',
				phone='$member_phone',
				email='$member_email'
			where name='$member_name'";

	//echo $sql;
	$result = mysql_query($sql) or die(mysql_error());

	//check if query successful
	if ($result) {
		header('location:index.php?page=profile&status=0');
	} else {
		header('location:index.php?page=profile&status=1');
	}
	mysql_close();
}
?>