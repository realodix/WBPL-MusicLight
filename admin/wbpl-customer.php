<table  width="600px" border=0>
<tr style="background-color:#F79307">
<td>Kd customer</td><td>Nama</td><td>Alamat</td><td>Kode Pos</td><td>No Telp</td><td>Email</td>
<td>Kd Pesan</td><td>Operasi</td></tr>



<?php
/*
 * kode untuk menghapus data
 */
if (isset($_GET['del'])) {
    $kdCustomer = $_GET['id'];
    $hapus = "DELETE FROM customer WHERE kd_pemesan='$kdCustomer'";
    $mysqli->query($hapus);
}
$sql = '';
if (isset($_POST['btnCari'])) {
    $cari = $_POST['cari'];
    //ambil data dari table admin
    $sql = "SELECT * FROM  customer where kd_pemesan like '%$cari%'";
} else {
    $sql = 'SELECT * FROM  customer';
}

$result = $mysqli->query($sql);

// Proses menampilkan data
while ($rows = mysqli_fetch_array($result)) {
    ?>
<tr>
  <td><?php echo $rows['kd_pemesan']; ?></td>
  <td><?php echo $rows['Nama']; ?></td>
  <td><?php echo $rows['Alamat']; ?></td>
  <td><?php echo $rows['kd_pos']; ?></td>
  <td><?php echo $rows['No_telp']; ?></td>
  <td><?php echo $rows['Email']; ?></td>
  <td><?php echo $rows['kd_pesan']; ?></td>

  <td>
    <a class="btn btn-danger" href="index.php?page=wbpl-customer&del=true&id=<?php echo $rows['kd_pemesan']?>"  onclick="return askUser()";>
    <i class="icon-trash" title="Remove"></i></a>
  </td>
</tr>

<?php
}
?>

<tr>
  <td align=right colspan='6'>
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
  <td></td>
</tr>

<tr></tr>
</table>
