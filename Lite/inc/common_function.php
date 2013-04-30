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

function pesan_error($s = '') {
	echo "<script type=\"text/javascript\">alert(\"Maaf, $s..!!\");window.history.back();</script>";
}

function pesan_comment($url = '') {
	if ($url === '')
		$url = './';
	echo "<script type=\"text/javascript\">alert(\"Terima kasih telah mengisi komentar di sistem ini..!!\");</script>";
	echo "<META HTTP-EQUIV = 'Refresh' Content = '0; URL = $url'>";
}

function pesan_submit($url = '') {
	if ($url === '')
		$url = './';
	echo "<script type=\"text/javascript\">alert(\"Data Berhasil Disimpan..!!\");</script>";
	echo "<META HTTP-EQUIV = 'Refresh' Content = '0; URL = $url'>";
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
function kode_buku() {
	$kode_temp = fetch_row("SELECT kd_buku FROM buku ORDER BY kd_buku DESC LIMIT 0,1");
	if ($kode_temp == '')
		$kode = "B0001";
	else {
		$jum = substr($kode_temp, 1, 4);
		$jum++;
		if ($jum <= 9)
			$kode = "B000" . $jum;
		elseif ($jum <= 99)
			$kode = "B00" . $jum;
		elseif ($jum <= 999)
			$kode = "B0" . $jum;
		elseif ($jum <= 9999)
			$kode = "B" . $jum;
	
		else
			die("Kode buku melebihi batas");
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

?>
