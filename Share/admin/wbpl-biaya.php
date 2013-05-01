<?php
	
$action = $_GET['action'];
switch ($action) {
	case 'view':
?>

		<table  width="600px" border=0>
			<tr style="background-color:#F79307">
				<td>No.</td><td>Nama Kota</td><td>Biaya</td><td>Operasi</td>
			</tr>

			<?php

			//===========================
			if(isset($_GET['del'])){
				$id_kota=$_GET['id'];
				$hapus ="delete from biaya_kirim where id_kota='$id_kota'";
				mysql_query($hapus);
			}
			
			$sql="";
			
			if(isset($_POST['btnCari'])){
				$cari=$_POST['cari'];
				//ambil data dari table admin
				$sql="SELECT * FROM  biaya_kirim where id_kota like '%$cari%'";
			}else{
				$sql="SELECT * FROM  biaya_kirim";
			}

			$result=mysql_query($sql) or die(mysql_error());
			$no=1;
			
			//proses menampilkan data
			while($rows=mysql_fetch_array($result)){
			?>
			<tr>
				<td><?php echo $no;?></td>

				<td><?php echo $rows['nama_kota'];?></td>

				<td><?php echo $rows['biaya'];?></td>

				<td>
					<a class="btn" href="index.php?page=wbpl-biaya&action=edit&id=<?php echo $rows['id_kota']?>">
					<i class="icon-edit" title="Edit"></i></a>
					<a class="btn btn-danger" href="index.php?page=wbpl-biaya&action=view&del=true&id=<?php echo $rows['id_kota']?>"  onclick="return askUser()";>
					<i class="icon-trash" title="Remove"></i></a>
				</td>
			</tr>

			<?php
			$no++;
			}
			?>
			<tr>
				<td align=right colspan='3'>
				</td>
				
				<td align=right>
					<a href="index.php?page=wbpl-biaya&action=add">
						Add
					</a>
				</td>
			</tr>
			<tr></tr>
		</table>
		
	<?php
	break;
	
	case 'add':
	?>
	
		<form id="form1" name="form1" method="post" action="wbpl_add-edit.php?action=insert_biaya">
			<td>
				<table>
					<tr>
						<td width="120">Nama Kota</td>
						<td width="350">
						<input name="nama_kota" type="text" id="nama_kota" size="40" />
						</td>
					</tr>
					<tr>
						<td width="120">Biaya</td>
						<td width="350">
						<input name="biaya" type="text" id="biaya" size="40" />
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
				
						<td>
							<input class="btn" type="submit" name="tambahLogin" value="Save" />
							<a href="index.php?page=wbpl-biaya&action=view" class="btn btn-danger floatRight">Cancel</a>
						</td>
					</tr>
					<tr>
						<td colspan='2'><div id="form1_errorloc" style="color:red"></div></td>
					</tr>
				</table>
			</td>
		</form>
	
	<?php
	break;
	
	case 'edit':
	?>
	
		<?php

		$id = $_GET['id'];
		
		//ambil data dari table feedback
		$sql = "select * from biaya_kirim where id_kota='$id' ";
		$result = mysql_query($sql) or die(mysql_error());
		?>
		
		<h2>Change Biaya Kirim</h2>
		<table>
			<form id="form1" name="form1" name="form2" method="post" action="wbpl_add-edit.php?action=update_biaya">
				<?php
				//proses menampilkan data
				while($rows=mysql_fetch_array($result)){
				?>

				<td width="120">ID KOta</td>
				<td width="350"><?php  echo $rows['id_kota'];?></td>
				</tr>
				<input type="hidden" id="id_kota" name="id_kota" value=<?php echo $rows['id_kota'];?> />
				<tr>
					<td width="120">Nama Kota</td>
					<td width="350">
					<input name="nama_kota" type="text" id="nama_kota" size="40"
					value=<?php echo $rows['nama_kota'];?>>
					</td>
				</tr>
				<tr>
					<td width="120">Biaya</td>
					<td width="350">
					<input name="biaya" type="text" id="biaya" size="40"
					value=<?php echo $rows['biaya'];?>>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
			
					<td>
						<input class="btn" type="submit" name="submitUser" value="Save" />
						<a href="index.php?page=wbpl-biaya&action=view" class="btn btn-danger floatRight">Cancel</a>
					</td>
				</tr>
				<?php
				//loop while
				}
				?>
			</form>
		</table>
	
	<?php
	break;
}
	?>

