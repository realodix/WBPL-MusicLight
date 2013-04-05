<form id="form1" name="form1" method="post" enctype="multipart/form-data"
 action="insertproduct_add.php">
	<td>
	<table>
		<tr>
			<td width="120">Product ID</td>
			<td width="350">
			<input name="kd_product" type="text" id="kd_product" size="10" 
			value=<?=kode_product();?> disabled/>
			</td>
		</tr>
		
		<tr>
			<td width="120">Brand</td>
			<td width="350">
				<select name='kd_brand'>
						<?=combo_brand();?>
				</select>
		
			</td>
		</tr>
		
		<tr>
			<td width="120">Instrument Type</td>
			<td width="350">
				<select
				 name='kd_ins_type'><?=combo_ins_type()?></select>
			
			</td>
		</tr>
		
		<tr>
			<td width="120">Price</td>
			<td width="350">
			<input name="harga" type="text" id="harga" size="10" />
			</td>
		</tr>
		
		<tr>
			<td width="120">Image</td>
			<td width="350">
			<input name="cover" type="file" id="cover" size="40" />
			</td>
		</tr>
		<tr>
			<td width="120">deskripsi</td>
			<td width="350">
			<textarea name='deskripsi' cols='60' rows='10'></textarea>
			</td>
		</tr>
	
		<tr>
			<td>&nbsp;</td>

			<td>
			<input type="submit" name="tambah" value="Tambah" />
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
var frmvalidator  = new Validator("form1");
frmvalidator.EnableOnPageErrorDisplaySingleBox();
frmvalidator.EnableMsgsTogether();

frmvalidator.addValidation("kd_buku","req","kode buku masih kosong ");
frmvalidator.addValidation("kd_kategori","req","kode kategori  masih kosong ");
frmvalidator.addValidation("judul","req","judul masih kosong ");
frmvalidator.addValidation("judul","min=5","judul terlalu pendek");
frmvalidator.addValidation("pengarang","req","pengarang masih kosong ");

frmvalidator.addValidation("harga","req","harga masih kosong ");




</script>
