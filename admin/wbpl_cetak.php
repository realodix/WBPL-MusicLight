<html>
	<head>
		<link rel="stylesheet" type="text/css" media="screen" href="style2.css" />
	</head>
	<body>
		<h2 align="center"> List Product </h2>
		<h1 align="center"> Music Light </h1>
		<p align="center">
			Jakarta Barat
		</p>
		<hr>
		<br/>

		<table align='center'>
			<tr style="background-color:#F79307">
				<td>No</td><td>Product ID</td><td>Brand</td><td>Instrument Type</td>
				<td>Price</td><td>Stock</td>
			</tr>
			<?php
			include ('inc/config.php');

			$sql="SELECT * FROM  wbpl_product";

			$result=mysql_query($sql) or die(mysql_error());

			//proses menampilkan data
			$no=1;
			while($rows=mysql_fetch_array($result)){
			?>
			<tr>	
				<td><?php echo $no;?></td>
				<td><?php echo $rows['kd_product'];?></td>
				<td><?php echo $rows['nama_brand'];?></td>
				<td><?php echo $rows['nama_instype'];?></td>
				<td><?php echo $rows['price'];?></td>
				<td><?php echo $rows['price'];?></td>
			</tr>
			<?php
			$no++;	
				}
			?>
		</table>
		<?php mysql_close();
?>
	</body>
</html>