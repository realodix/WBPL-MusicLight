<?php

include ('../wbpl-config.php');

?>
<h1> Tabel Profile</h1>

<?php 
//$sql="SELECT * FROM  buku";
//$result=mysql_query($sql) or die(mysql_error());
//while($rows=mysql_fetch_array($result)){
?>

<form id="form1" name="form1" method="post" action="wbpl_add-edit.php?action=update_profile">
	<td>
		<table>
<?php
/*where kd_member='M0001' ditambahkan agar
* data yang muncul tidak semuanya*/
$id = $_GET['id'];
$sql="SELECT * FROM  wbpl_member where kd_member='$id' ";
$result=mysql_query($sql) or die(mysql_error());

while($rows=mysql_fetch_array($result)){
?>
			<tr>
				<td width="120">Name</td>
				<td width="350">
				<input name="Name" type="text" id="Name" size="40" value="<?php echo $rows['name'];?>"/>
				</td>
			</tr>
			<tr>
				<td width="120">Address</td>
				<td width="350">
				<input name="Address" type="text" id="Address" size="40" value="<?php echo $rows['address'];?>"/
				</td>
			</tr>
			<tr>
				<td width="120">Phone</td>
				<td width="350">
				<input name="Phone" type="text" id="Phone" size="40" value="<?php echo $rows['phone'];?>"/
				</td>
			</tr>
			<tr>
				<td width="120">Email</td>
				<td width="350">
				<input name="Email" type="text" id="Email" size="40" value="<?php echo $rows['email'];?>"/
				</td>
			</tr>
<?php } ?>
			<tr>
				<td colspan='2'><div id="form1_errorloc" style="color:red"></div></td>
			</tr>
			<tr>
				<td colspan='2'><div id="form1_errorloc" style="color:red"></div></td>
			</tr>
			<tr>
				<td width="120">Old Password</td>
				<td width="350">
				<input name="Email" type="Email" id="Email" size="40" />
				</td>
			</tr>
			<tr>
				<td width="120">New Password</td>
				<td width="350">
				<input name="Email" type="Email" id="Email" size="40" />
				</td>
			</tr>
			<tr>
				<td width="120">Confirm Password</td>
				<td width="350">
				<input name="Email" type="Email" id="Email" size="40" />
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			
				<td>
				<input class="btn" type="submit" name="UpdateProfile" value="Update" />
				<input class="btn btn-warning"type="reset" name="resetbtn" value="Reset" />
				<a href="index.php?page=member" class="btn btn-danger pull-right">Cancel</a>
				</td>
			</tr>
			<tr>
				<td colspan='2'><div id="form1_errorloc" style="color:red"></div></td>
			</tr>
		</table>
	</td>
</form>
<?php

mysql_close();
//close database

//tampilan siapa yang pengelola
?>

