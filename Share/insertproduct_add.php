<?php
include ('konfigurasi.php');
require_once('wbpl_06pfm-function.php');


		$kd_product = kode_product();
		$nama_product = $_POST['nama_product'];
		$kd_brand = $_POST['kd_brand'];
		$kd_instype = $_POST['kd_instype'];
		$product_price = $_POST['product_price'];
		$product_stock = $_POST['product_stock'];
		$product_deskripsi = $_POST['product_deskripsi'];

		$lokasi_file = $_FILES['product_image']['tmp_name'];
		$nama_file = $_FILES['product_image']['name'];
		$product_image = $nama_file;
		$direktori = "image/$nama_file";

		if (move_uploaded_file($lokasi_file, $direktori)) {

			$sql = "INSERT INTO wbpl_product(kd_product,
									nama_product,
									nama_brand,
									nama_instype,
									price,
									stock,
									image,
									deskripsi)
				VALUES('$kd_product',
						'$nama_product',
						'$kd_brand',
						'$kd_instype',
						'$product_price',
						'$product_stock',
						'$product_image',
						'$product_deskripsi')";
			$result = mysql_query($sql) or die(mysql_error());
		}else{
			$sql = "INSERT INTO wbpl_product(kd_product,
									nama_product,
									nama_brand,
									nama_instype,
									price,
									stock,
									image,
									deskripsi)
				VALUES('$kd_product',
						'$nama_product',
						'$kd_brand',
						'$kd_instype',
						'$product_price',
						'$product_stock',
						'$product_image',
						'$product_deskripsi')";
			$result = mysql_query($sql) or die(mysql_error());
		}

		//check if query successful
		if ($result) {
			header('location:index.php?page=product');
		} else {
			header('location:index.php?page=product');
		}
		mysql_close();

?>
