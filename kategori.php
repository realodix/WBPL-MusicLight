
<ul>
	<?php
	/**
	* Boneka Kategori
	*/
	include('admin/inc/config.php');
	$kat="select kategori.nama_kategori, kategori.kd_kategori,
            count(buku.kd_buku) as jumlah 
          from kategori, buku 
          where buku.kd_kategori=kategori.kd_kategori 
          group by kategori.nama_kategori";
	$hasil=mysql_query($kat) or die(mysql_error());
	while($get_data=mysql_fetch_array($hasil)){
	?>
	
	<li>
	<a href="index.php?page=detail&id=<?php echo $get_data['kd_kategori']?>">
		<?php echo $get_data['nama_kategori'];
		echo "(".$get_data['jumlah'].")";
		?>
		<!--(<?php echo $get_data['jumlah']?>)-->
	</a>
	</li>
	<?php
	}
	?>
</ul>
<h3> BonekaInstrument Type</h3>
<ul>
	<?php
	/**
	* Boneka Instrument Type
	*/
include('admin/inc/config.php');
$kat="select penerbit.nama,penerbit.kd_penerbit,
                       count(buku.kd_buku) as jumlah 
                       from penerbit, buku 
                       where buku.kd_penerbit=penerbit.kd_penerbit 
                       group by penerbit.nama";
$hasil=mysql_query($kat) or die(mysql_error());
while($get_data=mysql_fetch_array($hasil)){

	?>
	<li>
	<a href="index.php?page=detail&p=<?php echo $get_data['kd_penerbit']
		?>">
		<?php echo $get_data['nama']?>
		(<?php echo $get_data['jumlah']?>)
	</a>
	</li>
	<?php
	}
	?>
</ul>