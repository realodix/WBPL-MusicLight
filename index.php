<?	// Include MySQL class
	session_start();
	
	if(isset($_SESSION['username'])){
		header("location:home.php");
	}
	
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
				
				<li>
					<a href="index.php?page=registration">Registration</a>
				</li>
							
			</ul>	
        </div> <!-- end of templatemo_menu -->
        
    <div id="templatemo_slider_wrapper">
        
		<div id="templatemo_slider">
            
				<div id="one" class="contentslider">
                    <div class="cs_wrapper">
                        <div class="cs_slider">
                        <?php
                        $sql="select * from buku order by rand() limit 3";
                        $hasil=mysql_query($sql) or die(mysql_error());

						while($get_data=mysql_fetch_array($hasil)){
	


                        ?>
                      
                        <div class="cs_article">
                            <div class="slider_content_wrapper">
									
								<div class="slider_image">
									<img src="cover/<?=$get_data['cover']?>" width='150px' heigth='150px'>
								</div>
									
								<div class="slider_content">
                                    <h2><?=$get_data['judul']?></h2>
										<?=$get_data['deskripsi'];?>
                                   
									<div class="btn_more"><a href="index.php?page=cart&action=add&id=<?=$get_data['kd_buku']?>">Add to cart</a></div>
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
				<?php echo date("d-m-Y"); ?>
				
				<h1> Login page</h1>
				<form id="form1" name="form1" method="post" action="admin/login_check.php">
					<table  align="center">
						<tr>
							<td>Username</td>
							<td><input name="username" type="text" id="username"  />
								<div id="form1_username_errorloc" style="color:red"></div>
							</td>
						</tr>
			
						<tr>
							<td>Password</td>
							<td><input name="password" type="text" id="password"  />  <div id="form1_password_errorloc" style="color:red">
							</td>
						</tr>

						<tr>
							<td colspan="3" align="right">
								<input type="submit" name="Home_Submit_Login" value="Submit" /> 
								<input type="reset" name="" value="Reset" />
							</td>
						</tr>
			
						<tr>
							<td colspan='2'>
						<!--     <div id="form1_errorloc" style="color:green">
								<?php
								//if (isset($_GET['status'] == 0)) {
								//echo "The username or password you entered is incorrect";
								//}
								if (isset($_GET['status'])) {
									if ($_GET['status'] == 1) {
									echo "The username or password you entered is incorrect";
									}
								}
								?>
								</div>-->
			
							</td>
						</tr>
					</table>
				</form>
			
			
                <h3>BonekaBrand</h3>
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