<?php
include('inc/config.php');

?><table  width="600px" border=0>
<tr style="background-color:#F79307">
<td>Kd customer</td><td>Nama</td><td>Alamat</td><td>Kode Pos</td><td>No Telp</td><td>Email</td>
<td>Kd Pesan</td><td>Operasi</td></tr>



<?php
/*
 * kode untuk menghapus data
 */
if(isset($_GET['del'])){
	$kd_customer=$_GET['id'];
	$hapus ="delete from customer where kd_customer='$kd_customer'";
	mysql_query($hapus);
}
$sql="";
if(isset($_POST['btnCari'])){
$cari=$_POST['cari'];
//ambil data dari table admin
$sql="SELECT * FROM  customer where kd_customer like '%$cari%'";
}else{
$sql="SELECT * FROM  customer";
}

$result=mysql_query($sql) or die(mysql_error());


//proses menampilkan data 
while($rows=mysql_fetch_array($result)){
?>
<tr>

<td><?php echo $rows['kd_pemesan']; ?></td>

<td><?php echo $rows['Nama']; ?></td>

<td><?php echo $rows['Alamat']; ?></td>

<td><?php echo $rows['kd_pos']; ?></td>

<td><?php echo $rows['No_telp']; ?></td>

<td><?php echo $rows['Email']; ?></td>
<td><?php echo $rows['kd_pesan']; ?></td>


<td>
<!--<a href="index.php?page=customer_form_edit&id=<?php echo $rows['kd_customer']?>">
<img src="image/admin/edit.png"></a>-->
<a href="index.php?page=customer_view&del=true&id=<?php echo $rows['kd_customer']?>"  onclick="return askUser()";>
<i class="icon-remove" title="Remove"></i></a>
</td>
</tr>

<?php
}

//tutup koneksi

?>
<tr><td align=right colspan='6'>
<?php 
if(isset($_GET['status'])){
if($_GET['status']==0){
echo " Operasi data berhasil";
}else{
echo "operasi gagal";
}
}
?>
 </td>
 <td align=right><!--<a href="index.php?page=customer_form_add"> 
<img src="image/admin/add.jpg"> Add</a>--></td></tr>
<tr></tr>
</table>

<?php

mysql_close(); //close database

//tampilan siapa yang login


?>

