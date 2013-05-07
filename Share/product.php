
		<h2> Pilih Product yang mau dibeli </h2>
		<?php

		if(isset($_GET['id'])){
			$product_brand=$_GET['id'];
			$sql="select * from wbpl_product where nama_brand='$product_brand'";
		}else if(isset($_GET['p'])){
			$product_ins_type=$_GET['p'];
			$sql="select * from wbpl_product where nama_instype='$product_ins_type'";
		}else{
			$sql="select * from wbpl_product";
		}

		$hasil=mysql_query($sql) or die(mysql_error());

		while($get_data=mysql_fetch_array($hasil)){
		?>

		<h4><?php echo $get_data['nama_product']?></h4>
		<div class="image_wrapper image_fl"><img class="img-polaroid" src="
		<?php
		$imagee = $get_data['image'];
			if ($imagee == "" ){
				echo 'image/Image Not Available.jpg';
			}else{
		?>
		image/<?php echo $get_data['image'];} ?>" alt="Image Not Avaible" width="150px" heigth="150px">
		</div>

		<table>
			<tr>
				<td>Product ID</td>
				<td>: <?php echo $get_data['kd_product']?></td>
			</tr>
			<tr>
				<td>Brand</td>
				<td>: <?php echo $get_data['nama_brand']?></td>
			</tr>
			<tr>
				<td>Instrument Type</td>
				<td>: <?php echo $get_data['nama_instype']?></td>
			</tr>
			<tr>
				<td>Price</td>
				<td>: Rp. <?php echo $get_data['price']?></td>
			</tr>
			<tr>
				<td>Stock</td>
				<td>: <?php
							$product_stock = $get_data['stock'];
							if ($product_stock == 0 ){
								echo 'Stock Not Avaible';
							}else{
								echo $get_data['stock'];
							}
							?>
				</em></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="#" class="btn btn-inverse floatRight">Add to cart</a></td>
			</tr>
		</table>

		<br><br>
		<strong>Description</strong>

		<p style="text-align: justify;">
			<?php echo $get_data['deskripsi'];?>
		</p>


		<?php
		}
		mysql_close();
		?>

