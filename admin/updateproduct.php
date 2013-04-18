
<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="wbpl_add-edit.php?action=updateproduct">
	<td>
	<table>
	
	<?php
	$id = $_GET['id'];
	//$sql="SELECT * FROM  wbpl_member where kd_member='$id' ";
	$sql="select * from wbpl_product, wbpl_brand, wbpl_instype
          where kd_product='$id' AND wbpl_product.nama_brand = wbpl_brand.nama_brand AND
				wbpl_product.nama_instype = wbpl_instype.nama_instype";
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
			<input name="product_price" type="text" id="product_price" size="10" value="<?php echo $rows['price'];?>" style="width:164px;"/>
			</td>
		</tr>
		
		<tr>
			<td width="120">Stock</td>
			<td width="350">
			<input name="product_stock" type="text" id="product_stock" size="10" value="<?php echo $rows['stock'];?>" style="width:164px;"/>
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
				<?php echo $rows['deskripsi'];?></textarea>
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


