<?php

mysql_connect("localhost", "root", "") or die("cannot connect" . mysql_error());
mysql_select_db("wbpl_share") or die(mysql_error());


$stitle = "MusicLight";
$sdescription = "Music Light is a famous musical instrument shop in the town";

$footer = "Copyright &copy 2013, Dari 06PFM untuk 06PFM";
?>