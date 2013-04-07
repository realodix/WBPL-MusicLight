<?php
include ('inc/config.php');
//data dari user
if (isset($_POST['tambah'])) {

	$kd_brand = $_POST['kd_brand'];
	$kd_instype = $_POST['kd_instype'];
	$product_price = $_POST['product_price'];
	$product_deskripsi = $_POST['product_deskripsi'];

	$lokasi_file = $_FILES['product_image']['tmp_name'];
	$nama_file = $_FILES['product_image']['name'];
	$product_image=$nama_file;
	$direktori = "../cover/$nama_file";

if (move_uploaded_file($lokasi_file, $direktori)) {
				
	$sql = "UPDATE wbpl_product SET
		kd_brand='$kd_brand',
		kd_instype='$kd_instype',
		product_price='$product_price',
		product_image='$product_image',
		product_deskripsi='$product_deskripsi'
		where wbpl_product.kd_brand = wbpl_brand.kd_brand AND
				wbpl_product.kd_instype = wbpl_instype.kd_instype";
	
	$result = mysql_query($sql) or die(mysql_error());

	//check if query successful
	if ($result) {
		header('location:index.php?page=product&status=0');
	} else {
		header('location:index.php?page=product&status=1');
	}
	mysql_close();
}
}
?>
