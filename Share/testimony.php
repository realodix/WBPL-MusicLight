
	<h1>Testimony</h2>
			
	<?php
			
	$sql="SELECT * FROM  wbpl_testimony where testimony_status='approved' ";
	$result=mysql_query($sql) or die(mysql_error());
	while($rows=mysql_fetch_array($result)){
	?>
	
	<p><b>#<?php echo $rows['kd_testimony'];?></b> <br>
	<?php echo $rows['testimony_isi'];?></p>

	<hr>
	<?php } ?>
			
	<hr>
			
	<p>Please enter your testimonial in columm below.</p>
			
	<form name="testimony" method="post" action="testimony_add.php">
		<textarea name="testimony_isi" style="width: 550px; height: 160px; resize: none;"></textarea>
		<br>
		
		<i id="waiting" class="label label-success">
		<?php

		if (isset($_GET['status'])) {
			if ($_GET['status'] == 0) {
				echo "Terima kasih, testimony Anda sudah masuk dan sedang menunggu moderasi dari Admin.";
			}
		}
		?>
		</i> <br> <br>
		<input class="btn btn-primary" type="submit" name="testimony_submit" value="Post Testimony"/>
	</form>