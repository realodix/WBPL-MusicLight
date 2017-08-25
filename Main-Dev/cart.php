<?php

if(isset($_SESSION['username'])){
    $view = $_GET['view'];

    switch ($view) {
        case 'cart' :
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


        <?php
        if(isset($_GET['kirim'])){
        ?>
        <h3 id="fpb">Form Pengiriman barang</h3>
        <form id="form1" name="form1" method="post" action="pemesan_add.php">
        <td>
        <table>
        <?php
        $asdf = $_SESSION['username'];
        $sql="select * from wbpl_member
        where username='$asdf'";
        $hasil=mysql_query($sql) or die(mysql_error());

        while($rows=mysql_fetch_array($hasil)){
        ?>
        <tr>
        <td width="120"><b>Nama</b></td>
        <td width="350">
        <input name="Nama" type="text" id="Nama" size="40" value=" <?php echo $rows['name'] ?>" />
        </td>
        </tr>
        <tr>
        <td width="120"><b>Alamat</b></td>
        <td width="350">
        <input name="Alamat" type="text" id="Alamat" size="40" value=" <?php echo $rows['address'] ?>"/>
        </td>
        </tr>
        <tr>
        <td width="120"><b>No. Telepon</b></td>
        <td width="350">
        <input name="No_telp" type="text" id="No_telp" size="40" value=" <?php echo $rows['phone'] ?>"/>
        </td>
        </tr>
        <tr>
        <td width="120"><b>E-Mail</b></td>
        <td width="350">
        <input name="Email" type="Email" id="Email" size="40" value=" <?php echo $rows['email'] ?>"/>
        </td>
        </tr>
        <?php }?>
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

        <?php
        break;

        case 'finish':
        //$id_kota = $_SESSION['id_kota'];
        $id_kota = isset($_SESSION['id_kota'])?$_SESSION['id_kota']:false;
        //$kd_pesan=$_SESSION['kd_pesan'];
        $kd_pesan = isset($_SESSION['kd_pesan'])?$_SESSION['kd_pesan']:false;
        //echo "nama kota:".$id_kota;
        //echo "SESSION KOTA:".$_SESSION['id_kota'];
        $get_data = mysql_query("select biaya from biaya_kirim where id_kota='$id_kota'") or die(mysql_error());
        $biaya = mysql_fetch_array($get_data);
        $biaya = $biaya['biaya'];
        $totalBayar = $_SESSION['totalbayar'];
        ?>

        <h3>Selamat,Transaksi sukses di lakukan</h2>
        <h3>Kode Pesan : <?php echo $kd_pesan;?></h2>
        <h3>Total Harga : Rp. <?php echo $totalBayar;?></h2>
        <h3>Biaya kirim : Rp. <?php echo $biaya;?></h2>
        <h3>Total Transfer: Rp. <?php echo ($totalBayar+$biaya); ?></h2>
        <p>Silahkan transfer uangnya yaa... ^_^</p>

        <hr>
        <p>Konfirmasi pembayaran dapat anda lakukan di menu konfirmasi pembayaran, setelah anda melakukan
        Transfer uang ke rekening kami</p>

    <?php
        break;
    }

}else{
    echo "Kamu harus login terlebih dahulu.";
}
?>
