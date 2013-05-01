<?php
	session_start();
	
	require_once('konfigurasi.php');
	require_once('wbpl_06pfm-function.php');
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
	
		<table>
			<tr>
				<td><a href="./">Home</a></td>
				<td><a href="index.php?page=product">Product</a></td>
				<?php
				if(isset($_SESSION['username'])){
				echo
				'<td>
					<a href="index.php?page=cart&view=cart">Cart</a>
				</td>';
				}
				?>
				<td><a href="index.php?page=testimony">Testimony</a></td>
				<?php
				if(isset($_SESSION['username'])){
				echo
				'<td> | </td>
				<td><a href="index.php?page=insertproduct">Insert Product</a></td>
				<td><a href="index.php?page=updateproduct_view">Update Product</a></td>
				<td><a href="index.php?page=transaction">Transaction</a></td>
				<td><a href="index.php?page=detail">Detail</a></td>
				<td><a href="index.php?page=member">Member</a></td>';
				}
				?>
			</tr>
		</table>
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
		 
		<div>
		<?php
		
		if(!isset($_SESSION['username'])){?>
		<form method="post" action="do_login.php">
			User: admin & Pass: 06pfm <br>
			<input name="username" type="text">
			<input name="password" type="password">
			
			<br>

			<input type="submit" class="btn" name="Home_Submit_Login" value="Sign in"/>
			or
			<a href="index.php?page=registration" style="text-decoration: none;"><input type="button" value="Register"/></a>
			
		</form>
		<?php
		}else{ ?>
			<a href="./admin">Go to Admin page</a> </br>
			<a href="logout.php">Logout</a>
		<?php
		}	?>
		</div>
		
		<br>
		 
			This page can be accessed by <b>Guest</b>,<b> Member</b>, and<b> Admin</b>.<b> </b>This page displays general information about <b>Music Light, </b>username of logged in user, and today’s date with format “<b>dd-mm-yyyy</b>”. For guest/non-member visitor, there will be a login form so users can login to the website. Shows the error message when the login process is failed. The table below shows the list of validation for the login form:
			
			<br><br>
			
			<table width="656" border="1" cellspacing="0" cellpadding="0">
			<tbody>
			<tr>
			<td nowrap="nowrap" width="186">
			<p align="center"><b>Field</b></p>
			</td>
			<td nowrap="nowrap" width="470">
			<p align="center"><b>Validation</b></p>
			</td>
			</tr>
			<tr>
			<td valign="bottom" nowrap="nowrap" width="186"><b>Username</b></td>
			<td valign="bottom" nowrap="nowrap" width="470">Must be filled.</td>
			</tr>
			<tr>
			<td valign="bottom" nowrap="nowrap" width="186"><b>Password</b></td>
			<td valign="bottom" nowrap="nowrap" width="470">Must be filled.</td>
			</tr>
			<tr>
			<td valign="bottom" nowrap="nowrap" width="186"><b>Username </b>&amp;<b> Password</b></td>
			<td valign="bottom" nowrap="nowrap" width="470">Match with username and password in the database.</td>
			</tr>
			</tbody>
			</table>
			
			<br>
			
			Use <b>MD5 </b>technique to encrypt the password. Also give <b>remember me</b> option to set cookie into web browser. If remember me is checked, the cookie will be set into web browser but if it is not checked, the cookie will not be set. Also validate <b>Username</b> textbox will be automatically filled every time users access this website again within 60 minutes since the cookie is set.
		<?php
		}?>
        </div>
		
      
      </div>

      <div class="footer">
        <p>Copyright &copy 2013, <?php echo $kelas; ?></p>
      </div>

    </div> <!-- /container -->

  </body>
</html>
