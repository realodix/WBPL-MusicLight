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
	$product_brand=$_GET['id'];
	$sql="select * from wbpl_product where nama_brand='$product_brand' 
	limit $posisi,$batas";
	/*$sql="select * from wbpl_product, wbpl_brand, wbpl_instype
          where wbpl_product.kd_brand = wbpl_brand.kd_brand AND
				wbpl_product.kd_instype = wbpl_instype.kd_instype
		limit $posisi,$batas";*/
}else if(isset($_GET['p'])){
	$product_ins_type=$_GET['p'];
	$sql="select * from wbpl_product where nama_instype='$product_ins_type' 
	limit $posisi,$batas ";
}else{
	$sql="select * from wbpl_product  limit $posisi,$batas";
}



$hasil=mysql_query($sql) or die(mysql_error());

while($get_data=mysql_fetch_array($hasil)){
	

?>

<div class="image_wrapper image_fl"><img class="img-polaroid" src="
<?php
$imagee = $get_data['image'];
	if ($imagee == 0 ){
		echo 'images/Image Not Available.jpg';
	}else{
?>
cover/<?php echo $get_data['image'];} ?>" alt="Image Not Avaible" width="150px" heigth="150px">
</div>
<p>
	<em>Product ID: <?php echo $get_data['kd_product']?></em><br>
	<em>Brand: <?php echo $get_data['nama_brand']?></em><br>
	<em>Instrument Type: <?php echo $get_data['nama_instype']?></em><br>
	<em>Price: Rp. <?php echo $get_data['price']?></em><br>
	<em>Stock: <?php
				$product_stock = $get_data['stock'];
				if ($product_stock == 0 ){
					echo 'Stock Not Avaible';
				}else{
					echo $get_data['stock'];
				}
				?>
	</em>
</p>
<p style="text-align: justify;">
	<?php echo $get_data['deskripsi'];?>
</p>

	<a href="index.php?page=cart&action=add&id=<?php echo $get_data['kd_product']?>" class="btn btn-inverse floatRight">Add to cart</a>


<div class="clearfix"></div>

<br><br>
<?php
}

//=============CUT HERE====================================
if(isset($_GET['id'])){
	$product_brand=$_GET['id'];
	$tampil2=mysql_query("select * from wbpl_product where nama_brand='$product_brand'");
	
	$jmldata=mysql_num_rows($tampil2);
	$jumlah_halaman=ceil($jmldata/$batas);

	echo "<br> <br> Halaman :";
	for($i=1;$i<=$jumlah_halaman;$i++)

	if ($i!=$halaman){
		echo "<a href=index.php?page=detail&id=". $product_brand ."&halaman=$i> $i</a> | ";
	}else{
		echo "<b> $i</b> | ";
	}
	
}else if(isset($_GET['p'])){
	$product_ins_type=$_GET['p'];
	$tampil2=mysql_query("select * from wbpl_product where nama_instype='$product_ins_type'");
	
	$jmldata=mysql_num_rows($tampil2);
	$jumlah_halaman=ceil($jmldata/$batas);

	echo "<br> <br> Halaman :";
	for($i=1;$i<=$jumlah_halaman;$i++)

	if ($i!=$halaman){
		echo "<a href=index.php?page=detail&p=". $product_ins_type ."&halaman=$i> $i</a> | ";
	}else{
		echo "<b> $i</b> | ";
	}
}

mysql_close();
?>

<br>
Jumlah data: <?php echo $jmldata;
?>

