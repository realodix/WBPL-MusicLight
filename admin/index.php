<?php
session_start();
if(!isset($_SESSION['username'])){
		header("location:login.php");
	}

require_once 'inc/config.php';
require_once('../inc/common_function.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">



<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Administrasi website </title>


  <link rel="stylesheet" type="text/css" media="screen, tv, projection" href="../css/html.css" />
  <link rel="stylesheet" type="text/css" media="screen, tv, projection" href="../css/layout.css" />

  <script type="text/javascript">
	function askUser() {
		return window.confirm("Yakin ingin menghapus record ini?");
	}
  </script>
  <script type="text/javascript" src="../js/validjs.js"></script>

</head>

<body>

<div class="width100">

	<div id="header" class="floatLeft width100">
		<div class="floatLeft width100 rightBorder">
		  <div id="title">
			<a href="./"><h1>Admin page</h1>
			<p>Halaman Administrasi</p>
			</a>
		  </div>
		</div>
	</div>

	
	<div id="content">

		<!-- Right column, 25% width -->
		<div class="floatLeft width25 rightMargin">
	  
			<h2>Catalog</h2>
			<ul >
				<li><a href="index.php?page=product">Product</a></li>
				<li><a href="index.php?page=wbpl-brand&action=view">Brand & Ins. Type</a></li>
			</ul>
			
			<h2>Pesan</h2>
			<ul>
				<li><a href="index.php?page=detail">Detail</a></li>
				<li><a href="index.php?page=wbpl-customer">Customer</a></li>
				<li><a href="index.php?page=wbpl-pesan">Pesan</a></li>
				<li><a href="index.php?page=testimony">Testimony</a></li>
			</ul>

			<h2>Biaya kirim</h2>
			<ul>
				<li><a href="index.php?page=wbpl-biaya&action=view">Biaya per kota</a></li>
			</ul>

			<h2>Setting</h2>
			<ul>
				<li><a href="index.php?page=member">Member</a></li>
			</ul>

		</div>
		<!-- end right column, 25% width -->
    
		<!-- Left column, 75% width -->
		<div class=" floatLeft width75">
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
		<!-- end left column, 75% width -->

	</div>
  <!-- end #content -->


	<div id="footer" class="floatRight  width100">
		<p>copyright(c) 2012,|<a href="../index.php">home</a>|<a href="logout.php">Logout</a></p>
	</div>

</div>
<!-- end full site width container -->


</body>
</html

<?php

/*
}else{
header("location:form_login.php");
}
*/
 
?>