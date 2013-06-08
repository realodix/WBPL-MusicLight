<?php
session_start();
if(!isset($_SESSION['username'])){
		header("location:login.php");
	}

require_once '../wbpl-config.php';
require_once('../wbpl-function.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>

<head>
	<title>Administrasi website </title>
	
	<style type="text/css" media="all">
		@import "../css/bootstrap.css";
		@import "../css/master_admin.css";
	</style>
	

	<script type="text/javascript">
		function askUser() {
			return window.confirm("Yakin ingin menghapus record ini?");
		}
	</script>
	<script src="ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type='text/javascript' src="../js/jquery.autocomplete.js"></script>

</head>

<body>

<div class="width100">

	<div id="header" class="pull-left width100">
		<div class="pull-left width100 rightBorder">
		  <div id="title">
			<a href="./"><h1>Admin page</h1>
			<p>Halaman Administrasi</p>
			</a>
		  </div>
		</div>
	</div>


	<div class="menu-sidebar pull-left">
	  
		<h4>Catalog</h4>
		<ul >
			<li><a href="index.php?page=product">Product</a></li>
			<li><a href="index.php?page=wbpl-brand&action=view">Brand & Ins. Type</a></li>
		</ul>
		
		<h4>Pesan</h4>
		<ul>
			<li><a href="index.php?page=transaction">Transaction</a></li>
			<li><a href="index.php?page=detail">Detail</a></li>
			<li><a href="index.php?page=wbpl-customer">Customer</a></li>
			<li><a href="index.php?page=wbpl-pesan">Pesan</a></li>
			<li><a href="index.php?page=testimony">Testimony</a></li>
		</ul>

		<h4>Biaya kirim</h4>
		<ul>
			<li><a href="index.php?page=wbpl-biaya&action=view">Biaya per kota</a></li>
		</ul>

		<h4>Setting</h4>
		<ul>
			<li><a href="index.php?page=member">Member</a></li>
		</ul>

	</div>
    
	
	<div id="content" class="pull-right width75">
		<div class="pull-right width75">
			<?php
			/* kode untuk meload halaman yang berbeda*/
			if (isset($_GET['page'])) {
				$page = $_GET['page'] . ".php";
				include ($page);

			} else {
				include ('product.php');
			}
			?>
		</div>
	</div>



	<div id="footer" class="pull-right  width100">
		<p>copyright &copy; 2013, | <a href="../index.php">Home</a> | <a href="logout.php">Logout</a></p>
	</div>

</div>
<!-- end full site width container -->



</body>
</html>