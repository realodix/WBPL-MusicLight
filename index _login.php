<form id="form1" name="form1" method="post" action="admin/login_check.php">
	<table  align="center">
		<tr>
			<h2>Login</h2>
			<td colspan='2'>
				<input name="username" type="text" id="username" placeholder="Username" />
				<div id="form1_username_errorloc" style="color:red"></div>
			</td>
		</tr>
			
		<tr>
			<td colspan='2'>
				<input name="password" type="password" id="password" placeholder="Password"/>
				<div id="form1_password_errorloc" style="color:red">
			</td>
		</tr>

		<tr>
			<td colspan="3" align="right">
				<input class="btn" type="submit" name="Home_Submit_Login" value="Submit" /> 
				<a href="index.php?page=registration" class="btn btn-primary">Register</a>
			</td>
		</tr>
			
		<tr>
			<td></td>
			<td colspan='1'>
				<div id="form1_errorloc" style="color:green">
				<?php
				//if (isset($_GET['status'] == 0)) {
				//echo "The username or password you entered is incorrect";
				//}
					if (isset($_GET['status'])) {
						if ($_GET['status'] == 1) {
					echo "<p>The username or <br> password you entered <br> is incorrect</p>";
						}
					}
					?>
				</div>
			</td>
		</tr>
	</table>
</form>