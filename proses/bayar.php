<?php
session_start();
include("connect.php");
$kode_transaksi = (isset($_POST['id_transaksi'])) ? htmlentities($_POST['id_transaksi']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";
$total = (isset($_POST['total'])) ? htmlentities($_POST['total']) : "";
$uang = (isset($_POST['uang'])) ? htmlentities($_POST['uang']) : "";
$kembali = $uang - $total;

if (!empty($_POST['bayar'])) {
  if ($kembali < 0) {
    $pesan = '<script>
      alert("Nominal uang tidak cukup!");
 window.location = "../?x=pencatatanitem&pencatatan=' . $kode_transaksi . '&pelanggan=' . $pelanggan . '";
      </script>';
  } else {
    $query = mysqli_query($db, "INSERT INTO tb_bayar (id_bayar,nominal_uang,total_bayar) values ('$kode_transaksi ','$uang','$total')");
    if (!$query) {
      $pesan = '<script>
    alert(" Pembayaran gagal");
   window.location = "../?x=pencatatanitem&pencatatan=' . $kode_transaksi . '&pelanggan=' . $pelanggan . '";</script>';

    } else {
      $pesan = '<script>
    alert(" Pembayaran berhasil \nKembalian Rp.' . $kembali . '");
     window.location = "../?x=pencatatanitem&pencatatan=' . $kode_transaksi . '&pelanggan=' . $pelanggan . '";</script>';
    }
  }
}

echo "" . $pesan . "";

?>