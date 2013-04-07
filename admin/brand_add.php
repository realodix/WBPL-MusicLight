<?php
include ('inc/config.php');
//data dari user
if (isset($_POST['tambahLogin'])) {
	$kd_brand = $_POST['kd_brand'];
	$nama_brand = $_POST['nama_brand'];


	$sql = "INSERT INTO wbpl_brand(kd_brand,nama_brand)
		VALUES('$kd_brand', '$nama_brand')";
	$result = mysql_query($sql) or die(mysql_error());

	//check if query successful
	if ($result) {
		header('location:index.php?page=brand_view&status=0');
	} else {
		header('location:index.php?page=brand_view&status=1');
	}
	mysql_close();
}



if (isset($_POST['tambahLoginIT'])) {
	$kd_instype = $_POST['kd_instype'];
	$nama_instype = $_POST['nama_instype'];


	$sql = "INSERT INTO wbpl_instype(kd_instype,nama_instype)
		VALUES('$kd_instype', '$nama_instype')";
	$result = mysql_query($sql) or die(mysql_error());

	//check if query successful
	if ($result) {
		header('location:index.php?page=brand_view&status=2');
	} else {
		header('location:index.php?page=brand_view&status=3');
	}
	mysql_close();
}
?>
