<?

//$id_kota = $_SESSION['id_kota'];
$id_kota = isset($_SESSION['id_kota'])?$_SESSION['id_kota']:false;
//$kd_pesan=$_SESSION['kd_pesan'];
$kd_pesan = isset($_SESSION['kd_pesan'])?$_SESSION['kd_pesan']:false;
//echo "nama kota:".$id_kota;
//echo "SESSION KOTA:".$_SESSION['id_kota'];
$get_data = mysql_query("select biaya from biaya_kirim where id_kota='$id_kota'") or die(mysql_error());
$biaya = mysql_fetch_array($get_data);
$biaya = $biaya['biaya'];
//$totalBayar = $_SESSION['totalbayar'];
$totalBayar = isset($_SESSION['totalBayar'])?$_SESSION['totalBayar']:false;
?>

<h3> Selamat,Transaksi sukses di lakukan</h2>
<h3> Kode Pesan :<?=$kd_pesan;?></h2>
<h3>Total Harga :<?=  $totalBayar;?></h2>
<h3> Biaya kirim :<?=$biaya;?></h2>
<h3>Total Transfer:<?=($totalBayar+$biaya)
?></h2>
<p>
	Silahkan transfer uangnya yaa... ^_^
</p>

<hr>
<p>
	Konfirmasi pembayaran dapat anda lakukan di menu konfirmasi pembayaran, setelah anda melakukan
	Transfer uang ke rekening kami
</p>
<?
session_destroy();
?>