<?php
session_start();
include("connect.php");
$kode_transaksi = (isset($_POST['id_transaksi'])) ? htmlentities($_POST['id_transaksi']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";

if (!empty($_POST['validate_input_order'])) {
  $select = mysqli_query($db, "select * from tb_transaksi where id_transaksi='$kode_transaksi'");
  if (mysqli_num_rows($select) > 0) {
    $pesan = "<script>
      alert('Order yang dimasukkan sudah ada!');
      window.location = '../pencatatan';
      </script>";
  } else {
    $query = mysqli_query($db, "INSERT INTO tb_transaksi (id_transaksi,pelanggan,kasir) values ('$kode_transaksi','$pelanggan','$_SESSION[id_rm]')");
    if (!$query) {
      $pesan = '<script>
    alert("gagal");
   
    </script>';

    } else {
      $pesan = '<script>
    alert("berhasil");
     window.location = "../?x=pencatatanitem&pencatatan=' . $kode_transaksi . '&pelanggan=' . $pelanggan . '";</script>';
    }
  }
  echo "" . $pesan . "";
}
?>