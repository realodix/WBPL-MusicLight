<?php

if(!isset($_SESSION)){
session_start();
}

function writeShoppingCart() {
	if(isset($_GET['action'])){
		$cart = $_SESSION['cart'];
		if ($cart) {
			// Parse the cart session variable
			$items = explode(',', $cart);
			$s = (count($items) > 1) ? 's' : '';
			return '<p>Ada <a href="index.php?page=cart">' . count($items) . ' barang' . $s . ' di keranjang belanja</a></p>';
		}else{
			echo '<p>Anda belum pesan apapun</p>';
		}
	}else{
		echo '<p>Anda belum pesan apapun</p>';
	}
}

function getQty() {
	$cart = $_SESSION['cart'];
	if (!$cart) {
		return 0;
	} else {
		// Parse the cart session variable
		$items = explode(',', $cart);
		$s = (count($items) > 1) ? 's' : '';
		return count($items);
	}
}

function getDiskon($qty) {
	if ($qty >= 10)
		return 0.1;
	else
		return 0;
}


function wbpl_showCart() {
	global $db;
	if ($cart = $_SESSION['cart']){
		if(isset($_GET['action'])){

			$items = explode(',', $cart);
			foreach ($items as $item) {
				$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
			}
			echo '<form action="index.php?page=cart&view=cart&action=update" method="post" id="cart">';
			echo '<table border=0 align="center" class="table table-bordered">';
				
			$total = 0;
			foreach ($contents as $id => $qty) {
				$sql = "SELECT * from wbpl_product WHERE kd_product = '$id'";
				$result = mysql_query($sql) or die(mysql_error());
				$rows=mysql_fetch_array($result);

				echo 	'<tr>
							<td>Brand</td>
							<td colspan="4">'. $rows['kd_product'] .'</td>
						<tr>
						<tr>
							<td>Brand</td>
							<td colspan="4">'. $rows['nama_brand'] .'</td>
						<tr>
						<tr>
								<td>Instrument Type</td>
								<td colspan="4">'. $rows['nama_instype'] .'</td>
						</tr>
						<tr">
							<td rowspan="2">Price</td>
							<td rowspan="2">Rp. ' . $rows['price'] . '</td>
							<td rowspan="2"><input type="text" name="qty' . $id . '" value="' . $qty . '" size="2" maxlength="3" /></td>

							<td rowspan="2">Rp. ' . ($rows['price'] * $qty) . '</td>
						
							<td><a href="index.php?page=cart&view=cart&action=delete&id=' . $id . '" class="btn btn-danger">Hapus</a></td>
						</tr>
						<tr><td><br></td></tr>';
					
				$total += $rows['price'] * $qty;
			}
			echo '</table>';
			$qty = getQty();
						
			echo '<p>Sub Total: <strong> Rp. ' . $total . '</strong></p>';
			
			$_SESSION['totalbayar'] = $total;
			echo '<div><button type="submit" class="btn btn-primary">Update cart</button></div>';
			echo '</form>';

		}else{
			$items = explode(',', $cart);
			foreach ($items as $item) {
				$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
			}
			echo '<form action="index.php?page=cart&view=cart&action=update" method="post" id="cart">';
			echo '<table border=0 align="center" class="table table-bordered">';
				
			$total = 0;
			foreach ($contents as $id => $qty) {
				$sql = "SELECT * from wbpl_product WHERE kd_product = '$id'";
				$result = mysql_query($sql) or die(mysql_error());
				$rows=mysql_fetch_array($result);

				echo 	'<tr>
							<td>Brand</td>
							<td colspan="4">'. $rows['kd_product'] .'</td>
						<tr>
						<tr>
							<td>Brand</td>
							<td colspan="4">'. $rows['nama_brand'] .'</td>
						<tr>
						<tr>
							<td>Instrument Type</td>
							<td colspan="4">'. $rows['nama_instype'] .'</td>
						</tr>
						<tr">
							<td rowspan="2">Price</td>
							<td rowspan="2">Rp. ' . $rows['price'] . '</td>
							<td rowspan="2"><input type="text" name="qty' . $id . '" value="' . $qty . '" size="2" maxlength="3" /></td>

							<td rowspan="2">Rp. ' . ($rows['price'] * $qty) . '</td>
					
							<td><a href="index.php?page=cart&view=cart&action=delete&id=' . $id . '" class="btn btn-danger">Hapus</a></td>
						</tr>
						<tr><td><br></td></tr>';
					
				$total += $rows['price'] * $qty;
			}
			echo '</table>';
			$qty = getQty();
					
			echo '<p>Sub Total: <strong> Rp. ' . $total . '</strong></p>';
			
			$_SESSION['totalbayar'] = $total;
			echo '<div><button type="submit" class="btn btn-primary">Update cart</button></div>';
			echo '</form>';
		}
	}else{
		echo "Keranjang belanjaan Anda masih kosong";
	}
}


function insertToDB($kode_pesan) {
	global $db;
	$total_bayar=$_SESSION['totalbayar'];
	$cart = $_SESSION['cart'];
	if ($cart) {
		$items = explode(',', $cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		
		$sql_pesan = "insert into pesan (kd_pesan,tgl_pesan,total_bayar) 
		values( '$kode_pesan', sysdate(),'$total_bayar')";

		mysql_query($sql_pesan) or die(mysql_error());
		foreach ($contents as $id => $qty) {

			$sql = "insert into det_pesan(no_pesan,kd_buku,total_pesan)
			values('$kode_pesan','$id','$qty')";

			$result = mysql_query($sql) or die(mysql_error());
		}
	} else {
		$output[] = '<p>Keranjang belanja masih kosong.</p>';
	}

}

?>