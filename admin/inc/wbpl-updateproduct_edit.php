<?php
include ('config.php');
//data dari user
if (isset($_POST['tambah'])) {

	//$kd_brand = $_POST['kd_brand'];
	//$kd_instype = $_POST['kd_instype'];
	$kd_product = $_POST['kd_product'];
	$product_price = $_POST['product_price'];
	$product_stock = $_POST['product_stock'];
	$product_deskripsi = $_POST['product_deskripsi'];

	$lokasi_file = $_FILES['product_image']['tmp_name'];
	$nama_file = $_FILES['product_image']['name'];
	$product_image=$nama_file;
	$direktori = "../cover/$nama_file";

if (move_uploaded_file($lokasi_file, $direktori)) {
				
	$sql = "UPDATE wbpl_product
			SET
				price='$product_price',
				stock='$product_stock',
				image='$product_image',
				deskripsi='$product_deskripsi'
			where
				kd_product='$kd_product'";

	
	$result = mysql_query($sql) or die(mysql_error());

	
}else{

	$sql = "UPDATE wbpl_product
			SET
				price='$product_price',
				stock='$product_stock',
				image='$product_image',
				deskripsi='$product_deskripsi'
			where
				kd_product='$kd_product'";

	
	$result = mysql_query($sql) or die(mysql_error());

}

	//check if query successful
	if ($result) {
		header('location:../index.php?page=product&status=0');
	} else {
		header('location:../index.php?page=product&status=1');
	}
	mysql_close();
	
}
?>
