<?php	// Include MySQL class
	session_start();
	
	require_once('admin/inc/config.php');
	require_once('inc/functions.inc.php');
	//require_once ('inc/mysql.class.php');
	//require_once ('inc/global.inc.php');
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Music Light</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<style type="text/css" media="all">
		@import "css/master.css";
	</style>
	
	
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

  </head>

  <body>

    <div class="container">

      <div class="masthead">
		<hgroup>
			<h1 class="site-title">MusicLight</h1>
			<h2 class="site-description">Musical Instrument Shop</h2>
		</hgroup>
		
	<div class="clearfix"></div>
	
        <div class="navbar">
          <div class="navbar-inner">
            <div class="container">
			<table>
				<tr>
					<td><a href="./">Home</a></td>
					<td><a href="index.php?page=product&view=product">Product</a></td>
					<?php
					if(isset($_SESSION['username'])){
					echo
					'<td>
						<a href="index.php?page=cart&view=cart">Cart</a>
					</td>';
					}
					?>
					<td><a href="index.php?page=testimony">Testimony</a></td>
				</tr>
			</table>
            </div>
          </div>
        </div><!-- /.navbar -->
      </div>

      <!-- Example row of columns -->
      <div class="row-fluid content">
        <div class="span9">
		<?php
		/* kode untuk meload halaman yang berbeda*/
		if(isset($_GET['page'])) {
			$page = $_GET['page'] . ".php";
			include ($page);
		} else {
		?>
		 
		 		<div class="">
		<?php
		if(isset($_SESSION['username'])){
		
			$hour = (date("G")+5);// harus ditambah 5 agar jamnya sama.
			if ($hour >= 0 && $hour <= 11) {
				echo "Good morning, ";
			} else if ($hour >= 12 && $hour <= 17) {
				echo "Good afternoon, ";
			} else {
				echo "Good evening, ";
			}
	
			echo ucfirst($_SESSION['username']);
		}
		?>
		<br>
		<?php
		if(!isset($_SESSION['username'])){?>
		<form method="post" action="admin/inc/wbpl-login_check.php">
			<input name="username" type="text" class="input-small" placeholder="Username">
			<input name="password" type="password" class="input-small" placeholder="Password">
			
			<br>

			<?php 
			if (isset($_GET['err'])) {
				if ($_GET['err'] == 1) { ?>
					<span class="label label-important">The username must be filled!</span>
			<?php }else if ($_GET['err'] == 2) { ?>
					<span class="label label-important">The password must be filled!</span>
			<?php }else if ($_GET['err'] == 3) { ?>
					<span class="label label-important">The username or password you entered is incorrect.</span>
			<?php }
			}else if (isset($_GET['loggedout'])) {
				if ($_GET['loggedout'] == true) { ?>
					<span class="label label-success">You are now logged out.</span>
			<?php }
			}
			?>
			
			<label class="checkbox">
				<input type="checkbox"> Remember me
			</label>
			
			<input type="submit" class="btn" name="Home_Submit_Login" value="Sign in"/>
			or
			<input class="btn btn-primary" type="submit" name="Home_Submit_Regiter" value="Register"/>
			
		</form>
		<?php
		}else{ ?>
			<a href="./admin">Go to Admin page</a> </br>
			<a href="admin/logout.php?logout=1" name="Home_Submit_Logout">Logout</a>
		<?php
		}	?>
		</div>
		 
			<h3>Welcome to Music Light</h3>
			<P class="alignJustify">Music Light is a famous musical instrument shop in the town. It sells a wide range of musical instruments from the common to the rare. As time passed, the owner of this store realized how important the internet today and decided to develop a website that can ease customer to make transactions in Music Light. This website will be used by the customer/member to order musical instruments via online and promote Music Light’s product to non-member visitor.</p>
		<?php
		}?>
        </div>
		
      
      </div>

      <div class="footer">
        <p>Copyright &copy 2013 <a href="#">Budi Hermawan</a></p>
      </div>

    </div> <!-- /container -->

  </body>
</html>
