<?php
session_start();
include("connect.php");
$kode_transaksi = (isset($_POST['id_transaksi'])) ? htmlentities($_POST['id_transaksi']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";
$catatan = (isset($_POST['catatan'])) ? htmlentities($_POST['catatan']) : "";
if (!empty($_POST['validate_edit_order'])) {
  $select = mysqli_query($db, "select * from tb_transaksi where id_transaksi='$kode_transaksi'");

  $query = mysqli_query($db, "update tb_transaksi set pelanggan='$pelanggan',catatan ='$catatan' where id_transaksi = '$kode_transaksi'");
  if (!$query) {
    $pesan = '<script>
    alert("gagal");
        window.location = "../pencatatan"
    </script>';

  } else {
    $pesan = '<script>
    alert("berhasil");
     window.location = "../pencatatan"
     </script>';
  }
}
echo "" . $pesan . "";
?>