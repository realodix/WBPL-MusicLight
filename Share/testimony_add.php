<?php

include ('konfigurasi.php');
require_once('wbpl_06pfm-function.php');

		$kd_testimony = kd_testimony();
		$testimony_isi = $_POST['testimony_isi'];
		
		$sql = "INSERT INTO wbpl_testimony(kd_testimony,
										testimony_isi)
				VALUES('$kd_testimony',
						'$testimony_isi')";
		$result = mysql_query($sql) or die(mysql_error());

		//check if query successful
		if ($result) {
			header('location:index.php?page=testimony');
		} else {
			header('location:index.php?page=testimony');
		}
		mysql_close();


?>
