<?php
/*INDEX CASE
*- insertproduct
*- updateproduct
*- insert_brand
*- update_brand
*- insert_instype
*- update_instype
*- update_profile
*- insert_biaya
*- update_biaya
*- insert_testimony
*- insert_registration
*/

include ('../wbpl-config.php');
require_once('../wbpl-function.php');

$action = $_GET['action'];
switch ($action) {
	case 'insertproduct':
		$kd_product = kode_product();
		$nama_product = $_POST['nama_product'];
		$nama_brand = $_POST['nama_brand'];
		$nama_instype = $_POST['nama_instype'];
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
						'$nama_brand',
						'$nama_instype',
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
						'$nama_brand',
						'$nama_instype',
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
		$nama_product = $_POST['nama_product'];
		//$kd_brand = $_POST['kd_brand'];
		//$kd_instype = $_POST['kd_instype'];
		$kd_product = $_GET['id'];
		$product_price = $_POST['product_price'];
		$product_stock = $_POST['product_stock'];
		$product_deskripsi = $_POST['product_deskripsi'];

		$lokasi_file = $_FILES['product_image']['tmp_name'];
		$nama_file = $_FILES['product_image']['name'];
		$product_image=$nama_file;
		$direktori = "image/$nama_file";

		if (move_uploaded_file($lokasi_file, $direktori)) {
						
			$sql = "UPDATE wbpl_product
					SET
						nama_product='$nama_product',
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
						nama_product='$nama_product',
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
	
	case 'insert_ac':
		$q = strtolower($_GET["q"]);
		if (!$q) return;

		$ac = $_GET['ac'];
		switch ($ac) {
			case 'nama_product':
				$sql = "select nama_brand from wbpl_brand where nama_brand LIKE '%$q%'";
				$querysql = mysql_query($sql);
				while($kt = mysql_fetch_array($querysql)) {
					$kata = $kt['nama_brand'];
					echo "$kata\n";
				}
			break;
			
			case 'nama_instype':
				$sql = "select nama_instype from wbpl_instype where nama_instype LIKE '%$q%'";
				$querysql = mysql_query($sql);
				while($kt = mysql_fetch_array($querysql)) {
					$kata = $kt['nama_instype'];
					echo "$kata\n";
				}
			break;
		}
	break;
	
	case 'insert_brand':
		$kd_brand = kode_brand();
		$nama_brand = $_POST['nama_brand'];


		$sql = "INSERT INTO wbpl_brand(kd_brand,nama_brand)
			VALUES('$kd_brand', '$nama_brand')";
		$result = mysql_query($sql) or die(mysql_error());

		//check if query successful
		if ($result) {
			header('location:index.php?page=wbpl-brand&action=view&status=0');
		} else {
			header('location:index.php?page=wbpl-brand&action=view&status=1');
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
			header('location:index.php?page=wbpl-brand&action=view&status=0');
		} else {
			header('location:index.php?page=wbpl-brand&action=view&status=1');
		}
		mysql_close();
	break;
	
	case 'insert_instype':
		$kd_instype = kode_instype();
		$nama_instype = $_POST['nama_instype'];


		$sql = "INSERT INTO wbpl_instype(kd_instype,nama_instype)
			VALUES('$kd_instype', '$nama_instype')";
		$result = mysql_query($sql) or die(mysql_error());

		//check if query successful
		if ($result) {
			header('location:index.php?page=wbpl-brand&action=view&status=2');
		} else {
			header('location:index.php?page=wbpl-brand&action=view&status=3');
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
			header('location:index.php?page=wbpl-brand&action=view&status=2');
		} else {
			header('location:index.php?page=wbpl-brand&action=view&status=3');
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
			header('location:index.php?page=wbpl-biaya&action=view&status=0');
		} else {
			header('location:index.php?page=wbpl-biaya&action=view&status=1');
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
			header('location:index.php?page=wbpl-biaya&action=view&status=0');
		} else {
			header('location:index.php?page=wbpl-biaya&action=view&status=1');
		}
		mysql_close();
	break;
	
	case 'insert_testimony':
		$kd_testimony = kd_testimony();
		$testimony_isi = $_POST['testimony_isi'];
		
		$sql = "INSERT INTO wbpl_testimony(kd_testimony,
										testimony_isi)
				VALUES('$kd_testimony',
						'$testimony_isi')";
		$result = mysql_query($sql) or die(mysql_error());

		//check if query successful
		if ($result) {
			header('location:../index.php?page=testimony&status=0#waiting');
		} else {
			header('location:../index.php?page=testimony');
		}
		mysql_close();
	break;
	
	case 'insert_registration':
		$Kd_member = kode_member();
		$name_user = $_POST['name_user'];
		$username_user = $_POST['username_user'];
		$pass_user = $_POST['pass_user'];
		$cpass_user = $_POST['cpass_user'];
		$gender_user = $_POST['gender_user'];
		$address_user = $_POST['address_user'];
		$phone_user = $_POST['phone_user'];
		$email_user = $_POST['email_user'];
		
		if(strlen($name_user) == 0){
			header('location:../index.php?page=registration&err=1');
		}else if (filter_var($name_user, FILTER_VALIDATE_INT)){
			header('location:../index.php?page=registration&err=2');
		}else if(strlen($username_user) == 0){
			header('location:../index.php?page=registration&err=3');
		}else if(strlen($pass_user) == 0){
			header('location:../index.php?page=registration&err=4');
		}else if(strlen($pass_user) < 5){
			header('location:../index.php?page=registration&err=41');
		}else if(strlen($cpass_user) == 0){
			header('location:../index.php?page=registration&err=5');
		}else if($cpass_user != $pass_user){
			header('location:../index.php?page=registration&err=51');
		}else if(strlen($gender_user) == 0){
			header('location:../index.php?page=registration&err=6');
		}else if(strlen($address_user) == 0){
			header('location:../index.php?page=registration&err=7');
		}else if(strlen($phone_user) == 0){
			header('location:../index.php?page=registration&err=8');
		}
		//else if (!filter_var($phone_user, FILTER_VALIDATE_INT)){
			//header('location:../registration.php?err=81');
		//}
		else if(strlen($email_user) == 0){
			header('location:../index.php?page=registration&err=9');
		}else if(!filter_var($email_user, FILTER_VALIDATE_EMAIL)){
			header('location:../index.php?page=registration&err=91');
		}else{
			$cpass_user = md5($cpass_user);
			
			$sql = "INSERT INTO wbpl_member(Kd_member,name,
											username,
											password,
											gender,
											address,
											phone,
											email)
				VALUES('$Kd_member','$name_user',
						'$username_user',
						'$cpass_user',
						'$gender_user',
						'$address_user',
						'$phone_user',
						'$email_user')";
			$result = mysql_query($sql) or die(mysql_error());

			//check if query successful
			if ($result) {
				header('location:../index.php?page=registration&status=0');
			} else {
				header('location:../index.php?page=registration&status=1');
			}
			mysql_close();
		}
	break;
}

?>
