<?php
session_start();
include("connect.php");
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$kode_transaksi = (isset($_POST['id_transaksi'])) ? htmlentities($_POST['id_transaksi']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";
$catatan = (isset($_POST['catatan'])) ? htmlentities($_POST['catatan']) : "";
$menu = (isset($_POST['menu'])) ? htmlentities($_POST['menu']) : "";
$jumlah = (isset($_POST['jumlah'])) ? htmlentities($_POST['jumlah']) : "";
if (!empty($_POST['edit_transaksi_item'])) {
  $query = mysqli_query($db, "UPDATE  tb_list_transaksi SET menu='$menu',jumlah='$jumlah',catatan='$catatan' WHERE id_list='$id'");
  if (!$query) {
    $pesan = '<script>
    alert("gagal");
   window.location = "../?x=pencatatanitem&pencatatan=' . $kode_transaksi . '&pelanggan=' . $pelanggan . '";</script>';

  } else {
    $pesan = '<script>
    alert("berhasil");
     window.location = "../?x=pencatatanitem&pencatatan=' . $kode_transaksi . '&pelanggan=' . $pelanggan . '";</script>';
  }
}
echo "" . $pesan . "";
?>