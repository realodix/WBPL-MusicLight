<table  width="600px" border=0>
<tr style="background-color:#F79307">
<td>No Pesan</td><td>Tgl Pesan</td><td>Total Bayar</td><td>Operasi</td></tr>


<?php
// Kode untuk menghapus data
if (isset($_GET['del'])) {
    $no_pesan = $_GET['id'];
    $hapus = "DELETE FROM pesan WHERE kd_pesan='$no_pesan'";
    $mysqli->query($hapus);
}
$sql = '';
if (isset($_POST['btnCari'])) {
    $cari = $_POST['cari'];
    // ambil data dari table admin
    $sql = "SELECT * FROM  pesan where kd_pesan like '%$cari%'";
} else {
    $sql = 'SELECT * FROM  pesan';
}

$result = $mysqli->query($sql);

// proses menampilkan data
while ($rows = mysqli_fetch_array($result)) {
    ?>

<tr>
  <td><?php  echo $rows['kd_pesan']; ?></td>
  <td><?php  echo $rows['tgl_pesan']; ?></td>
  <td><?php  echo $rows['total_bayar']; ?></td>
  <td>

  <a class="btn btn-danger" href="index.php?page=wbpl-pesan&del=true&id=<?php echo $rows['kd_pesan']?>" onclick="return askUser()";>
    <i class="icon-trash" title="Remove"></i>
  </a>
  </td>
</tr>

<?php
}

// tutup koneksi
?>
<tr><td align=right colspan='3'>
<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == 0) {
        echo ' Operasi data berhasil';
    } else {
        echo 'operasi gagal';
    }
}
?>
</td>
<td align=right><!--<a href="index.php?page=pesan_form_add">
<img src="image/admin/add.jpg"> Add</a>--> </td></tr>
<tr></tr>
</table>
