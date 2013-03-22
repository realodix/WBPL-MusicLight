<!DOCTYPE html>
<html>
<head>
	<title>Music Light | Member</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="css/style.css" rel="stylesheet" media="screen">
	
	<!-- Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
</head>

<body>

<!-- Navbar
    ================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="./index.html">MusicLight</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="">
                <a href="./index.php">Home</a>
              </li>
              <li class="">
                <a href="./registration.php">Registration</a>
              </li>
              <li class="">
                <a href="./product.php">Product</a>
              </li>
              <li class="">
                <a href="./insertproduct.php">Insert Product</a>
              </li>
              <li class="">
                <a href="./updateproduct.php">Update Product</a>
              </li>
              <li class="">
                <a href="./profile.php">Profile</a>
              </li>
              <li class="active">
                <a href="">Member</a>
              </li>
			  <li class="">
                <a href="./cart.php">Cart</a>
              </li>
			  <li class="">
                <a href="./transaction.php">Transaction</a>
              </li>
			  <li class="">
                <a href="./detail.php">Detail</a>
              </li>
			  <li class="">
                <a href="./testimony.php">Testimony</a>
              </li>
			  <li class="">
                <a href="./logout.php">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

<div class="container">
	<h2>Member</h2>
	<br/>
    <table border="1" width="500px">
      <th><td><b>Nama User</b></a></td><td><b>Level</b></td></th>
 
		<!-- example 1 :menampilkan data di tabel-->
		<?php
 
		require_once('koneksi.php');
		$query1="select * from user ";
 
		$result=mysql_query($query1) or die(mysql_error());
		$no=1; //penomoran
		while($rows=mysql_fetch_object($result)){
		?>
		<tr>
        <td><?php echo $no ?></td>
        <td><?php echo $rows -> user_id_user; ?></td>
        <td><?php echo $rows -> user_level; ?></td>
		</tr>
		<?php
		$no++;
		}?>
    </table>
</div>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
    <script src="js/bootstrap-affix.js"></script>

    <script src="js/application.js"></script>

</body>
</html>