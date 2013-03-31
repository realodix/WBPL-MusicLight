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
?>
