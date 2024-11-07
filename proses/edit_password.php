<?php
session_start();
include("connect.php");
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$passwordlama = (isset($_POST['passwordlama'])) ? md5(htmlentities($_POST['passwordlama'])) : "";
$passwordbaru = (isset($_POST['passwordbaru'])) ? md5(htmlentities($_POST['passwordbaru'])) : "";
$repasswordbaru = (isset($_POST['repasswordbaru'])) ? md5(htmlentities($_POST['repasswordbaru'])) : "";
if (!empty($_POST['edit_pass_validate'])) {
  $query = mysqli_query($db, "SELECT * FROM tb_akun where email = '$_SESSION[email_rm]' and password = '$passwordlama'");
  $hasil = mysqli_fetch_array($query);
  if ($hasil) {
    if ($passwordbaru == $repasswordbaru) {
      $query = mysqli_query($db, "UPDATE tb_akun set password = '$passwordbaru' where email = '$_SESSION[email_rm]'");
      if ($query) {
        $pesan = '<script>
        alert("Berhasil mengganti password");
         window.history.back();
         </script>';
      } else {
        $pesan = '<script>
        alert("Gagal mengganti password");
         window.history.back();
        </script>';
      }

    } else {
      $pesan = '<script>
        alert(" Password baru tidak sama");
         window.history.back();
        </script>';
    }

  } else {
    $pesan = '<script>
        alert("Password lama tidak benar");
         window.history.back();
        </script>';

  }
} else {
  header('location:home');
}
echo "" . $pesan . "";
?>