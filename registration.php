<!DOCTYPE html>
<html>
<head>
	<title>Music Light | Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="css/style.css" rel="stylesheet" media="screen">
	
	<!-- Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
</head>

<body>
<div class="container register">
	
	<h3>Registration Page</h3>
	
	<form class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="inputName">Name</label>
			<div class="controls">
				<input type="text" id="inputName" placeholder="Name">
			</div>
		</div>
	
		<div class="control-group">
			<label class="control-label" for="inputUsername">Username</label>
			<div class="controls">
				<input type="text" id="inputUsername" placeholder="Username">
			</div>
		</div>
	
		<div class="control-group">
			<label class="control-label" for="inputEmail">Email</label>
			<div class="controls">
				<input type="text" id="inputEmail" placeholder="Email">
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="inputPassword">Password</label>
			<div class="controls">
				<input type="password" id="inputPassword" placeholder="Password">
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="inputCPassword">Confirm Password</label>
			<div class="controls">
				<input type="password" id="inputCPassword" placeholder="Confirm Password">
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="inputGender">Gender</label>
			<div class="controls">
				<label class="radio">
					<input type="radio" name="gender" id="male" value="option1" checked>Male
				</label>
				<label class="radio">
					<input type="radio" name="gender" id="female" value="option2">Female
				</label>
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
			<div class="controls">
				<input type="button" value="Submit" class="btn" onclick="Cek()" />
				<input type="reset" value="Reset" class="btn" onclick="Reset()" />
			</div>
		</div>
    </form>
	
</div>
</body>
</html>