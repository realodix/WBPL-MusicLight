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
      .container > hr {
        margin: 60px 0;
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
        <h3 class="muted">Music Light | musical instrument shop</h3>
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
				
				<li>
					<a href="index.php?page=cart">Cart</a>
				</li>
				
				<li>
					<a href="index.php?page=cara_pesan">Cara pesan</a>
				</li>

				<li>
					<a href="index.php?page=bayar_form_add">Pembayaran</a>
				</li>
				
				<?php
				if(!isset($_SESSION['username'])){
				echo
				'<li>
					<a href="index.php?page=registration">Registration</a>
				</li>';
				}
				?>
              </ul>
            </div>
          </div>
        </div><!-- /.navbar -->
      </div>

      <!-- Jumbotron 
    <h2>Mengapa membeli product di sini adalah pilihan tepat</h2>-->
	
	<div class="row-fluid">
	<div class="reasons span4">
		<h3>Murah</h3>
		<img src="images/reason1.png" alt="Reason1" />
		<p>Product yang anda dapat mempunyai harga dibawah rata rata toko </p>
	</div>
                
	<div class="reasons span4">
		<h3>Cepat</h3>
		<img src="images/reason2.png" alt="Reason2" />
		<p>Pemesanan cepat dan mudah </p>
	</div>
                
	<div class="reasons span4">
		<h3>100% Satisfaction</h3>
		<img src="images/reason3.png" alt="Reason3" />
		<p> Anda tidak puas, uang kembali </p>
	</div>
    </div>
	
	
	<hr>

      <!-- Example row of columns -->
      <div class="row-fluid">
        <div class="span9">
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
									<img src="cover/<?php echo $get_data['image']?>" width='150px' heigth='150px'>
								</div>
									
								<div class="slider_content">
                                    <h2><?php echo $get_data['nama_brand']?></h2>
									<p>Price: Rp. <?php echo $get_data['price'];?></p>
									<p>aa<?php echo $get_data['deskripsi'];?></p>
                                   
									<div class="btn_more"><a href="index.php?page=cart&action=add&id=<?php echo $get_data['kd_product']?>">Add to cart</a></div>
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
                    width : '770px',
                    height : '240px',
                    speed : 400,
                    easing : 'easeOutSine'
                    });
                    });
                </script>
            
			<div class="cleaner"></div>
            	
        </div>
          <?php
				/* kode untuk meload halaman yang berbeda*/
				if(isset($_GET['page'])) {
					$page = $_GET['page'] . ".php";
					include ($page);
				} else {
					echo '<h3>Welcome to Music Light</h3>
					<P>Music Light is a famous musical instrument shop in the town. It sells a wide range of musical instruments from the common to the rare. As time passed, the owner of this store realized how important the internet today and decided to develop a website that can ease customer to make transactions in Music Light. This website will be used by the customer/member to order musical instruments via online and promote Music Light’s product to non-member visitor.</p>';
				}?>
        </div>
		
        <div class="span3">
          <?php
				if(isset($_SESSION['username'])){
				echo sprintf('Selamat Datang %s <br>', $_SESSION['username']);
				}
				echo date("d-m-Y"); ?>
				
				<?php
				if(!isset($_SESSION['username'])){
					include('index _login.php');
				}else{?>
					
					<a href="admin/logout.php?logout=1" name="Home_Submit_Logout">Logout</a> </br>
					<a href="./admin">Go to Admin page</a> </br></br>
				
				<?php }	?>
			
                <h3>Brand</h3>
            	<?php
            	include('kategori.php');
				?>
				<h2>Alamat kami</h2>
				<p>Jakarta</p>
       </div>
       
      </div>

      <hr>

      <div class="footer">
        <p>Copyright &copy 2013 <a href="#">Budi Hermawan</a></p>
      </div>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>
