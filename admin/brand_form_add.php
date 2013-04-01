<form id="form1" name="form1" method="post" action="brand_add.php">
	<td>
	<table>
		<tr>
			<td width="120">Kode brand</td>
			<td width="150">
			<input name="kd_brand" type="text" id="kd_brand" 
			value=<?=kode_brand()?> size="10" />
			</td>
		</tr>
		<tr>
			<td width="120">Brand</td>
			<td width="150">
			<input name="nama_brand" type="nama_brand" id="nama_brand" size="20" />
			</td>
		</tr>
	
		<tr>
			<td>&nbsp;</td>
			
			<td>
			<input type="submit" name="tambahLogin" value="Tambah" />
			<input type="reset" name="resetbtn" value="Reset" />
			</td>
		</tr>
		<tr>
			<td colspan='2'><div id="form1_errorloc" style="color:red"></div></td>
		</tr>
	</table></td>
</form>
<script language="javaScript" type="text/javascript"
xml:space="preserve">
	//You should create the validator only after the definition of the HTML form
	var frmvalidator = new Validator("form1");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
	frmvalidator.EnableMsgsTogether();

	frmvalidator.addValidation("kd_brand", "req", "kode jenis masih kosong ");
	frmvalidator.addValidation("nama_brand", "req", "nama jenis  masih kosong ");

	frmvalidator.addValidation("kd_brand", "alnum_s", "kode jenis tidak boleh ada spasi ");
	frmvalidator.addValidation("nama_brand", "maxlen=15", "nama jenis  tidak boleh lebih dari 7 karakter ");

</script>
