<?php
	$id = $_GET['id'];
?>


<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="wbpl_add-edit.php?action=updateproduct&id=<?php echo $id ?>">
	<td>
	<table>
	
	<?php
	$sql="select * from wbpl_product
          where kd_product='$id'";
	$result=mysql_query($sql) or die(mysql_error());
	while($rows=mysql_fetch_array($result)){
	?>
	
		<tr>
			<td width="120">Product ID</td>
			<td width="350">
			<?php echo $rows['kd_product'];?>
			</td>
		</tr>
		
		<tr>
			<td width="120">Product Name</td>
			<td width="350">
			<input name="nama_product" type="text" id="nama_product" value="<?php echo $rows['nama_product'];?>" style="width:264px;"/>
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
			<td width="120">Description</td>
			<td width="350">
			<textarea name="product_deskripsi" rows="5" style="width: 512px;"><?php echo htmlspecialchars($rows['deskripsi']);?></textarea>
			</td>
		</tr>
		
		<?php } ?>
	
		<tr>
			<td>&nbsp;</td>

			<td>
			<input class="btn" type="submit" name="tambah" value="Update" />
			</td>
		</tr>
		<tr>
			<td colspan='2'><div id="form1_errorloc" style="color:red"></div></td>
		</tr>
	</table></td>
</form>


