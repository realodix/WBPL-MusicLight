<?php
require_once '../wbpl-config.php';

$q = strtolower($_GET["q"]);
if (!$q) return;

$action = $_GET['action'];
switch ($action) {
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
?>