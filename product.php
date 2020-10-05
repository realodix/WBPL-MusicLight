<?php
$view = $_GET['view'];
switch ($view) {
    case 'product':
?>
        <h2> Pilih Product yang mau dibeli </h2>
        <?php
        //tentukan nilai batas
        $batas = 2;

        if (isset($_GET['halaman'])) {
            $halaman = $_GET['halaman'];
        }

        $posisi = null;

        if (empty($halaman)) {
            $posisi = 0;
            $halaman = 1;
        } else {
            $posisi = ($halaman - 1) * $batas;
        }

        $sql = null;

        if (isset($_GET['id'])) {
            $product_brand = $_GET['id'];
            $sql = "SELECT * FROM wbpl_product WHERE nama_brand='$product_brand'
            limit $posisi,$batas";
        } elseif (isset($_GET['p'])) {
            $product_ins_type = $_GET['p'];
            $sql = "SELECT * FROM wbpl_product WHERE nama_instype='$product_ins_type'
            limit $posisi,$batas ";
        } else {
            $sql = "SELECT * FROM wbpl_product LIMIT $posisi,$batas";
        }

        $hasil = $mysqli->query($sql);

        while ($get_data = $hasil->fetch_array()) {
            ?>

        <h4><?php echo $get_data['nama_product']?></h4>
        <div class="image_wrapper image_fl"><img class="img-polaroid" src="
        <?php
        $imagee = $get_data['image'];
            if ($imagee == '') {
                echo 'admin/image/Image Not Available.jpg';
            } else {
                ?>
        admin/image/<?php echo $get_data['image'];
            } ?>" alt="Image Not Avaible" width="150px" heigth="150px">
        </div>

        <table>
            <tr>
                <td>Product ID</td>
                <td>: <?php echo $get_data['kd_product']?></td>
            </tr>
            <tr>
                <td>Brand</td>
                <td>: <?php echo $get_data['nama_brand']?></td>
            </tr>
            <tr>
                <td>Instrument Type</td>
                <td>: <?php echo $get_data['nama_instype']?></td>
            </tr>
            <tr>
                <td>Price</td>
                <td>: Rp. <?php echo $get_data['price']?></td>
            </tr>
            <tr>
                <td>Stock</td>
                <td>: <?php
                        $product_stock = $get_data['stock'];
            if ($product_stock == 0) {
                echo 'Stock Not Avaible';
            } else {
                echo $get_data['stock'];
            } ?>
                </em></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <a href="index.php?page=cart&view=cart&action=add&id=<?php echo $get_data['kd_product']?>" class="btn btn-inverse floatRight">Add to cart</a>
                </td>
            </tr>
        </table>

        <br><br>
        <strong>Description</strong>

        <p style="text-align: justify;">
            <?php echo $get_data['deskripsi']; ?>
        </p>

        <div class="clearfix"></div>

        <?php
        }

        //=============CUT HERE====================================
        $tampil2 = $mysqli->query('SELECT * FROM wbpl_product');
        $jmldata = $tampil2->num_rows;
        $jumlah_halaman = ceil($jmldata / $batas);

        echo '<br> <br> Halaman: ';
        for ($i = 1; $i <= $jumlah_halaman; $i++) {
            if ($i != $halaman) {
                echo "<a href=index.php?page=product&view=product&halaman=$i> $i</a> | ";
            } else {
                echo "<b> $i</b> | ";
            }
        }
        $tampil2->close();
        ?>

        <br>
        Jumlah Halaman: <?php echo $jmldata;
    break;

    case 'detail':
    ?>
        <h2> Pilih Product yang mau dibeli </h2>
        <?php
        //tentukan nilai batas
        $batas = 2;
        if (isset($_GET['halaman'])) {
            $halaman = $_GET['halaman'];
        }

        $posisi = null;

        if (empty($halaman)) {
            $posisi = 0;
            $halaman = 1;
        } else {
            $posisi = ($halaman - 1) * $batas;
        }

        $sql = null;

        if (isset($_GET['id'])) {
            $product_brand = $_GET['id'];

            $sql = "SELECT * FROM wbpl_product WHERE nama_brand='$product_brand'
            limit $posisi,$batas";
        } elseif (isset($_GET['p'])) {
            $product_ins_type = $_GET['p'];

            $sql = "SELECT * FROM wbpl_product WHERE nama_instype='$product_ins_type'
            limit $posisi,$batas ";
        } else {
            $sql = "SELECT * FROM wbpl_product LIMIT $posisi,$batas";
        }

        $hasil = $mysqli->query($sql);

        while ($get_data = $hasil->fetch_array()) {
            ?>

        <h4><?php echo $get_data['nama_product']?></h4>
        <div class="image_wrapper image_fl"><img class="img-polaroid" src="
        <?php
        $imagee = $get_data['image'];
            if ($imagee == '') {
                echo 'admin/image/Image Not Available.jpg';
            } else {
                ?>
        admin/image/<?php echo $get_data['image'];
            } ?>" alt="Image Not Avaible" width="150px" heigth="150px">
        </div>

        <table>
            <tr>
                <td>Product ID</td>
                <td>: <?php echo $get_data['kd_product']?></td>
            </tr>
            <tr>
                <td>Brand</td>
                <td>: <?php echo $get_data['nama_brand']?></td>
            </tr>
            <tr>
                <td>Instrument Type</td>
                <td>: <?php echo $get_data['nama_instype']?></td>
            </tr>
            <tr>
                <td>Price</td>
                <td>: Rp. <?php echo $get_data['price']?></td>
            </tr>
            <tr>
                <td>Stock</td>
                <td>: <?php
                        $product_stock = $get_data['stock'];
            if ($product_stock == 0) {
                echo 'Stock Not Avaible';
            } else {
                echo $get_data['stock'];
            } ?>
                </em></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="index.php?page=cart&view=cart&action=add&id=<?php echo $get_data['kd_product']?>" class="btn btn-inverse floatRight">Add to cart</a></td>
            </tr>
        </table>

        <br><br>
        <strong>Description</strong>

        <p style="text-align: justify;">
            <?php echo $get_data['deskripsi']; ?>
        </p>

        <div class="clearfix"></div>

        <br><br>
        <?php
        }

        //=============CUT HERE====================================
        if (isset($_GET['id'])) {
            $product_brand = $_GET['id'];
            $tampil2 = $mysqli->query("select * from wbpl_product where nama_brand='$product_brand'");

            $jmldata = $tampil2->num_rows;
            $jumlah_halaman = ceil($jmldata / $batas);

            echo '<br> <br> Halaman :';
            for ($i = 1; $i <= $jumlah_halaman; $i++) {
                if ($i != $halaman) {
                    echo '<a href=index.php?page=product&view=detail&id='.$product_brand."&halaman=$i> $i</a> | ";
                } else {
                    echo "<b> $i</b> | ";
                }
            }
        } elseif (isset($_GET['p'])) {
            $product_ins_type = $_GET['p'];
            $tampil2 = $mysqli->query("select * from wbpl_product where nama_instype='$product_ins_type'");

            $jmldata = $tampil2->num_rows;
            $jumlah_halaman = ceil($jmldata / $batas);

            echo '<br> <br> Halaman :';
            for ($i = 1; $i <= $jumlah_halaman; $i++) {
                if ($i != $halaman) {
                    echo '<a href=index.php?page=product&view=detail&p='.$product_ins_type."&halaman=$i> $i</a> | ";
                } else {
                    echo "<b> $i</b> | ";
                }
            }
        }

        $tampil2->close();
        ?>

        <br>
        Jumlah data: <?php echo $jmldata;
    break;
}?>
