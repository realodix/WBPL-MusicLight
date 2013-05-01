<?php

include ('inc/config.php');

?>
<h1> Tabel Member</h1>
<form action="index.php?page=member" method="post">
	<div class="input-append">
		<input class="span3" id="appendedInputButton" type="text" name="cari" placeholder="Type something">
		<button class="btn" type="subit" name='btnCari'>Go!</button>
    </div>
</form>

<a href='index.php?page=member'>Vie all data</a>


<table  width="600px" border=0>
	<tr style="background-color:#F79307">
		<td width="100px">Kode User</td>
		<td width="250px">Username</td>
		<td width="90px">Operation</td>
	</tr>

<?php
/*
 * kode untuk menghapus data
 */
if(isset($_GET['del'])){
	$Kd_member=$_GET['id'];
	$hapus ="delete from wbpl_member where Kd_member='$Kd_member'";
	mysql_query($hapus)or die(mysql_error());
}

if(isset($_POST['btnCari'])){
	$cari=$_POST['cari'];
	//ambil data dari table admin
	$sql="SELECT * FROM  wbpl_member where username like '%$cari%'";
}else{
	$sql="SELECT * FROM  wbpl_member";
}

$result=mysql_query($sql) or die(mysql_error());


//proses menampilkan data 
while($rows=mysql_fetch_array($result)){
?>
	<tr>
		<td><a href="index.php?page=profile&id=<?php echo $rows['kd_member']?>"><?php echo $rows['kd_member'];?></a></td>
		<td><a href="index.php?page=profile&id=<?php echo $rows['kd_member']?>"><?php echo $rows['username'];?></a></td>
		
		<td>
			<a href="index.php?page=profile&id=<?php echo $rows['kd_member']?>">
				Edit
			</a>
			 or
			<a href="index.php?page=member&del=true&id=<?php echo $rows['kd_member']?>"  onclick="return askUser()";> 
				Del
			</a>
		</td>
	</tr>
	<?php
	}
	?>
</table>