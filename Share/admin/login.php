<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


	<link href="../css/master.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

  </head>

  <body class="login">

    <div class="container">

      <form class="form-signin" method="post" action="inc/wbpl-login_check.php">
        <h2 class="form-signin-heading">Music Light</h2>
        <input name="username" id="username" type="text">
        <input name="password" id="password" type="password">
		
		<br>
		
		<input type="submit" class="btn btn-large" name="Submit_Login" value="Sign in"/>
		or
		<a href="registration.php" style="text-decoration: none;"><input type="button" value="Register"/></a> </br></br>
		<a href="../">← Back to Music Light</a>
      </form>
    </div> <!-- /container -->

  </body>
</html>
