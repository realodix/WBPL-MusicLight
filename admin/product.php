<?php
//include ('ind/config.php');
?>

<table>
<tr style="background-color:#F79307">
<td>Product ID</td><td>Brand</td><td>Instrument Type</td><td>Price</td><td>Stock</td><td>Operasi</td></tr>

<?php
/*
* kode untuk menghapus data
*/
if(isset($_GET['del'])){
$kd_product=$_GET['id'];
$hapus ="delete from wbpl_product where kd_product='$kd_product'";
mysql_query($hapus) or die(mysql_error());

}
$sql="";
if(isset($_POST['btnCari'])){
$cari=$_POST['cari'];
//ambil data dari table admin
$sql="SELECT * FROM  wbpl_product where wbpl_product like '%$cari%'";
}else{
$sql="select * from wbpl_product, wbpl_brand, wbpl_instype
          where wbpl_product.nama_brand = wbpl_brand.nama_brand AND
				wbpl_product.nama_instype = wbpl_instype.nama_instype";
}

$result=mysql_query($sql) or die(mysql_error());

//proses menampilkan data
while($rows=mysql_fetch_array($result)){
?>
<tr>
	<td><?php  echo $rows['kd_product'];?></td>
	<td><?php  echo $rows['nama_brand'];?></td>
	<td><?php  echo $rows['nama_instype'];?></td>
	<td><?php  echo $rows['price'];?></td>
	<td><?php  echo $rows['stock'];?></td>
	<td>
		<a href="index.php?page=updateproduct&id=<?php echo $rows['kd_product']?>">
		<i class="icon-edit" title="Edit"></i></a>
		<a href="index.php?page=product&del=true&id=<?php echo $rows['kd_product']?>"  onclick="return askUser()";>
		<i class="icon-remove" title="Remove"></i></a>
	</td>
</tr>

<?php
}

//tutup koneksi
?>
<tr><td align=right colspan='5'>
<?php
if (isset($_GET['status'])) {
	if ($_GET['status'] == 0) {
		echo " Operasi data berhasil";
	} else {
		echo "operasi gagal";
	}
}
?>
</td>
<td align=right><a href="index.php?page=insertproduct">
<img src="image/admin/add.jpg">Insert product</a></td></tr>
<td align=right><a href="buku_cetak.php" target='_blank'>
cetak</a></td></tr>
<tr></tr>
</table>




<?php

mysql_close();
//close database

//tampilan siapa yang login
?>

