<br>
<form id="form1" name="form1" method="post" action="bayar_add.php">
	<td>
	<table>
	
		<tr>
			<td width="120">Tanggal</td>
			
			<td width="350">
			<input name="tanggal" type="text" id="tanggal" size="40" />
			</td>
		</tr>
		<tr>
			<td width="120">Kode Pesan</td>
			
			<td width="350">
			<input name="kd_pesan" type="text" id="kd_pesan" size="40" />
			</td>
		</tr>
		<tr>
			<td width="120">Total Bayar</td>
			
			<td width="350">
			<input name="total_bayar" type="text" id="total_bayar" size="40" />
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		
			<td>
			<input class="btn" type="submit" name="tambah" value="Submit" />
			<input class="btn btn-danger" type="reset" name="resetbtn" value="Reset" />
			</td>
		</tr>
		<tr>
			<td colspan='2'><div id="form1_errorloc" style="color:red"></div></td>
		</tr>
	</table>
</form>

<?php
if (isset($_GET['status'])) {
	if ($_GET['status'] == 0) {
		echo " Konfirmasi pembayaran berhasil";
	} else {
		echo "konfirmasi Pembayaran gagal, silahkan ulangi lagi";
	}
}
?>