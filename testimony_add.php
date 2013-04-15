<?php
include ('admin/inc/config.php');
require_once('inc/common_function.php');

//data dari user
if (isset($_POST['testimony_submit'])) {
	$kd_testimony = kd_testimony();
	$testimony_isi = $_POST['testimony_isi'];
	
	$sql = "INSERT INTO wbpl_testimony(kd_testimony,
									testimony_isi)
			VALUES('$kd_testimony',
					'$testimony_isi')";
	$result = mysql_query($sql) or die(mysql_error());

	//check if query successful
	if ($result) {
		header('location:testimony.php?status=0#waiting');
	} else {
		header('location:testimony.php');
	}
	mysql_close();
}
?>