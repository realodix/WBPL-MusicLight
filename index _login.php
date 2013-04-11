<form id="form1" name="form1" method="post" action="admin/login_check.php">
	<table  align="center">
		<tr>
			<td colspan='2'>
				Username<br>
				<input name="username" type="text" id="username"  />
				<div id="form1_username_errorloc" style="color:red"></div>
			</td>
		</tr>
			
		<tr>
			<td colspan='2'>
				Password<br>
				<input name="password" type="text" id="password"  />
				<div id="form1_password_errorloc" style="color:red">
			</td>
		</tr>

		<tr>
			<td colspan="3" align="right">
				<input class="btn" type="submit" name="Home_Submit_Login" value="Submit" /> 
				<input class="btn" type="reset" name="" value="Reset" />
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