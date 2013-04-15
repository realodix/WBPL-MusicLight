<?php	// Include MySQL class
	session_start();

	//include('admin/inc/config.php');
	require_once ('inc/mysql.class.php');
	// Include database connection
	require_once ('inc/global.inc.php');
	// Include functions
	require_once ('inc/functions.inc.php');
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Music Light</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
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
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/master.css" rel="stylesheet">

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

		<div style="float:right;">
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
		<form style="float:right;" method="post" action="admin/inc/wbpl-login_check.php">
			<input name="username" type="text" class="input-small" placeholder="Username">
			<input name="password" type="password" class="input-small" placeholder="Password">
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
		
	<div class="clear"></div>
	
        <div class="navbar">
          <div class="navbar-inner">
            <div class="container">
              <ul class="nav">
                <li>
					<a href="./">Home</a>
				</li>
				
				<li>
					<a href="index.php?page=product">Product</a>
				</li>
				
				<?php
				if(isset($_SESSION['username'])){
				echo
				'<li>
					<a href="index.php?page=cart">Cart</a>
				</li>';
				}
				?>
				
				<li>
					<a href="index.php?page=cara_pesan">Cara pesan</a>
				</li>

				<li>
					<a href="index.php?page=bayar_form_add">Pembayaran</a>
				</li>
				
				<li>
					<a href="testimony.php">Testimony</a>
				</li>

              </ul>
            </div>
          </div>
        </div><!-- /.navbar -->
      </div>

      <!-- Jumbotron 
    <h2>Mengapa membeli product di sini adalah pilihan tepat</h2>-->
	
	<div class="row-fluid">
	<div class="reasons span4">
		<h3>Cheap</h3>
		<img src="images/reason1.png" alt="Reason1" />
		<p>Product that you could have prices below average of other stores.</p>
	</div>
                
	<div class="reasons span4">
		<h3>Fast</h3>
		<img src="images/reason2.png" alt="Reason2" />
		<p>Fast and easy ordering. All you can get just by clicking the product.</p>
	</div>
                
	<div class="reasons span4">
		<h3>100% Satisfaction</h3>
		<img src="images/reason3.png" alt="Reason3" />
		<p>You are not satisfied, money back.</p>
	</div>
    </div>
	

      <!-- Example row of columns -->
	<div class="row-fluid content">
		<div class="span9">
			<h1>Registration</h2>

			<form id="registration" name="registration" method="post" action="registration _add.php">
				<table>
					<tr>
						<td>Name</td>
						<td></td>
						<td></td>
						<td><input type="text" name="name_user" id="name_user" style="width:187px;"></input></td>
					</tr>
					
					<tr>
						<td>Username</td>
						<td></td>
						<td></td>
						<td><input type="text" name="username_user" id="username_user" style="width:187px;"></input></td>
					</tr>
	
					<tr>
						<td>Password</td>
						<td></td>
						<td></td>
						<td><input type="text" name="pass_user" id="pass_user" style="width:187px;"></input></td>
					</tr>
	
					<tr>
						<td>Confirm Password</td>
						<td></td>
						<td></td>
						<td><input type="text" name="cpass_user" id="cpass_user" style="width:187px;"></input></td>
					</tr>
	
					<tr>
						<td>Gender</td>
						<td></td>
						<td></td>
						<td>
							<input type="radio" name="gender_user" id="gender_user_male" value="Male">Male</input>
							<input type="radio" name="gender_user" id="gender_female" value="Female">Female</input>
						</td>
					</tr>
	
					<tr>
						<td>Address</td>
						<td></td>
						<td></td>
						<td><textarea name="address_user" id="address_user"></textarea></td>
					</tr>
	
					<tr>
						<td>Phone</td>
						<td></td>
						<td></td>
						<td><input type="text" name="phone_user" id="phone_user" style="width:187px;"></input></td>
					</tr>
	
					<tr>
						<td>E-Mail</td>
						<td></td>
						<td></td>
						<td><input type="text" name="email_user" id="email_user" style="width:187px;"></input></td>
					</tr>
	
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td><input class="btn btn-primary" type="submit" name="register_user" value="Register" /></td>
					</tr>
	
					<tr>
						<td align=right colspan='4'>
							<?php
							if (isset($_GET['status'])) {
							if ($_GET['status'] == 0) {
								echo "Registrasi berhasil";
								} else {
								echo "Registrasi gagal";
								}
							}
							?>
						</td>
					</tr>
				</table>
			</form>
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
