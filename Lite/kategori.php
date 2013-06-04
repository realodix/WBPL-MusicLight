
<ul>
	<?php
	
	include('wbpl-config.php');
	
	/**
	* Kategori Brand
	*/
	$kat="select nama_brand,
            count(nama_brand) as jumlah 
          from wbpl_product 
          group by nama_brand";
	$hasil=mysql_query($kat) or die(mysql_error());
	while($get_data=mysql_fetch_array($hasil)){
	?>
	
	<li>
		<a href="index.php?page=product&view=detail&id=<?php echo $get_data['nama_brand']?>">
		<?php
		echo $get_data['nama_brand'];
		echo "(".$get_data['jumlah'].")";
		?>
		<!--(<?php echo $get_data['jumlah']?>)-->
		</a>
	</li>
	<?php
	}
	?>
</ul>

<h3>Instrument Type</h3>
<ul>
	<?php
	/**
	* Instrument Type
	*/
	$kat="select nama_instype,
            count(nama_instype) as jumlah 
            from wbpl_product 
            group by nama_instype";
	$hasil=mysql_query($kat) or die(mysql_error());
	while($get_data=mysql_fetch_array($hasil)){
	?>
	
	<li>
		<a href="index.php?page=product&view=detail&p=<?php echo $get_data['nama_instype']	?>">
		<?php
		echo $get_data['nama_instype'];
		echo "(".$get_data['jumlah'].")";
		?>
		</a>
	</li>
	<?php
	}
	?>
</ul>