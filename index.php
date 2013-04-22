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
		@import "css/bootstrap.css";
		@import "css/bootstrap-responsive.css";
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
			
			<div class="mustbe">
			<?php 
			
			if (isset($_GET['err'])) {
				if ($_GET['err'] == 1) {
					echo "The username must be filled";
				}else if ($_GET['err'] == 2) {
					echo "The password must be filled";
				}else if ($_GET['err'] == 3) {
					echo "The username or password you entered is incorrect";
				}
			}else if (isset($_GET['loggedout'])) {
				if ($_GET['loggedout'] == true) {
					echo "You are now logged out.";
				}
			}
			 
			?>
			</div>
			
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
					<a href="index.php?page=testimony">Testimony</a>
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
		<?php
		/* kode untuk meload halaman yang berbeda*/
		if(isset($_GET['page'])) {
			$page = $_GET['page'] . ".php";
			include ($page);
		} else {
		?>
		
			<div id="templatemo_slider">
            
				<div id="one" class="contentslider">
                    <div class="cs_wrapper">
                        <div class="cs_slider">
                        <?php
                        $sql="select * from wbpl_product order by rand() limit 3";
                        $hasil=mysql_query($sql) or die(mysql_error());

						while($get_data=mysql_fetch_array($hasil)){
						?>
                      
                        <div class="cs_article">
                            <div class="slider_content_wrapper">
									
								<div class="slider_image">
									<img src="<?php
									$imagee = $get_data['image'];
										if ($imagee == 0 ){
											echo 'images/Image Not Available.jpg';
										}else{
									?>
									cover/<?php echo $get_data['image'];} ?>" alt="Image Not Avaible" width="150px" heigth="150px">
								</div>
									
								<div class="slider_content">
                                    <h2><?php echo $get_data['nama_brand']?></h2>
									<p>Product ID: <?php echo $get_data['kd_product'];?></br>
									Price: Rp. <?php echo $get_data['price'];?></p>
									<p>aa<?php echo $get_data['deskripsi'];?></p>
                                   
									<a href="index.php?page=cart&action=add&id=<?php echo $get_data['kd_product']?>" class="btn btn-inverse floatRight">Add to cart</a>
								</div>
                                
							</div>
                        </div><!-- End cs_article -->
                            
						<?php
						}//end while
						?>

                        </div><!-- End cs_slider -->
                    </div><!-- End cs_wrapper -->
                </div><!-- End contentslider -->
                
                <!-- Site JavaScript -->
                <script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
                <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
                <script type="text/javascript" src="js/jquery.ennui.contentslider.js"></script>
                <script type="text/javascript">
                    $(function() {
                    $('#one').ContentSlider({
                    width : '760px',
                    height : '240px',
                    speed : 400,
                    easing : 'easeOutSine'
                    });
                    });
                </script>
            
			<div class="cleaner"></div>
            	
			</div>
 
			<h3>Welcome to Music Light</h3>
			<P style="text-align: justify;">Music Light is a famous musical instrument shop in the town. It sells a wide range of musical instruments from the common to the rare. As time passed, the owner of this store realized how important the internet today and decided to develop a website that can ease customer to make transactions in Music Light. This website will be used by the customer/member to order musical instruments via online and promote Music Light’s product to non-member visitor.</p>
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
