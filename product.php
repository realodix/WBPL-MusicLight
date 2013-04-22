<h2> Pilih Product yang mau dibeli </h2>
<?php
//tentukan nilai batas
$batas=2;
if(isset($_GET['halaman'])){
	$halaman = $_GET['halaman'];
}
$posisi=null;
if(empty($halaman)){
	$posisi=0;
	$halaman=1;
}else{
	$posisi=($halaman-1)* $batas;
}
$sql=null;
if(isset($_GET['id'])){
	$kd_kategori=$_GET['id'];
	$sql="select * from buku where kd_kategori='$kd_kategori' 
	limit $posisi,$batas";
}else if(isset($_GET['p'])){
	$kd_penerbit=$_GET['p'];
	$sql="select * from buku where kd_penerbit='$kd_penerbit' 
	limit $posisi,$batas ";
}else{
	$sql="select * from buku  limit $posisi,$batas";
}


$hasil=mysql_query($sql) or die(mysql_error());

while($get_data=mysql_fetch_array($hasil)){
	

?>
<h3><?php echo $get_data['judul']?></h3>
<div class="image_wrapper image_fl"><img src="cover/<?php echo $get_data['cover']?>" alt="Image Not Avaible" width='150px' heigth='150px'></a>
</div>
<p>
	<em>Penulis: <?php echo $get_data['pengarang'];	?></em> </br>
	<em>Harga: <?php echo $get_data['harga']; ?></em>
</p>
<p>
	<?php echo $get_data['deskripsi']; ?>
</p>

<a href="index.php?page=cart&action=add&id=<?php echo $get_data['kd_buku']; ?>" class="btn btn-inverse floatRight">Add to cart</a>

<div class="clearfix"></div>
<?php
}

//=============CUT HERE====================================
$tampil2=mysql_query("select * from buku");
$jmldata=mysql_num_rows($tampil2);
$jumlah_halaman=ceil($jmldata/$batas);

echo "<br> <br> Halaman :";
for($i=1;$i<=$jumlah_halaman;$i++)
if ($i!=$halaman){
	echo "<a href=index.php?page=product&halaman=$i> $i</a> | ";
}else{
	echo "<b> $i</b> | ";
}
mysql_close();
?>

<br>
Jumlah Halaman :<?php echo $jmldata; ?>

