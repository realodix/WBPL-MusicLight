<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="wbpl_add-edit.php?action=insertproduct">
	<td>
	<table>
		<tr>
			<td width="120">Product ID</td>
			<td width="350">
			<input name="kd_product" type="text" id="kd_product" size="10" 
			value=<?php echo kode_product();?> style="width:164px;"/>
			</td>
		</tr>
		
		<tr>
			<td width="120">Brand</td>
			<td width="350">
				<select name='kd_brand' style="width:164px;">
						<?php echo combo_brand();?>
				</select>
		
			</td>
		</tr>
		
		<tr>
			<td width="120">Instrument Type</td>
			<td width="350">
				<select
				 name='kd_instype'><?php echo combo_ins_type()?></select>
			
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
			<textarea name='product_deskripsi' cols='60' rows='10'></textarea>
			</td>
		</tr>
	
		<tr>
			<td>&nbsp;</td>

			<td>
			<input type="submit" name="tambah" value="Insert" />
			<input type="reset" name="resetbtn" value="Reset" />
			</td>
		</tr>
		<tr>
			<td colspan='2'><div id="form1_errorloc" style="color:red"></div></td>
		</tr>
	</table></td>
</form>

