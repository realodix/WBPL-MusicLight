<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="wbpl_add-edit.php?action=insertproduct">
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
				<select name='kd_brand' style="width:164px;">
						<?php echo combo_brand();?>
				</select>
				<input type='text' name='nama_brand' value='' id='nama_brand'>
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
			<td width="650">
			<textarea name='product_deskripsi' rows="5" style="width: 512px;"></textarea>
			<script>
                CKEDITOR.replace( 'product_deskripsi' );
            </script>
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

<form>
		<p>
			Cari Kata :
			<input type="text" name="nama_brand" id="nama_brand">
		</p>
	</form>

	
	<?php

    $namePart=$_GET['term'];
    $names = array();

// Create connection
        $con=mysqli_connect('localhost','root','','wbpl_ml'); 
        // Query Database
        $result = mysqli_query($con,"SELECT nama_brand FROM wbpl_product WHERE name like    '%".$namePart."%'");
        $arr = '';

                while($row = mysqli_fetch_array($result)){
                    array_push($names,$row['name']);
                }

       echo json_encode($names);
	?>
	
<script type="text/javascript">
$(document).ready(function(){
    $("#nama_brand").autocomplete({
            source: "insertproduct.php",
            minLength: 1
     });
});
</script>