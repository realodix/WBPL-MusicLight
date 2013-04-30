<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
	<link href="../css/master.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

  </head>

  <body class="login">

    <div class="container">

      <form class="form-signin" method="post" action="wbpl-login_check.php">
        <h2 class="form-signin-heading">Music Light</h2>
        <input name="username" id="username" type="text" class="input-block-level" placeholder="Username">
        <input name="password" id="password" type="password" class="input-block-level" placeholder="Password">
		
		<label class="text-error">
        <?php

		if (isset($_GET['status'])) {
			if ($_GET['status'] == 1) {
				echo "The username or password you entered is incorrect";
			}if ($_GET['status'] == 2) {
				echo "You are now logged out.";
			}
		}
		?>
        </label>
		
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
		<input type="submit" class="btn btn-large" name="Submit_Login" value="Sign in"/>
		or
		<input class="btn btn-large btn-primary" type="submit" name="Home_Submit_Regiter" value="Register"/> </br></br>
		<a href="../">← Back to Music Light</a>
      </form>
    </div>

  </body>
</html>
