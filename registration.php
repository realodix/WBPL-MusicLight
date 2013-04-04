<h1>Registration</h2>

<form id="registration" name="registration" method="post" action="registration _add.php">
<table>
	<tr>
		<td>Name</td>
		<td></td>
		<td></td>
		<td><input type="text" name="name_user" id="name_user" style="width:187px;"></input></td>
	</tr>
	
	<tr>
		<td>Username</td>
		<td></td>
		<td></td>
		<td><input type="text" name="username_user" id="username_user" style="width:187px;"></input></td>
	</tr>
	
	<tr>
		<td>Password</td>
		<td></td>
		<td></td>
		<td><input type="text" name="pass_user" id="pass_user" style="width:187px;"></input></td>
	</tr>
	
	<tr>
		<td>Confirm Password</td>
		<td></td>
		<td></td>
		<td><input type="text" name="cpass_user" id="cpass_user" style="width:187px;"></input></td>
	</tr>
	
	<tr>
		<td>Gender</td>
		<td></td>
		<td></td>
		<td>
			<input type="radio" name="gender_user" id="gender_user_male" value="Male">Male</input>
			<input type="radio" name="gender_user" id="gender_female" value="Female">Female</input>
		</td>
	</tr>
	
	<tr>
		<td>Address</td>
		<td></td>
		<td></td>
		<td><textarea name="address_user" id="address_user"></textarea></td>
	</tr>
	
	<tr>
		<td>Phone</td>
		<td></td>
		<td></td>
		<td><input type="text" name="phone_user" id="phone_user" style="width:187px;"></input></td>
	</tr>
	
	<tr>
		<td>E-Mail</td>
		<td></td>
		<td></td>
		<td><input type="text" name="email_user" id="email_user" style="width:187px;"></input></td>
	</tr>
	
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td><input type="submit" name="register_user" value="Register" /></td>
	</tr>
	
	<tr>
		<td align=right colspan='4'>
			<?php
			if (isset($_GET['status'])) {
			if ($_GET['status'] == 0) {
				echo "Registrasi berhasil";
				} else {
				echo "Registrasi gagal";
				}
			}
	?>
		</td>
	</tr>
</table>
</form>