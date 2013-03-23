<!DOCTYPE html>
<html>
<head>
	<title>Administrator Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="../css/style.css" rel="stylesheet" media="screen">
	
	<!-- Bootstrap -->
	<link href="../css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="../css/bootstrap-responsive.css" rel="stylesheet" media="screen">
</head>

<body>

<!-- Navbar
    ================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="./index.html">Music Light</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="">
                <a href="./index.php">Home</a>
              </li>
              <li class="">
                <a href="./registration.php">Registration</a>
              </li>
              <li class="active">
                <a href="">Product</a>
              </li>
              <li class="">
                <a href="./insertproduct.php">Insert Product</a>
              </li>
              <li class="">
                <a href="./updateproduct.php">Update Product</a>
              </li>
              <li class="">
                <a href="./profile.php">Profile</a>
              </li>
              <li class="">
                <a href="./member.php">Member</a>
              </li>
			  <li class="">
                <a href="./cart.php">Cart</a>
              </li>
			  <li class="">
                <a href="./transaction.php">Transaction</a>
              </li>
			  <li class="">
                <a href="./detail.php">Detail</a>
              </li>
			  <li class="">
                <a href="./testimony.php">Testimony</a>
              </li>
			  <li class="">
                <a href="./logout.php">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

<div class="container">
<br/>
<br/>
	<?php
	require_once('koneksi.php');?>
	
	<table  width="600px" border=0>
		<tr style="background-color:#F79307">
			<td>No.</td>
			<td>Brand</td>
			<td>Instrument Type</td>
			<td>Price</td>
			<td>Stock</td>
			<td>Operation</td>
		</tr>

	<?php
	/*
	* kode untuk menghapus data
	*/
	//===================paging
	$batas=4;
	$halaman=$_GET['halaman'];
	$posisi=null;
	if(empty($halaman)){
	$posisi=0;
	$halaman=1;
	}else{
	$posisi=($halaman-1)* $batas;
	}
	//===========================
	if(isset($_GET['del'])){
	$product_brand=$_GET['id'];
	$hapus ="delete from product where product_brand='$product_brand'";
	mysql_query($hapus);
	}
	
	$sql="";
	if(isset($_POST['btnCari'])){
	$cari=$_POST['cari'];
	
	//ambil data dari table admin
	$sql="SELECT * FROM  product where 	product_brand like '%$cari%'";
	}else{
	$sql="SELECT * FROM  product limit $posisi,$batas";
	}

	$result=mysql_query($sql) or die(mysql_error());
	$no=1;
	
	//proses menampilkan data
	while($rows=mysql_fetch_array($result)){
	?>
	
	<tr>
		<td><?echo $no+$posisi;?></td>
		<td><?echo $rows['product_brand'];?></td>
		<td><?echo $rows['product_instrument_type'];?></td>
		<td><?echo $rows['product_price'];?></td>
		<td><?echo $rows['product_stock'];?></td>

		<td>
			<a href="index.php?page=biaya_kirim_form_edit&id=<? echo $rows['product_brand']?>">
			<img src="image/b_edit.png"></a>
			<a href="product.php?&del=true&id=<? echo $rows['product_brand']?>"  onclick="return askUser()";>
			<img src="image/b_drop.png"></a>
		</td>
	</tr>

<?
$no++;
}

//tutup koneksi
?>
<tr><td align=right colspan='2'>
<?php
if(isset($_GET['status'])) {
	if($_GET['status'] == 0) {
		echo " Operasi data berhasil";
	} else {
		echo "operasi gagal";
	}
}?>
</td>
<td align=right><a href="index.php?page=biaya_kirim_form_add">
<img src="image/add.jpg"> Add</a></td></tr>
<tr></tr>
	</table>
<?
	//=============CUT HERE====================================
	$tampil2 = mysql_query("select * from product");
	$jmldata = mysql_num_rows($tampil2);
	$jumlah_halaman = ceil($jmldata / $batas);

	echo "Halaman :";
	for($i = 1; $i <= $jumlah_halaman; $i++)
		if($i != $halaman) {
			echo "<a href=product.php?page=biaya_view&halaman=$i>$i</a>|";
		} else {
			echo "<b>$i</b>|";
		}
	mysql_close();?>
<br>
Jumlah data :<?=$jmldata;?>
	
</div>


<script type="text/javascript">
	function askUser() {
		return window.confirm("Yakin ingin menghapus record ini?");
	}
  </script>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap-transition.js"></script>
    <script src="../js/bootstrap-alert.js"></script>
    <script src="../js/bootstrap-modal.js"></script>
    <script src="../js/bootstrap-dropdown.js"></script>
    <script src="../js/bootstrap-scrollspy.js"></script>
    <script src="../js/bootstrap-tab.js"></script>
    <script src="../js/bootstrap-tooltip.js"></script>
    <script src="../js/bootstrap-popover.js"></script>
    <script src="../js/bootstrap-button.js"></script>
    <script src="../js/bootstrap-collapse.js"></script>
    <script src="../js/bootstrap-carousel.js"></script>
    <script src="../js/bootstrap-typeahead.js"></script>
    <script src="../js/bootstrap-affix.js"></script>

    <script src="../js/application.js"></script>

</body>
</html>