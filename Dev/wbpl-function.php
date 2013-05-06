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

function combo_brand() {
	echo "<option value='' selected>- Pilih Brand-</option>";
	$query = query("SELECT nama_brand FROM wbpl_brand ORDER BY nama_brand ASC");
	while ($row = mysql_fetch_row($query)) {
		echo "<option value='$row[0]'> " . ucwords($row[0]) . " </option>";
	}
}

function combo_ins_type($kode) {
	echo "<option value='' selected>- Pilih Instrument Type-</option>";
	$query = query("SELECT nama_instype FROM wbpl_instype ORDER BY nama_instype ASC");
	while ($row = mysql_fetch_row($query)) {
		echo "<option value='$row[0]'> " . ucwords($row[0]) . " </option>";
	}
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
function kode_brand() {
	$kode_temp = fetch_row("SELECT kd_brand FROM wbpl_brand ORDER BY kd_brand DESC LIMIT 0,1");
	if ($kode_temp == '')
		$kode = "B01";
	else {
		$jum = substr($kode_temp, 1, 2);
		$jum++;
		if ($jum <= 9)
			$kode = "B0" . $jum;
		elseif ($jum <= 99)
			$kode = "B" . $jum;
	
		else
			die("Kode Brand melebihi batas");
	}
	return $kode;
}

function kode_instype() {
	$kode_temp = fetch_row("SELECT kd_instype FROM wbpl_instype ORDER BY kd_instype DESC LIMIT 0,1");
	if ($kode_temp == '')
		$kode = "I01";
	else {
		$jum = substr($kode_temp, 1, 2);
		$jum++;
		if ($jum <= 9)
			$kode = "I0" . $jum;
		elseif ($jum <= 99)
			$kode = "I" . $jum;
	
		else
			die("Kode Instrument Type melebihi batas");
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

/*
function user_member($user) {
	$br = fetch_row("SELECT user FROM member WHERE user='$user'");
	if ($br != '')
		return true;
	else
		return false;
}
function pass_member($user, $pass) {
	$br = fetch_row("SELECT user FROM member WHERE user='$user' AND pass=md5('$pass')");
	if ($br != '')
		return true;
	else
		return false;
}
function no_baris($j = "") {
	if ($j == "")
		$jum = 15;
	else
		$jum = $j;
	if (isset($_GET["entrant"]) && ($_GET["entrant"] > 1))
		return $jum * ($_GET["entrant"] - 1);
	else
		return 0;
}
function paging($sql, $limit) {
	require_once (class_ . 'pager/Pager.php');
	$isi = query($sql);
	$data = array();
	while ($row = mysql_fetch_row($isi)) {
		$data[] = $row;
	}
	@mysql_free_result($isi);
	$params = array('itemData' => $data, 'perPage' => $limit, 'delta' => 5, 'append' => true, 'separator' => '', 'clearIfVoid' => false, 'urlVar' => 'entrant', 'useSessions' => false, 'closeSession' => false, 'mode' => 'Jumping', );

	$pager = &Pager::factory($params);
	return $pager;
}
function cek_bayar() {
	$id_member = fetch_row("SELECT id_member FROM member WHERE user='" . $_SESSION['VIRTUALDOCTER_MEMBER'] . "'");
	$temp = fetch_row("SELECT status_pesan FROM pesan WHERE status_pesan='0' AND id_member='$id_member'");
	if ($temp == '')
		return true;
	else
		return false;
}
function cek_status_bayar($kode) {
	$br = fetch_row("SELECT status_pesan FROM pesan WHERE id_pesan='$kode'");
	if ($br == '1')
		return true;
	else
		return false;
}

*/
?>