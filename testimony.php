
	<h1>Testimony</h2>
			
	<?php
			
	$sql="SELECT * FROM  wbpl_testimony where testimony_status='approved' ";
	$result=mysql_query($sql) or die(mysql_error());
	while($rows=mysql_fetch_array($result)){
	?>
	
	<br>
	<p>#<?php echo $rows['kd_testimony'];?> <br>
	<?php echo $rows['testimony_isi'];?></p>
	<br>
	<?php } ?>
			
	<hr>
			
	<p>Please enter your testimonial in columm below.</p>
			
	<form name="testimony" method="post" action="admin/wbpl_add-edit.php?action=insert_testimony">
		<textarea name="testimony_isi" style="width: 550px; height: 160px; resize: none;"></textarea>
		<br>
		<?php
		if (isset($_GET['status'])) {
			if ($_GET['status'] == 0) {
				echo "<i id=".'waiting'.">Terima kasih, testimony Anda sudah masuk dan sedang menunggu moderasi dari Admin.</i> <br>";
			}
		}
		?>
		<input class="btn btn-primary" type="submit" name="testimony_submit" value="Post Testimony"/>
	</form>