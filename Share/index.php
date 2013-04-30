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
	
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 60px;
      }

      /* Custom container */
      .container {
        margin: 0 auto;
        max-width: 1000px;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 80px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 100px;
        line-height: 1;
      }
      .jumbotron .lead {
        font-size: 24px;
        line-height: 1.25;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }


      /* Customize the navbar links to be fill the entire space of the .navbar */
      .navbar .navbar-inner {
        padding: 0;
      }
      .navbar .nav {
        margin: 0;
        display: table;
        width: 100%;
      }
      .navbar .nav li {
        display: table-cell;
        width: 1%;
        float: none;
      }
      .navbar .nav li a {
        font-weight: bold;
        text-align: center;
        border-left: 1px solid rgba(255,255,255,.75);
        border-right: 1px solid rgba(0,0,0,.1);
      }
      .navbar .nav li:first-child a {
        border-left: 0;
        border-radius: 3px 0 0 3px;
      }
      .navbar .nav li:last-child a {
        border-right: 0;
        border-radius: 0 3px 3px 0;
      }
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

		<div class="pull-right">
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
		
	<div class="clearfix"></div>
	
        <div class="navbar">
          <div class="navbar-inner">
            <div class="container">
              <ul class="nav">
                <li>
					<a href="./">Home</a>
				</li>
				
				<li>
					<a href="index.php?page=product&view=product">Product</a>
				</li>
				
				<?php
				if(isset($_SESSION['username'])){
				echo
				'<li>
					<a href="index.php?page=cart&view=cart">Cart</a>
				</li>';
				}
				?>
				
				<li>
					<a href="index.php?page=cara_pesan">Cara pesan</a>
				</li>
				
				<li>
					<a href="index.php?page=testimony">Testimony</a>
				</li>

              </ul>
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
		 
			<h3>Welcome to Music Light</h3>
			<P class="alignJustify">Music Light is a famous musical instrument shop in the town. It sells a wide range of musical instruments from the common to the rare. As time passed, the owner of this store realized how important the internet today and decided to develop a website that can ease customer to make transactions in Music Light. This website will be used by the customer/member to order musical instruments via online and promote Music Light’s product to non-member visitor.</p>
		<?php
		}?>
        </div>
		
        <div class="span3">
			<h3>Brand</h3>
			<?php
			include('kategori.php');
			?>
			<h2>Alamat kami</h2>
			<p>Jakarta</p>
       </div>
       
      </div>

      <div class="footer">
        <p>Copyright &copy 2013 <a href="#">Budi Hermawan</a></p>
      </div>

    </div> <!-- /container -->

  </body>
</html>
