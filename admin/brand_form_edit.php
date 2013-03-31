<?php
include ('inc/config.php');
$id = $_GET['id'];
//ambil data dari table feedback
$sql = "select * from wbpl_brand where kd_brand='$id' ";
$result = mysql_query($sql) or die(mysql_error());
?>
<h2>Change Brand</h2>
<table>
	<form id="form1" name="form1" method="post" action="brand_edit.php">
		<?
//proses menampilkan data
while($rows=mysql_fetch_array($result)){
		?>

		<td width="120">Kode Brand</td>
		<td width="350">
		<input type="text" id="kd_brand" name="kd_brand" value=<? echo $rows['kd_brand'];?>  readonly />
		</td>
		</tr> <td width="120">Brand</td>
		<td width="350">
		<input name="nama_brand" type="nama_brand" id="nama_brand" size="40"
		value='<? echo $rows['nama_brand'];?>'>
		</td>
		</tr>
	
		<tr>
			<td>&nbsp;</td>
		
			<td>
			<input type="submit" name="submitUser" value="Submit" />
			<input type="reset" name="resetbtn" value="Reset" />
			</td>
		</tr>
		<?
		//loop while
		}
		?>
		<tr>
			<td colspan='2'><div id="form1_errorloc" style="color:red"></div></td>
		</tr>
	</form>
</table>
<script language="javaScript" type="text/javascript"
xml:space="preserve">
//You should create the validator only after the definition of the HTML form
var frmvalidator  = new Validator("form1");
frmvalidator.EnableOnPageErrorDisplaySingleBox();
frmvalidator.EnableMsgsTogether();

frmvalidator.addValidation("kd_brand","req","kode brand masih kosong ");
frmvalidator.addValidation("nama_brand","req","nama brand masih kosong ");

frmvalidator.addValidation("kd_brand","alnum_s","kode brand tidak boleh ada spasi ");
frmvalidator.addValidation("nama_brand","minlen=1","nama brand tidak boleh kurang dari 1 karakter ");
</script>
