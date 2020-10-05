<html>
  <head>
    <title>Music Light | Print</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../resources/css/bootstrap.css" />
  </head>
  <body>
    <div class="text-center">
      <h2> List Product </h2>
      <h1> Music Light </h1>
      <p> Jakarta Barat </p>
    <div>
    <hr>
    <br/>

    <table class="table">
      <tr style="background-color:#F79307">
        <td>No</td><td>Product ID</td><td>Brand</td><td>Instrument Type</td>
        <td>Price</td><td>Stock</td>
      </tr>
      <?php
      include '../wbpl-config.php';

      $sql = 'SELECT * FROM  wbpl_product';

      $result = mysql_query($sql) or die(mysql_error());

      //proses menampilkan data
      $no = 1;
      while ($rows = mysql_fetch_array($result)) {
          ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $rows['kd_product']; ?></td>
        <td><?php echo $rows['nama_brand']; ?></td>
        <td><?php echo $rows['nama_instype']; ?></td>
        <td><?php echo $rows['price']; ?></td>
        <td><?php echo $rows['price']; ?></td>
      </tr>
      <?php
      $no++;
      }
      ?>
    </table>
    <?php mysql_close();
?>
  </body>
</html>
