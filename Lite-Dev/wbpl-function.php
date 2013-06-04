<?php

function query($qry) {
	$result = mysql_query($qry) or die("Gagal melakukan query pada :
	 <br>$qry<br><br>Kode Salah : <br>&nbsp;&nbsp;&nbsp;" . mysql_error() . "!");
	return $result;
}
function fetch_row($qry) {
	$tmp = query($qry);
	list($result) = mysql_fetch_row($tmp);
	return $result;
}
function num_rows($qry) {
	$tmp = query($qry);
	$jum = mysql_num_rows($tmp);
	return $jum;
}
function valid($tmp) {
	return htmlentities(addslashes($tmp));
}

function selected($t1, $t2) {
	if (trim($t1) == trim($t2))
		return "selected";
	else
		return "";
}

function kode_pesan() {
	$kode_temp = fetch_row("SELECT kd_pesan FROM pesan ORDER BY kd_pesan DESC LIMIT 0,1");
	if ($kode_temp == '')
		$kode = "P001";
	else {
		$jum = substr($kode_temp, 1, 6);
		$jum++;
		if ($jum <= 9)
			$kode = "P00" . $jum;
		elseif ($jum <= 99)
			$kode = "P0" . $jum;
		elseif ($jum <= 999)
			$kode = "P" . $jum;
	
		else
			die("Kode pemesanan melebihi batas");
	}
	return $kode;
}
function kode_customer() {
	$kode_temp = fetch_row("SELECT kd_pemesan FROM customer ORDER BY kd_pemesan DESC LIMIT 0,1");
	if ($kode_temp == '')
		$kode = "C001";
	else {
		$jum = substr($kode_temp, 1, 6);
		$jum++;
		if ($jum <= 9)
			$kode = "C00" . $jum;
		elseif ($jum <= 99)
			$kode = "C0" . $jum;
		elseif ($jum <= 999)
			$kode = "C" . $jum;
	
		else
			die("Kode pemesanan melebihi batas");
	}
	return $kode;
}

function kode_product() {
	$kode_temp = fetch_row("SELECT kd_product FROM wbpl_product ORDER BY kd_product DESC LIMIT 0,1");
	if ($kode_temp == '')
		$kode = "P0001";
	else {
		$jum = substr($kode_temp, 1, 4);
		$jum++;
		if ($jum <= 9)
			$kode = "P000" . $jum;
		elseif ($jum <= 99)
			$kode = "P00" . $jum;
		elseif ($jum <= 999)
			$kode = "P0" . $jum;
		elseif ($jum <= 9999)
			$kode = "P" . $jum;
	
		else
			die("Kode product melebihi batas");
	}
	return $kode;
}

function kode_member() {
	$kode_temp = fetch_row("SELECT kd_member FROM wbpl_member ORDER BY kd_member DESC LIMIT 0,1");
	if ($kode_temp == '')
		$kode = "M0001";
	else {
		$jum = substr($kode_temp, 1, 4);
		$jum++;
		if ($jum <= 9)
			$kode = "M000" . $jum;
		elseif ($jum <= 99)
			$kode = "M00" . $jum;
		elseif ($jum <= 999)
			$kode = "M0" . $jum;
		elseif ($jum <= 9999)
			$kode = "M" . $jum;
	
		else
			die("Kode member melebihi batas");
	}
	return $kode;
}

function kd_testimony() {
	$kode_temp = fetch_row("SELECT kd_testimony FROM wbpl_testimony ORDER BY kd_testimony DESC LIMIT 0,1");
	if ($kode_temp == '')
		$kode = "T0001";
	else {
		$jum = substr($kode_temp, 1, 4);
		$jum++;
		if ($jum <= 9)
			$kode = "T000" . $jum;
		elseif ($jum <= 99)
			$kode = "T00" . $jum;
		elseif ($jum <= 999)
			$kode = "T0" . $jum;
		elseif ($jum <= 9999)
			$kode = "T" . $jum;
	
		else
			die("Kode member melebihi batas");
	}
	return $kode;
}

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

function wbpl_showCart() {
	global $db;
	if(isset($_SESSION['cart'])){
		if ($cart = $_SESSION['cart']){
			if(isset($_GET['action'])){

				$items = explode(',', $cart);
				foreach ($items as $item) {
					$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
				}
				echo '<form action="index.php?page=cart&view=cart&action=update#contents" method="post" id="cart">';
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
				echo '<div><button type="submit" class="btn btn-primary">Update Cart</button>
				<a href="index.php?page=cart&view=cart&kirim=true#fpb" class="btn btn-inverse">Next</a></div>';
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
				echo '<div><button type="submit" class="btn btn-primary">Update cart</button>
				<a href="index.php?page=cart&view=cart&kirim=true#fpb" class="btn btn-inverse">Next</a></div>';
				echo '</form>';
			}
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