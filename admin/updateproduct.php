
<form id="form1" name="form1" method="post" enctype="multipart/form-data"
 action="updateproduct_edit.php">
	<td>
	<table>
	
	<?php
	$id = $_GET['id'];
	//$sql="SELECT * FROM  wbpl_member where kd_member='$id' ";
	$sql="select * from wbpl_product, wbpl_brand, wbpl_instype
          where kd_product='$id' AND wbpl_product.kd_brand = wbpl_brand.kd_brand AND
				wbpl_product.kd_instype = wbpl_instype.kd_instype";
	$result=mysql_query($sql) or die(mysql_error());
	while($rows=mysql_fetch_array($result)){
	?>
	
		<tr>
			<td width="120">Product ID</td>
			<td width="350">
			<input name="kd_product" type="text" id="kd_product" size="10" value="<?php echo $rows['kd_product'];?>" style="width:164px;"/>
			</td>
		</tr>
		
		<tr>
			<td width="120">Brand</td>
			<td width="350">
				<input name="kd_brand" type="text" id="kd_brand" size="10" value="<?php echo $rows['nama_brand'];?>" style="width:164px;"/>
			</td>
		</tr>
		
		<tr>
			<td width="120">Instrument Type</td>
			<td width="350">
				<input name="kd_instype" type="text" id="kd_instype" size="10" value="<?php echo $rows['nama_instype'];?>" style="width:164px;"/>
			</td>
		</tr>
		
		<tr>
			<td width="120">Price</td>
			<td width="350">
			<input name="product_price" type="text" id="product_price" size="10" value="<?php echo $rows['product_price'];?>" style="width:164px;"/>
			</td>
		</tr>
		
		<tr>
			<td width="120">Stock</td>
			<td width="350">
			<input name="product_stock" type="text" id="product_stock" size="10" value="<?php echo $rows['product_stock'];?>" style="width:164px;"/>
			</td>
		</tr>
		
		<tr>
			<td width="120">Image</td>
			<td width="350">
			<input name="product_image" type="file" id="cover" size="40" />
			</td>
		</tr>
		<tr>
			<td width="120">Deskription</td>
			<td width="350">
			<textarea name='product_deskripsi' cols='60' rows='10'>
				<?php echo $rows['product_deskripsi'];?></textarea>
			</td>
		</tr>
		
		<?php } ?>
	
		<tr>
			<td>&nbsp;</td>

			<td>
			<input type="submit" name="tambah" value="Update" />
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
