<?php
session_start();
include("connect.php");
$nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$email = (isset($_POST['email'])) ? htmlentities($_POST['email']) : "";
$password = (isset($_POST["password"])) ? md5(htmlentities($_POST["password"])) : "";
if (!empty($_POST['submit_validate'])) {
  try {
    $query = "INSERT INTO tb_akun (nama,email,password,level) values ('$nama','$email','$password', 3)";
    if ($db->query($query)) {
      $pesan = "<script>
      alert('Akun berhasil dibuat,silahkan Masuk!');
      window.location = '../register'
    </script>";
      // header('location:../login');
    } else {
      $pesan = "<script>
        alert('Email atau password anda tidak sesuai!');
        window.location = '../register'
      </script>";
    }
  } catch (Exception $e) {
    $pesan = "<script>
      alert('Email yang dimasukkan telah ada!');
      window.location = '../register';
      </script>";
  }
  echo "" . $pesan . "";
}


?>