<?php
//include ('ind/config.php');
?>

<table class="table">
	<tr style="background-color:#F79307">
		<td>Product ID</td>
		<td>Product Name</td>
		<td>Brand</td>
		<td>Instrument Type</td>
		<td>Price</td>
		<td>Stock</td>
		<td width="131">Operation</td>
	</tr>

	<?php
	/*
	* kode untuk menghapus data
	*/
	if(isset($_GET['del'])){
		$kd_product=$_GET['id'];
		$hapus ="delete from wbpl_product where kd_product='$kd_product'";
		mysql_query($hapus) or die(mysql_error());
	}
	
	$sql="select * from wbpl_product";

	$result=mysql_query($sql) or die(mysql_error());

	//proses menampilkan data
	while($rows=mysql_fetch_array($result)){
	?>
	<tr>
		<td><?php  echo $rows['kd_product'];?></td>
		<td><?php  echo $rows['nama_product'];?></td>
		<td><?php  echo $rows['nama_brand'];?></td>
		<td><?php  echo $rows['nama_instype'];?></td>
		<td><?php  echo $rows['price'];?></td>
		<td><?php  echo $rows['stock'];?></td>
		<td>
			<a class="btn" href="index.php?page=updateproduct&id=<?php echo $rows['kd_product']?>">
			Edit</a> or 
			<a class="btn btn-danger" href="index.php?page=product&del=true&id=<?php echo $rows['kd_product']?>"  onclick="return askUser()";>
			Del</a>
		</td>
	</tr>

	<?php
	}

	//tutup koneksi
	?>
	<tr>
		<td align=right colspan="6">

		</td>

		<td align=right>
			<a class="btn btn-primary" href="index.php?page=insertproduct">
			 Insert product
			</a>
		</td>
	</tr>

	<tr>
		<td align=right colspan="2">

		</td>
	</tr>
	<tr></tr>
</table>


<?php

mysql_close();

?>

