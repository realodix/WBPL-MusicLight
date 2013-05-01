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



function valid($tmp) {
	return htmlentities(addslashes($tmp));
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



?>
