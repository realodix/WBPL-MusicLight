<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="insertproduct_add.php">
	<td>
	<table>
		<tr>
			<td width="120">Product ID</td>
			<td width="350">
			<?php echo kode_product();?>
			</td>
		</tr>
		
		<tr>
			<td width="120">Product Name</td>
			<td width="350">
			<input name="nama_product" type="text" id="nama_product" style="width:264px;"/>
			</td>
		</tr>
		
		<tr>
			<td width="120">Brand</td>
			<td width="350">
				<input name="kd_brand" type="text" id="kd_brand" style="width:264px;"/>
			</td>
		</tr>
		
		<tr>
			<td width="120">Instrument Type</td>
			<td width="350">
				<input name="kd_instype" type="text" id="kd_instype" style="width:264px;"/>
			</td>
		</tr>
		
		<tr>
			<td width="120">Price</td>
			<td width="350">
			<input name="product_price" type="text" id="harga" size="10" style="width:164px;"/>
			</td>
		</tr>
		
		<tr>
			<td width="120">Stock</td>
			<td width="350">
			<input name="product_stock" type="text" id="product_stock" size="10" style="width:164px;"/>
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
			<textarea name='product_deskripsi' rows="5" style="width: 512px;"></textarea>
			</td>
		</tr>
	
		<tr>
			<td>&nbsp;</td>

			<td>
			<input class="btn" type="submit" name="tambah" value="Insert" />
			<input class="btn btn-danger pull-right" type="reset" name="resetbtn" value="Reset" />
			</td>
		</tr>
		<tr>
			<td colspan='2'><div id="form1_errorloc" style="color:red"></div></td>
		</tr>
	</table></td>
</form>

