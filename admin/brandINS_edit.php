<?php
include ('inc/config.php');
//data dari user
if (isset($_POST['submitUser'])) {
	$kd_instype = $_POST['kd_instype'];
	$nama_instype = $_POST['nama_instype'];


	$sql = " update wbpl_instype set 
				nama_instype='$nama_instype'
			where kd_instype='$kd_instype'";

	//echo $sql;
	$result = mysql_query($sql) or die(mysql_error());

	//check if query successful
	if ($result) {
		header('location:index.php?page=brand_view&status=0');
	} else {
		header('location:index.php?page=brand_view&status=1');
	}
	mysql_close();
}
?>