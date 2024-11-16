<?php
include("connect.php");
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
if (!empty($_POST['validate_input'])) {
  try {
    $query = mysqli_query($db, "DELETE FROM tb_akun where id = '$id'");
    if ($query) {

      $pesan = "<script>
      alert('berhasil');
       window.location = '../akun';
       </script>";
    } else {
      $pesan = '<script>
      alert("gagal diupdate");
      </script>';
    }

  } catch (mysqli_sql_exception $e) {
    $pesan = "<script>
    alert('Gagal dihapus: data terkait dengan tabel lain');
    window.location = '../akun';
    </script>";
  }
  echo "" . $pesan . "";
}
?>