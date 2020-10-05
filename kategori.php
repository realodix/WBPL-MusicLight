
<ul>
<?php

    include 'wbpl-function.php';

    /**
     * Kategori Brand
     */
    $kat = 'SELECT wbpl_brand.nama_brand, wbpl_brand.kd_brand,
            COUNT(wbpl_product.nama_brand) AS jumlah
            FROM wbpl_brand, wbpl_product
            WHERE wbpl_product.nama_brand = wbpl_brand.nama_brand
            GROUP BY wbpl_brand.nama_brand, wbpl_brand.kd_brand';

    $hasil = $mysqli->query($kat);

    while ($get_data = $hasil->fetch_array()) {
        ?>

    <li>
        <a href="index.php?page=product&view=detail&id=<?php echo $get_data['nama_brand']?>">
        <?php
        echo $get_data['nama_brand'];
        echo ' ('.$get_data['jumlah'].')'; ?>
        <!--(<?php echo $get_data['jumlah']?>)-->
        </a>
    </li>
    <?php
    }
    ?>
</ul>

<h3>Instrument Type</h3>
<ul>
    <?php
    /**
     * Instrument Type
     */
    $kat = 'SELECT wbpl_instype.nama_instype,wbpl_instype.kd_instype,
            COUNT(wbpl_product.kd_product) AS jumlah
            FROM wbpl_instype, wbpl_product
            WHERE wbpl_product.nama_instype=wbpl_instype.nama_instype
            GROUP by wbpl_instype.nama_instype,wbpl_instype.kd_instype';

    $hasil = $mysqli->query($kat);

    while ($get_data = $hasil->fetch_array()) {
        ?>

    <li>
        <a href="index.php?page=product&view=detail&p=<?php echo $get_data['nama_instype']    ?>">
        <?php
        echo $get_data['nama_instype'];
        echo ' ('.$get_data['jumlah'].')'; ?>
        </a>
    </li>
    <?php
    }
    ?>
</ul>
