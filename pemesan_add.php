<?php

session_start();

require_once 'wbpl-function.php';

session_start();
$id_kota = [];
session_start();
$kdPesan = [];

//data dari user
if (isset($_POST['tambah'])) {
    /* menambahkan kode pesan dan detail pesan kedalam database*/
    $kode_pesan = kode_pesan();
    $_SESSION['kd_pesan'] = $kode_pesan;

    insertToDB($kode_pesan);

    $Nama = $_POST['Nama'];
    $Alamat = $_POST['Alamat'];
    $kd_pos = $_POST['kd_pos'];
    $No_telp = $_POST['No_telp'];
    $Email = $_POST['Email'];
    $id_kota = $_POST['id_kota'];
    $_SESSION['id_kota'] = $id_kota;
    $kdCustomer = kode_customer();

    $sql = "INSERT INTO customer(kd_pemesan,Nama,Alamat,kd_pos,No_telp,Email,id_kota,kd_pesan)
        VALUES('$kdCustomer', '$Nama', '$Alamat','$kd_pos','$No_telp','$Email','$id_kota','$kode_pesan')";

    $result = $mysqli->query($sql);

    $_SESSION['cart'] = '';
    //check if query successful

    if ($result) {
        header('location:index.php?page=cart&view=finish');
    } else {
        header('location:index.php?page=cart&view=cart');
    }
    mysql_close();
}
