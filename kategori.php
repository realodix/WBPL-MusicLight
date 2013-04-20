
<ul>
	<?php
	
	include('admin/inc/config.php');
	
	/**
	* Kategori Brand
	*/
	$kat="select wbpl_brand.nama_brand, wbpl_brand.kd_brand,
            count(wbpl_product.nama_brand) as jumlah 
          from wbpl_brand, wbpl_product 
          where wbpl_product.nama_brand = wbpl_brand.nama_brand 
          group by wbpl_brand.nama_brand";
	$hasil=mysql_query($kat) or die(mysql_error());
	while($get_data=mysql_fetch_array($hasil)){

	/**
	* Boneka Kategori
	*
	include('admin/inc/config.php');
	$kat="select kategori.nama_kategori, kategori.kd_kategori,
            count(buku.kd_buku) as jumlah 
          from kategori, buku 
          where buku.kd_kategori=kategori.kd_kategori 
          group by kategori.nama_kategori";
	$hasil=mysql_query($kat) or die(mysql_error());
	while($get_data=mysql_fetch_array($hasil)){*/
	?>
	
	<li>
		<a href="index.php?page=detail&id=<?php echo $get_data['nama_brand']?>">
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
	$kat="select wbpl_instype.nama_instype,wbpl_instype.kd_instype,
            count(wbpl_product.kd_product) as jumlah 
            from wbpl_instype, wbpl_product 
            where wbpl_product.nama_instype=wbpl_instype.nama_instype 
            group by wbpl_instype.nama_instype";
	$hasil=mysql_query($kat) or die(mysql_error());
	while($get_data=mysql_fetch_array($hasil)){
	
	/**
	* Boneka Instrument Type
	
	include('admin/inc/config.php');
	$kat="select penerbit.nama,penerbit.kd_penerbit,
                       count(buku.kd_buku) as jumlah 
                       from penerbit, buku 
                       where buku.kd_penerbit=penerbit.kd_penerbit 
                       group by penerbit.nama";
	$hasil=mysql_query($kat) or die(mysql_error());
	while($get_data=mysql_fetch_array($hasil)){*/
	?>
	
	<li>
		<a href="index.php?page=detail&p=<?php echo $get_data['nama_instype']	?>">
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