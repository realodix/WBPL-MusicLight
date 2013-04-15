<?php
/*
 * kode untuk approve data
 */
if(isset($_GET['aprv'])){
	$kd_testimony=$_GET['id'];
	$setuju ="update wbpl_testimony set
				testimony_status='approved'
				where kd_testimony='$kd_testimony'";
	mysql_query($setuju)or die(mysql_error());
}
 
 
/*
 * kode untuk menghapus data
 */
if(isset($_GET['del'])){
	$kd_testimony=$_GET['id'];
	$hapus ="delete from wbpl_testimony where kd_testimony='$kd_testimony'";
	mysql_query($hapus)or die(mysql_error());
}


/*
 * kode untuk menampilkan data
 */
	$sql="SELECT * FROM  wbpl_testimony";
	$result=mysql_query($sql) or die(mysql_error());

	while($rows=mysql_fetch_array($result)){
?>

	<p>#<?php echo $rows['kd_testimony'];?> |  <?php echo ucfirst($rows['testimony_status']);?><br>
	<?php echo $rows['testimony_isi'];?>
	
	<br>
	<a href="index.php?page=testimony&aprv=true&id=<?php echo $rows['kd_testimony']?>">Approve</a> | <a href="index.php?page=testimony&del=true&id=<?php echo $rows['kd_testimony']?>">Delete</a> | <a href="#">Edit</a></p>
<?php 
}
 
if (isset($_GET['status'])) {
	if ($_GET['status'] == 0) {
		echo "<p>Berhasil di approve</p>";
	}
}

?>
