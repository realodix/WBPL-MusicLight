<?php
//include ('inc/config.php');
?>

<table  width="320px" border=0 style="float: left;">

<tr style="background-color:#F79307">
	<td>Kode</td>
	<td>Brand</td>
	<td>Operation</td>
</tr>

<?php
/*
* kode untuk menghapus data
*/
if(isset($_GET['del'])){
$kd_brand=$_GET['id'];
$hapus ="delete from wbpl_brand where kd_brand='$kd_brand'";
mysql_query($hapus);
}
$sql="";
if(isset($_POST['btnCari'])){
$cari=$_POST['cari'];
//ambil data dari table admin
$sql="SELECT * FROM  wbpl_brand where kd_brand like '%$cari%'";
}else{
$sql="SELECT * FROM  wbpl_brand";
}

$result=mysql_query($sql) or die(mysql_error());

//proses menampilkan data
while($rows=mysql_fetch_array($result)){
?>
<tr>
	<td><?  echo $rows['kd_brand'];?></td>
	<td><?  echo $rows['nama_brand'];?></td>

	<td>
		<a href="index.php?page=brand_form_edit&id=<? echo $rows['kd_brand']?>">
		<img src="image/b_edit.png"></a>
		<a href="index.php?page=brand_view&del=true&id=<? echo $rows['kd_brand']?>"  onclick="return askUser()";>
		<img src="image/b_drop.png"></a>
	</td>
</tr>

<?
}

//tutup koneksi
?>
<tr>
	<td align=right colspan='2'>
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

	<td align=right><a href="index.php?page=brand_form_add">
	<img src="image/add.jpg"> Add</a></td>

	<td align=right colspan='4'>
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
</tr>

</table>







<table  width="320px" border=0 style="float: right;">

<tr style="background-color:#F79307">
	<td>Kode</td>
	<td>Instrument Type</td>
	<td>Operation</td>
</tr>

<?php
/*
* kode untuk menghapus data
*/
if(isset($_GET['del'])){
$kd_brand=$_GET['id'];
$hapus ="delete from wbpl_brand where kd_brand='$kd_brand'";
mysql_query($hapus);
}
$sql="";
if(isset($_POST['btnCari'])){
$cari=$_POST['cari'];
//ambil data dari table admin
$sql="SELECT * FROM  wbpl_instype where kd_instype like '%$cari%'";
}else{
$sql="SELECT * FROM  wbpl_instype";
}

$result=mysql_query($sql) or die(mysql_error());

//proses menampilkan data
while($rows=mysql_fetch_array($result)){
?>
<tr>
	<td><?  echo $rows['kd_instype'];?></td>
	<td><?  echo $rows['nama_instype'];?></td>

	<td>
		<a href="index.php?page=brand_form_edit&id=<? echo $rows['kd_brand']?>">
		<img src="image/b_edit.png"></a>
		<a href="index.php?page=brand_view&del=true&id=<? echo $rows['kd_brand']?>"  onclick="return askUser()";>
		<img src="image/b_drop.png"></a>
	</td>
</tr>

<?
}

//tutup koneksi
?>
<tr>
	<td align=right colspan='2'>
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

	<td align=right><a href="index.php?page=brand_form_add">
	<img src="image/add.jpg"> Add</a></td>

	<td align=right colspan='4'>
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
</tr>

</table>




<?

mysql_close();
//close database

//tampilan siapa yang login
?>

