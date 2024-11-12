<?php
session_start();
include("connect.php");
$nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$nohp = (isset($_POST['nohp'])) ? htmlentities($_POST['nohp']) : "";
if (!empty($_POST['edit_profile_validate'])) {
  $query = mysqli_query($db, "UPDATE tb_akun set nama = '$nama',nohp='$nohp' where email = '$_SESSION[email_rm]'");
  if ($query) {
    $pesan = '<script>
        alert("Berhasil mengganti profile");
         window.history.back();
         </script>';
  } else {
    $pesan = '<script>
        alert("Gagal mengganti profile");
         window.history.back();
         </script>';
  }
} else {
  $pesan = '<script>
  alert("Terjadi kesalahan");
   window.history.back();
   </script>';
}
echo "" . $pesan . "";
?>