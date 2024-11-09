<?php
include("connect.php");
$id_transaksi = (isset($_POST['id_transaksi'])) ? htmlentities($_POST['id_transaksi']) : "";
if (!empty($_POST['hapus_transaksi'])) {
  $select = mysqli_query($db, "SELECT transaksi from tb_list_transaksi WHERE transaksi = '$id_transaksi'");
  if (mysqli_num_rows($select) > 0) {
    $pesan = '<script>
    alert("Transaksi telah memiliki item transaksi,data tidak bisa dihapus ");
      window.location = "../pencatatan";
    </script>';
  } else {
    $query = mysqli_query($db, "DELETE FROM tb_transaksi where id_transaksi = '$id_transaksi'");
    if ($query) {

      $pesan = "<script>
    alert('berhasil');
     window.location = '../pencatatan';
     </script>";
    } else {
      $pesan = '<script>
    alert("gagal diupdate");
      window.location = "../pencatatan";
    </script>';
    }
  }
  echo "" . $pesan . "";
}
?>