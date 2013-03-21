<!DOCTYPE html>
<html>
<head>
	<title>Music Light | Profile</title>
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
          <a class="brand" href="./index.html">Music Light</a>
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
              <li class="active">
                <a href="">Profile</a>
              </li>
              <li class="">
                <a href="./member.php">Member</a>
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
	<h3>Registration Page</h3>
	
	<form class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="inputName">Name</label>
			<div class="controls">
				<input type="text" id="inputName" placeholder="Name">
			</div>
		</div>
	
		<div class="control-group">
			<label class="control-label" for="inputEmail">Email</label>
			<div class="controls">
				<input type="text" id="inputEmail" placeholder="Email">
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="inputAddress">Address</label>
			<div class="controls">
				<textarea rows="3"></textarea>
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="inputPhone ">Phone </label>
			<div class="controls">
				<input type="text" id="inputPhone" placeholder="Phone ">
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="inputOPassword">Old Password</label>
			<div class="controls">
				<input type="password" id="inputOPassword" placeholder="Old Password">
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="inputNPassword">New Password</label>
			<div class="controls">
				<input type="password" id="inputNPassword" placeholder="New Password">
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="inputCPassword">Confirm Password</label>
			<div class="controls">
				<input type="password" id="inputCPassword" placeholder="Confirm Password">
			</div>
		</div>
	
		<div class="control-group">
			<div class="controls">
				<input type="button" value="Save" class="btn btn-primary" onclick="Cek()" />
				<input type="reset" value="Reset" class="btn" onclick="Reset()" />
			</div>
		</div>
    </form>
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