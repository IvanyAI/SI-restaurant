<?php
session_start();
include("connect.php");
$kode_transaksi = (isset($_POST['id_transaksi'])) ? htmlentities($_POST['id_transaksi']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";
$catatan = (isset($_POST['catatan'])) ? htmlentities($_POST['catatan']) : "";
$menu = (isset($_POST['menu'])) ? htmlentities($_POST['menu']) : "";
$jumlah = (isset($_POST['jumlah'])) ? htmlentities($_POST['jumlah']) : "";
if (!empty($_POST['input_transaksi_item'])) {
  $select = mysqli_query($db, "select * from tb_list_transaksi where menu='$menu' && transaksi ='$kode_transaksi'");
  if (mysqli_num_rows($select) > 0) {
    $pesan = '<script>
      alert("Item yang dimasukkan sudah ada!");
 window.location = "../?x=pencatatanitem&pencatatan=' . $kode_transaksi . '&pelanggan=' . $pelanggan . '";
      </script>';
  } else {
    $query = mysqli_query($db, "INSERT INTO tb_list_transaksi (menu,transaksi,jumlah,catatan) values ('$menu','$kode_transaksi','$jumlah','$catatan')");
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
}
?>