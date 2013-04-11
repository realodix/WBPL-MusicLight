<?php
//include ('ind/config.php');
?><table   border=0>
<tr style="background-color:#F79307">
<td>Kd buku</td><td>Judul</td><td>Pengarang</td><td>Harga</td><td>Operasi</td></tr>

<?php
/*
* kode untuk menghapus data
*/
if(isset($_GET['del'])){
$kd_buku=$_GET['id'];
$hapus ="delete from buku where kd_buku='$kd_buku'";
mysql_query($hapus) or die(mysql_error());

}
$sql="";
if(isset($_POST['btnCari'])){
$cari=$_POST['cari'];
//ambil data dari table admin
$sql="SELECT * FROM  buku where kd_buku like '%$cari%'";
}else{
$sql="SELECT * FROM  buku";
}

$result=mysql_query($sql) or die(mysql_error());

//proses menampilkan data
while($rows=mysql_fetch_array($result)){
?>
<tr>
	<td><?php  echo $rows['kd_buku'];?></td>
	<td><?php  echo $rows['judul'];?></td>
	<td><?php echo $rows['pengarang'];?></td>
	<td><?php  echo $rows['harga'];?></td>
	<td>
<!--<a href="index.php?page=buku_form_edit&id=<?php echo $rows['kd_buku']?>">
<img src="image/b_edit.png"></a>-->
<a href="index.php?page=buku_view&del=true&id=<?php echo $rows['kd_buku']?>"  onclick="return askUser()";>
<img src="image/b_drop.png"></a>|
detail
</td>
</tr>

<?php
}

//tutup koneksi
?>
<tr><td align=right colspan='4'>
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
<td align=right><a href="index.php?page=buku_form_add">
<img src="image/add.jpg"> Tambah</a></td></tr>
<td align=right><a href="buku_cetak.php" target='_blank'>
cetak</a></td></tr>
<tr></tr>
</table>







<table   border=0>
<tr style="background-color:#F79307">
<td>Product ID</td><td>Brand</td><td>Instrument Type</td><td>Price</td><td>Stock</td><td>Operasi</td></tr>

<?php
/*
* kode untuk menghapus data
*/
if(isset($_GET['del'])){
$wbpl_product=$_GET['id'];
$hapus ="delete from wbpl_product where wbpl_product='$wbpl_product'";
mysql_query($hapus) or die(mysql_error());

}
$sql="";
if(isset($_POST['btnCari'])){
$cari=$_POST['cari'];
//ambil data dari table admin
$sql="SELECT * FROM  wbpl_product where wbpl_product like '%$cari%'";
}else{
$sql="SELECT * FROM  wbpl_product";
}

$result=mysql_query($sql) or die(mysql_error());

//proses menampilkan data
while($rows=mysql_fetch_array($result)){
?>
<tr>

<td><?php  echo $rows['kd_product'];?></td>
<td><?php  echo $rows['product_brand'];?></td>
<td><?php  echo $rows['product_ins_type'];?></td>
<td><?php  echo $rows['product_price'];?></td>
<td><?php  echo $rows['product_stock'];?></td>
<td>
<!--<a href="index.php?page=buku_form_edit&id=<?php// echo $rows['kd_buku']?>">
<img src="image/b_edit.png"></a>-->
<a href="index.php?page=buku_view&del=true&id=<?php echo $rows['kd_product']?>"  onclick="return askUser()";>
<img src="image/b_drop.png"></a>|
detail
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
<img src="image/add.jpg"> Tambah</a></td></tr>
<td align=right><a href="buku_cetak.php" target='_blank'>
cetak</a></td></tr>
<tr></tr>
</table>




<?php

mysql_close();
//close database

//tampilan siapa yang login
?>

