<!DOCTYPE html>
<html>
<head>
	<title>Music Light</title>
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
                <a href="">Home</a>
              </li>
              <li class="">
                <a href="./registration.php">Registration</a>
              </li>
              <li class="">
                <a href="./product.php">Product</a>
              </li>
              <li class="">
                <a href="./insertproduct.php">Insert Product Page</a>
              </li>
              <li class="">
                <a href="./updateproduct.php">Update Product</a>
              </li>
              <li class="">
                <a href="./profile.php">Profile</a>
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

	<h3>Welcome to Music Light</h3>

	<form class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="inputUsername">Username</label>
			<div class="controls">
				<input type="text" id="inputUsername" placeholder="Username">
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="inputPassword">Password</label>
			<div class="controls">
				<input type="password" id="inputPassword" placeholder="Password">
			</div>
		</div>
	
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn">Sign in</button>
			</div>
		</div>
    </form>
	
</div>
</body>
</html>