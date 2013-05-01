<?php
session_start();
if(!isset($_SESSION['username'])){
		header("location:../index.php");
	}

require_once 'konfigurasi.php';
require_once('../inc/common_function.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>

<head>
	<title>Administrasi website </title>
	
	<style type="text/css" media="all">
		@import "../css/master.css";
		@import "../css/master_admin.css";
	</style>

	<script type="text/javascript">
		function askUser() {
			return window.confirm("Yakin ingin menghapus record ini?");
		}
	</script>

</head>

<body>

<div class="row-fluid content">

	<div id="header" class="pull-left width100">
		
		<table>
			<tr>
				<td><a href="index.php?page=product">Product</a></td>
				<td><a href="index.php?page=wbpl-brand&action=view">Brand & Ins. Type</a></td>
				<td><a href="index.php?page=transaction">Transaction</a></td>
				<td><a href="index.php?page=detail">Detail</a></td>
				<td><a href="index.php?page=wbpl-customer">Customer</a></td>
				<td><a href="index.php?page=wbpl-pesan">Pesan</a></td>
				<td><a href="index.php?page=testimony">Testimony</a></td>
				<td><a href="index.php?page=wbpl-biaya&action=view">Biaya per kota</a></td>
				<td><a href="index.php?page=member">Member</a></td>
			</tr>
		</table>
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



	<div>
		<p>copyright &copy; 2013, | <a href="../index.php">Home</a> | <a href="logout.php">Logout</a></p>
	</div>

</div>


</body>
</html>
