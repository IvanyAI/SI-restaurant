<?php
include("connect.php");
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$kode_transaksi = (isset($_POST['id_transaksi'])) ? htmlentities($_POST['id_transaksi']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";
if (!empty($_POST['hapus_transaksiitem'])) {
  $query = mysqli_query($db, "DELETE FROM tb_list_transaksi where id_list = '$id'");
  if ($query) {
    $pesan = '<script>
    alert("berhasil");
     window.location = "../?x=pencatatanitem&pencatatan=' . $kode_transaksi . '&pelanggan=' . $pelanggan . '";</script>';
  } else {
    $pesan = '<script>
    alert("gagal diupdate");
     window.location = "../?x=pencatatanitem&pencatatan=' . $kode_transaksi . '&pelanggan=' . $pelanggan . '";</script>';
  }
}
echo "" . $pesan . "";

?>