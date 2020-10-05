<h3>Testimony</h3>
<?php
/*
 * kode untuk approve data
 */
if (isset($_GET['aprv'])) {
    $kd_testimony = $_GET['id'];
    $setuju = "update wbpl_testimony set
        testimony_status='approved'
        where kd_testimony='$kd_testimony'";
    mysql_query($setuju) or die(mysql_error());
}

/*
 * kode untuk unapprove data
 */
if (isset($_GET['unaprv'])) {
    $kd_testimony = $_GET['id'];
    $setuju = "update wbpl_testimony set
        testimony_status='pending'
        where kd_testimony='$kd_testimony'";
    mysql_query($setuju) or die(mysql_error());
}

/*
 * kode untuk menghapus data
 */
if (isset($_GET['del'])) {
    $kd_testimony = $_GET['id'];
    $hapus = "delete from wbpl_testimony where kd_testimony='$kd_testimony'";
    mysql_query($hapus) or die(mysql_error());
}

/*
 * kode untuk menampilkan data
 */
  $sql = 'SELECT * FROM  wbpl_testimony';
  $result = mysql_query($sql) or die(mysql_error());

  while ($rows = mysql_fetch_array($result)) {
      ?>

  <p>#<?php echo '<b>'.$rows['kd_testimony'].'</b>';
      if ($rows['testimony_status'] == 'pending') {
          echo ' <i>[pending]</i>';
      } ?>

  <br>
  <?php echo $rows['testimony_isi']; ?>

  <br><br>
  <?php
  if ($rows['testimony_status'] == 'pending') {
      ?>
    <a href="index.php?page=testimony&aprv=true&id=<?php echo $rows['kd_testimony']?>">Approve</a> |
<?php
  } else { ?>
    <a href="index.php?page=testimony&unaprv=true&id=<?php echo $rows['kd_testimony']?>">Unapprove</a> |
<?php } ?>
  <a href="index.php?page=testimony&del=true&id=<?php echo $rows['kd_testimony']?>">Delete</a> |
  <a href="#">Edit</a></p>
  <hr>
<?php
  }

if (isset($_GET['status'])) {
    if ($_GET['status'] == 0) {
        echo '<p>Berhasil di approve</p>';
    }
}

?>
