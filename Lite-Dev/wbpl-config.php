<?php
$host		= "localhost";
$username	= "root";
$password	= "";
$db_name	= "wbpl_ml_lite";

mysql_connect("$host", "$username", "$password") or die("cannot connect" . mysql_error());

mysql_select_db("$db_name") or die(mysql_error());
?>