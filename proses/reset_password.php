<?php
include("connect.php");
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
if (!empty($_POST['validate_input'])) {
  $query = mysqli_query($db, "UPDATE tb_akun  SET password = md5('12345') where id = '$id'");
  if ($query) {

    $pesan = "<script>
    alert('Password berhasil direset');
     window.location = '../akun';
     </script>";
  } else {
    $pesan = '<script>
    alert("Password gagal direset");
    </script>';
  }
  echo "" . $pesan . "";
}
?>