<h2> Pilih Product yang mau dibeli </h2>
<?php
//tentukan nilai batas
$batas=2;
if(isset($_GET['halaman'])){
	$halaman=$_GET['halaman'];
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
	$kd_brand=$_GET['id'];
	//$sql="select * from wbpl_product where kd_brand='$kd_brand' 
	//limit $posisi,$batas";
	$sql="select * from wbpl_product, wbpl_brand, wbpl_instype
          where wbpl_product.kd_brand = wbpl_brand.kd_brand AND
				wbpl_product.kd_instype = wbpl_instype.kd_instype
		limit $posisi,$batas";
}else if(isset($_GET['p'])){
	$kd_instype=$_GET['p'];
	$sql="select * from wbpl_product where kd_instype='$kd_instype' 
	limit $posisi,$batas ";
}else{
	$sql="select * from wbpl_product  limit $posisi,$batas";
}

include('admin/inc/config.php');

$hasil=mysql_query($sql) or die(mysql_error());

while($get_data=mysql_fetch_array($hasil)){
	

?>

<div class="image_wrapper image_fl"><img src="cover/<?php echo $get_data['product_image']?>" width='150px' heigth='150px'></a>
</div>
<p>
	<em>Product ID: <?php echo $get_data['kd_product']?></em><br>
	<em>Brand: <?php echo $get_data['nama_brand']?></em><br>
	<em>Instrument Type: <?php echo $get_data['nama_instype']?></em><br>
	<em>Price: Rp. <?php echo $get_data['product_price']?></em><br>
	<em>Stock: <?php
				$product_stock = $get_data['product_stock'];
				if ($product_stock == 0 ){
					echo 'Stock Not Avaible';
				}else{
					echo $get_data['product_stock'];
				}
				?>
	</em>
</p>
<p>
	<?php echo $get_data['product_deskripsi'];?>
</p>
<div class="btn_more">
	<a href="index.php?page=cart&action=add&id=<?php echo $get_data['kd_product']?>">Add to cart</a>
</div>
<div style="clear: both"></div>
<?php
}

//=============CUT HERE====================================
$tampil2=mysql_query("select * from wbpl_product");
$jmldata=mysql_num_rows($tampil2);
$jumlah_halaman=ceil($jmldata/$batas);

echo "Halaman :";
for($i=1;$i<=$jumlah_halaman;$i++)
if ($i!=$halaman){
	echo "<a href=index.php?page=detail&halaman=$i>$i</a>|";
}else{
	echo "<b>$i</b>|";
}
mysql_close();
?>
<br>
Jumlah data: <?php echo $jmldata;
?>

