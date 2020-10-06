<h3>Testimony</h3>
<?php
// Kode untuk approve data
if (isset($_GET['aprv'])) {
    $kdTestimony = $_GET['id'];
    $setuju = "UPDATE wbpl_testimony
        SET testimony_status='approved'
        WHERE kd_testimony='$kdTestimony'";
    $mysqli->query($setuju);
}

// Kode untuk unapprove data
if (isset($_GET['unaprv'])) {
    $kdTestimony = $_GET['id'];
    $setuju = "UPDATE wbpl_testimony
        SET testimony_status='pending'
        WHERE kd_testimony='$kdTestimony'";
    $mysqli->query($setuju);
}

// Kode untuk menghapus data
if (isset($_GET['del'])) {
    $kdTestimony = $_GET['id'];
    $hapus = "DELETE FROM wbpl_testimony WHERE kd_testimony='$kdTestimony'";
    $mysqli->query($hapus);
}

  // Kode untuk menampilkan data
  $sql = 'SELECT * FROM  wbpl_testimony';
  $result = $mysqli->query($sql);

  while ($rows = mysqli_fetch_array($result)) {
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
