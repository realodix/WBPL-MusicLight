<?php
include ('inc/config.php');

$action = $_GET['action'];
switch ($action) {
	case 'insertproduct':
		$kd_product = $_POST['kd_product'];
		$kd_brand = $_POST['kd_brand'];
		$kd_instype = $_POST['kd_instype'];
		$product_price = $_POST['product_price'];
		$product_stock = $_POST['product_stock'];
		$product_deskripsi = $_POST['product_deskripsi'];

		$lokasi_file = $_FILES['product_image']['tmp_name'];
		$nama_file = $_FILES['product_image']['name'];
		$product_image=$nama_file;
		$direktori = "../cover/$nama_file";

		if (move_uploaded_file($lokasi_file, $direktori)) {

			$sql = "INSERT INTO wbpl_product(kd_product,
									nama_brand,
									nama_instype,
									price,
									stock,
									image,
									deskripsi)
				VALUES('$kd_product',
						'$kd_brand',
						'$kd_instype',
						'$product_price',
						'$product_stock',
						'$product_image',
						'$product_deskripsi')";
			$result = mysql_query($sql) or die(mysql_error());
		}else{
			$sql = "INSERT INTO wbpl_product(kd_product,
									nama_brand,
									nama_instype,
									price,
									stock,
									image,
									deskripsi)
				VALUES('$kd_product',
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
			header('location:index.php?page=product&status=0');
		} else {
			header('location:index.php?page=product&status=1');
		}
		mysql_close();
	break;
	
	case 'updateproduct':
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
			header('location:index.php?page=product&status=0');
		} else {
			header('location:index.php?page=product&status=1');
		}
		mysql_close();
	break;
	
	case 'insert_brand':
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
	break;
	
	case 'update_brand':
		$kd_brand = $_POST['kd_brand'];
		$nama_brand = $_POST['nama_brand'];

		$sql = " update wbpl_brand
					set 
						nama_brand='$nama_brand'
					where 
						kd_brand='$kd_brand'";

		//echo $sql;
		$result = mysql_query($sql) or die(mysql_error());

		//check if query successful
		if ($result) {
			header('location:index.php?page=brand_view&status=0');
		} else {
			header('location:index.php?page=brand_view&status=1');
		}
		mysql_close();
	break;
	
	case 'insert_instype':
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
	break;
	
	case 'update_instype':
		$kd_instype = $_POST['kd_instype'];
		$nama_instype = $_POST['nama_instype'];

		$sql = " update wbpl_instype
						set 
							nama_instype='$nama_instype'
						where 
							kd_instype='$kd_instype'";

		//echo $sql;
		$result = mysql_query($sql) or die(mysql_error());

		//check if query successful
		if ($result) {
			header('location:index.php?page=brand_view&status=0');
		} else {
			header('location:index.php?page=brand_view&status=1');
		}
		mysql_close();
	break;
	
	case 'update_profile':
		$member_name = $_POST['Name'];
		$member_address = $_POST['Address'];
		$member_phone = $_POST['Phone'];
		$member_email = $_POST['Email'];
		
		$sql = " update wbpl_member set 
					name='$member_name',
					address='$member_address',
					phone='$member_phone',
					email='$member_email'";

		//echo $sql;
		$result = mysql_query($sql) or die(mysql_error());

		//check if query successful
		if ($result) {
			header('location:index.php?page=member&status=0');
		} else {
			header('location:index.php?page=member&status=1');
		}
		mysql_close();
	break;
	
	case 'insert_biaya':
		$id_kota = $_POST['id_kota'];
		$nama_kota = $_POST['nama_kota'];
		$biaya = $_POST['biaya'];

		$sql = "INSERT INTO biaya_kirim(id_kota,nama_kota,biaya)
			VALUES('$id_kota', '$nama_kota','$biaya')";
		$result = mysql_query($sql) or die(mysql_error());

		//check if query successful
		if ($result) {
			header('location:index.php?page=zbiaya_view&status=0');
		} else {
			header('location:index.php?page=zbiaya_view&status=1');
		}
		mysql_close();
	break;
	
	case 'update_biaya':
		$id_kota = $_POST['id_kota'];
		$nama_kota = $_POST['nama_kota'];
		$biaya = $_POST['biaya'];

		$sql = " update biaya_kirim set nama_kota='$nama_kota', biaya='$biaya' where id_kota='$id_kota'";

		//echo $sql;
		$result = mysql_query($sql) or die(mysql_error());

		//check if query successful
		if ($result) {
			header('location:index.php?page=zbiaya_view&status=0');
		} else {
			header('location:index.php?page=zbiaya_view&status=1');
		}
		mysql_close();
	break;
}

?>
