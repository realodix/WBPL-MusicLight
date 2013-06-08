<?php
require_once '../wbpl-config.php';

$q = strtolower($_GET["q"]);
if (!$q) return;
$sql = "select nama_brand from wbpl_brand where nama_brand LIKE '%$q%'";
$querysql = mysql_query($sql);
while($kt = mysql_fetch_array($querysql)) {
	$kata = $kt['nama_brand'];
	echo "$kata\n";
}
?>