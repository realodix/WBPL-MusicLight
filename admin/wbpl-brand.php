<?php

$action = $_GET['action'];
switch ($action) {
	case 'view':
?>
		<table  width="320px" border=0 style="float: left;">

			<form id="form1" name="form1" method="post" action="wbpl_add-edit.php?action=insert_brand">
				<tr><td colspan="3" >
				<table>
					<tr>
						<td width="120">ID</td>
						<td width="150">
						<input name="kd_brand" type="text" id="kd_brand" 
						value=<?php echo kode_brand()?> size="10"/>
						</td>
					</tr>
					<tr>
						<td width="120">Brand</td>
						<td width="150">
						<input name="nama_brand" type="nama_brand" id="nama_brand" size="20"/>
						</td>
					</tr>
				
					<tr>
						<td>&nbsp;</td>
						
						<td>
						<input type="submit" name="tambahLogin" value="Tambah" />
						<input type="reset" name="resetbtn" value="Reset" />
						</td>
					</tr>
					<tr>
						<td colspan='2'><div id="form1_errorloc" style="color:red"></div></td>
					</tr>
				</table></td></tr>
			</form>



			<tr style="background-color:#F79307">
				<td>ID</td>
				<td>Brand</td>
				<td>Operation</td>
			</tr>

			<?php
			/*
			* kode untuk menghapus data
			*/
			if(isset($_GET['del'])){
			$kd_brand=$_GET['id'];
			$hapus ="delete from wbpl_brand where kd_brand='$kd_brand'";
			mysql_query($hapus);
			}
			$sql="";
			if(isset($_POST['btnCari'])){
			$cari=$_POST['cari'];
			//ambil data dari table admin
			$sql="SELECT * FROM  wbpl_brand where kd_brand like '%$cari%'";
			}else{
			$sql="SELECT * FROM  wbpl_brand";
			}

			$result=mysql_query($sql) or die(mysql_error());

			//proses menampilkan data
			while($rows=mysql_fetch_array($result)){
			?>
			<tr>
				<td><?php  echo $rows['kd_brand'];?></td>
				<td><?php  echo $rows['nama_brand'];?></td>

				<td>
					<a href="index.php?page=wbpl-brand&action=editb&id=<?php echo $rows['kd_brand']?>">
					<img src="image/b_edit.png"></a>
					<a href="index.php?page=wbpl-brand&action=view&del=true&id=<?php echo $rows['kd_brand']?>"  onclick="return askUser()";>
					<img src="image/b_drop.png"></a>
				</td>
			</tr>

			<?php
			}

			//tutup koneksi
			?>
			<tr>
				<td align=right colspan='2'>
				<?php
				if (isset($_GET['status'])) {
					if ($_GET['status'] == 0) {
						echo " Operasi data berhasil";
					} else if ($_GET['status'] == 1) {
						echo "operasi gagal";
					}
				}
				?>
				</td>

			</tr>

		</table>




		<table  width="320px" border=0 style="float: right;">

			<form id="form1" name="form1" method="post" action="wbpl_add-edit.php?action=insert_instype">
				<tr><td colspan="3" >
				<table>
					<tr>
						<td width="120">ID</td>
						<td width="150">
						<input name="kd_instype" type="text" id="kd_instype" 
						value=<?php echo kode_instype()?> size="10"/>
						</td>
					</tr>
					<tr>
						<td width="120">Ins. Type</td>
						<td width="150">
						<input name="nama_instype" type="nama_instype" id="nama_instype" size="20" />
						</td>
					</tr>
				
					<tr>
						<td>&nbsp;</td>
						
						<td>
						<input type="submit" name="tambahLoginIT" value="Tambah" />
						<input type="reset" name="resetbtn" value="Reset" />
						</td>
					</tr>
					<tr>
						<td colspan='2'><div id="form1_errorloc" style="color:red"></div></td>
					</tr>
				</table></td></tr>
			</form>



			<tr style="background-color:#F79307">
				<td>ID</td>
				<td>Instrument Type</td>
				<td>Operation</td>
			</tr>

			<?php
			/*
			* kode untuk menghapus data
			*/
			if(isset($_GET['del'])){
			$kd_instype=$_GET['id'];
			$hapus ="delete from wbpl_instype where kd_instype='$kd_instype'";
			mysql_query($hapus);
			}
			$sql="";
			if(isset($_POST['btnCari'])){
			$cari=$_POST['cari'];
			//ambil data dari table admin
			$sql="SELECT * FROM  wbpl_instype where kd_instype like '%$cari%'";
			}else{
			$sql="SELECT * FROM  wbpl_instype";
			}

			$result=mysql_query($sql) or die(mysql_error());

			//proses menampilkan data
			while($rows=mysql_fetch_array($result)){
			?>
			<tr>
				<td><?php  echo $rows['kd_instype'];?></td>
				<td><?php  echo $rows['nama_instype'];?></td>

				<td>
					<a href="index.php?page=wbpl-brand&action=editit&id=<?php echo $rows['kd_instype']?>">
					<img src="image/b_edit.png"></a>
					<a href="index.php?page=wbpl-brand&action=view&del=true&id=<?php echo $rows['kd_instype']?>"  onclick="return askUser()";>
					<img src="image/b_drop.png"></a>
				</td>
			</tr>

			<?php
			}

			//tutup koneksi
			?>
			<tr>
				<td align=right colspan='2'>
				<?php
				if (isset($_GET['status'])) {
					if ($_GET['status'] == 2) {
						echo " Operasi data berhasil";
					} else if ($_GET['status'] == 3) {
						echo "operasi gagal";
					}
				}
				?>
				</td>

			</tr>

		</table>

	<?php
	break;
	
	case 'editb':
	?>
	
		<?php
		$id = $_GET['id'];
		//ambil data dari table feedback
		$sql = "select * from wbpl_brand where kd_brand='$id' ";
		$result = mysql_query($sql) or die(mysql_error());
		?>
		<h2>Change Brand</h2>
		<table>
			<form id="form1" name="form1" method="post" action="wbpl_add-edit.php?action=update_brand">
				<?php
				//proses menampilkan data
				while($rows=mysql_fetch_array($result)){
				?>

				<td width="120">Kode Brand</td>
				<td width="350">
				<input type="text" id="kd_brand" name="kd_brand" value=<?php echo $rows['kd_brand'];?>  readonly />
				</td>
				</tr> <td width="120">Brand</td>
				<td width="350">
				<input name="nama_brand" type="nama_brand" id="nama_brand" size="40"
				value='<?php echo $rows['nama_brand'];?>'>
				</td>
				</tr>
			
				<tr>
					<td>&nbsp;</td>
				
					<td>
					<input type="submit" name="submitUser" value="Submit" />
					<input type="reset" name="resetbtn" value="Reset" />
					</td>
				</tr>
				<?php
				//loop while
				}
				?>
				<tr>
					<td colspan='2'><div id="form1_errorloc" style="color:red"></div></td>
				</tr>
			</form>
		</table>

	
	<?php
	break;
	
	case 'editit':
	?>
	
		<?php
		$id = $_GET['id'];
		//ambil data dari table feedback
		$sql = "select * from wbpl_instype where kd_instype='$id' ";
		$result = mysql_query($sql) or die(mysql_error());
		?>
		<h2>Change Instrument</h2>
		<table>
			<form id="form1" name="form1" method="post" action="wbpl_add-edit.php?action=update_instype">
				<?php
				//proses menampilkan data
				while($rows=mysql_fetch_array($result)){
				?>

				<td width="120">Kode Instrument</td>
				<td width="350">
				<input type="text" id="kd_instype" name="kd_instype" value=<?php echo $rows['kd_instype'];?>  readonly />
				</td>
				</tr> <td width="120">Instrument Type</td>
				<td width="350">
				<input name="nama_instype" type="nama_instype" id="nama_instype" size="40"
				value='<?php echo $rows['nama_instype'];?>'>
				</td>
				</tr>
			
				<tr>
					<td>&nbsp;</td>
				
					<td>
					<input type="submit" name="submitUser" value="Submit" />
					<input type="reset" name="resetbtn" value="Reset" />
					</td>
				</tr>
				<?php
				//loop while
				}
				?>
				<tr>
					<td colspan='2'><div id="form1_errorloc" style="color:red"></div></td>
				</tr>
			</form>
		</table>
	
	<?php
	break;
}
	?>