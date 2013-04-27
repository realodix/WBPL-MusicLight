<?php

/*
Pengujian. Sudah ada di index.php

require_once ('inc/mysql.class.php');
require_once ('inc/global.inc.php');
require_once ('admin/inc/config.php');
require_once ('inc/functions.inc.php');
session_start();
*/

// Process actions
if(isset($_GET['action'])){
	$cart = $_SESSION['cart'];
	
	$action = $_GET['action'];

	switch ($action) {
		case 'add' :
			if ($cart) {
				$cart .= ',' . $_GET['id'];
			} else {
				$cart = $_GET['id'];
			}
		break;
			//
			//B002,5,B003,10
		case 'delete' :
			if ($cart) {
				$items = explode(',', $cart);
				$newcart = '';
				foreach ($items as $item) {
					if ($_GET['id'] != $item) {
						if ($newcart != '') {
							$newcart .= ',' . $item;
						} else {
							$newcart = $item;
						}
					}
				}
				$cart = $newcart;
			}
		break;
			
		case 'update' :
			if ($cart) {
				$newcart = '';
				foreach ($_POST as $key => $value) {
					if (stristr($key, 'qty')) {
						$id = str_replace('qty', '', $key);
						$items = ($newcart != '') ? explode(',', $newcart) : explode(',', $cart);
						$newcart = '';
						foreach ($items as $item) {
							if ($id != $item) {
								if ($newcart != '') {
									$newcart .= ',' . $item;
								} else {
									$newcart = $item;
								}
							}
						}
						for ($i = 1; $i <= $value; $i++) {
							if ($newcart != '') {
								$newcart .= ',' . $id;
							} else {
								$newcart = $id;
							}
						}
					}
				}
			}
			$cart = $newcart;
		break;
	}

	$_SESSION['cart'] = $cart;
}
?>

<div id="shoppingcart">
	<h3>Keranjang belanja anda</h3>
	<?php
	echo writeShoppingCart();
	?>
</div>

<div id="contents">
	<h3>Cek keranjang belanja</h3>
	<?php
	//echo wbpl_showCart();
	echo wbpl_showCart();
	?>

	<h3>Form Pengiriman barang</h3>
	<a href="index.php?page=cart&action=finish&kirim=true">Isi Data pembeli</a>
	
	<?php
	if(isset($_GET['kirim'])){
		?>
		<form id="form1" name="form1" method="post" action="pemesan_add.php">
			<td>
			<table>
				<tr>
					<td width="120"><b>Nama</b></td>
					<td width="350">
					<input name="Nama" type="text" id="Nama" size="40" />
					</td>
				</tr>
				<tr>
					<td width="120"><b>Alamat</b></td>
					<td width="350">
					<input name="Alamat" type="text" id="Alamat" size="40" />
					</td>
				</tr>
				<tr>
					<td width="120"><b>Kode Pos</b></td>
					<td width="350">
					<input name="kd_pos" type="text" id="kd_pos" size="40" />
					</td>
				</tr>
				<tr>
					<td width="120"><b>No. Telepon</b></td>
					<td width="350">
					<input name="No_telp" type="text" id="No_telp" size="40" />
					</td>
				</tr>
				<tr>
					<td width="120"><b>E-Mail</b></td>
					<td width="350">
					<input name="Email" type="Email" id="Email" size="40" />
					</td>
				</tr>
				<?php ?>
				<tr>
					<td width="120"><b>Kota</b></td>
					<td width="350">
					<select name='id_kota' id='id_kota'>
						<?php
						$get_kota=mysql_query('select * from biaya_kirim order by nama_kota');
						while ($rows=mysql_fetch_array($get_kota)){
						?>
						<option value="<?php echo $rows['id_kota']?>"><?php echo $rows['nama_kota']
							?></option>
						<?php
						}//end while
						?>
					</select></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				
					<td>
					<input type="submit" name="tambah" value="Tambah" class="btn" />
					<input type="reset" name="resetbtn" value="Reset" class="btn btn-danger" />
					</td>
				</tr>
				<tr>
					<td colspan='2'><div id="form1_errorloc" style="color:red"></div></td>
				</tr>
			</table></td>
		</form>

	<?php
	}
	?>
</div>
