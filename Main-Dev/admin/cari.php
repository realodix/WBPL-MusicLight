<?php
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="wbpl_ml"; // Database name
$con =  mysql_connect($host,$username,$password)   or die(mysql_error());
		mysql_select_db($db_name, $con)  or die(mysql_error());
$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "select nama_brand from wbpl_product where nama_brand LIKE '%$q%'";
$result = mysql_query($sql) or die(mysql_error());

while($rows = mysql_fetch_array($result)) {
	echo $rows['nama_brand'];
}
?>