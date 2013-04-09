<?	// Include MySQL class
	session_start();
	
	include('admin/inc/config.php');
		require_once ('inc/mysql.class.php');
		// Include database connection
		require_once ('inc/global.inc.php');
		// Include functions
		require_once ('inc/functions.inc.php');
		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Music Light</title>

<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.ennui.contentslider.css" rel="stylesheet" type="text/css" media="screen,projection" />

</head>
<body>

<div id="templatemo_wrapper_outer">
	<div id="templatemo_wrapper">
    
    	<div id="templatemo_header">
			<div id="site_title">
				<h1>
					<a href="./">
						Music Light
						<span>famous musical instrument shop</span>
					</a>
				</h1>
			</div> <!-- end of site_title -->

				<ul id="social_box">
					<li><a href="#"><img src="images/facebook.png" alt="facebook" /></a></li>
					<li><a href="#"><img src="images/twitter.png" alt="twitter" /></a></li>
					         
				</ul>
			
			<div class="cleaner"></div>
		</div>
        
        <div id="templatemo_menu">
           <ul  >
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
        </div> <!-- end of templatemo_menu -->
        
    <div id="templatemo_slider_wrapper">
        
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
									<img src="cover/<?php echo $get_data['product_image']?>" width='150px' heigth='150px'>
								</div>
									
								<div class="slider_content">
                                    <h2><?php echo $get_data['product_brand']?></h2>
									<p>Price: Rp. <?php echo $get_data['product_price'];?></p>
									<p>aa<?php echo $get_data['product_deskripsi'];?></p>
                                   
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
                    width : '940px',
                    height : '240px',
                    speed : 400,
                    easing : 'easeOutSine'
                    });
                    });
                </script>
				
            <script src="js/jquery.chili-2.2.js" type="text/javascript"></script>
            <script src="js/chili/recipes.js" type="text/javascript"></script>
            
			<div class="cleaner"></div>
            	
        </div>
        
    </div>
        
    <div id="templatemo_content_wrapper">
		<div id="content">
            	
            <h2>Mengapa membeli product di sini adalah pilihan tepat</h2>
                
            <div class="reasons">
                <h3>Murah</h3>
                <img src="images/reason1.png" alt="Reason1" />
                <p>Product yang anda dapat mempunyai harga dibawah rata rata toko </p>
            </div>
                
            <div class="reasons">
                <h3>Cepat</h3>
                <img src="images/reason2.png" alt="Reason2" />
                <p>Pemesanan cepat dan mudah </p>
            </div>
                
            <div class="reasons">
				<h3>100% Satisfaction</h3>
                <img src="images/reason3.png" alt="Reason3" />
                <p> Anda tidak puas, uang kembali </p>
            </div>
                
            <div class="hr_divider"></div>
                
            <div class="col_w560">
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
                
        <div class="col_w280">
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
                
            <div class="cleaner"></div>
                
        </div>
			
        <div class="cleaner"></div>        
        
	</div>
		
	<div id="templatemo_content_wrapper_bottm"></div>
   
	<div id="templatemo_footer">
        Copyright &copy 2013 <a href="#">Budi Hermawan</a>  	 
    </div>
        
	</div> <!-- end of wrapper -->
</div> <!-- end of wrapper_outer -->

</body>
</html>