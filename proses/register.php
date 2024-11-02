<?php
session_start();
include("connect.php");
$nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$email = (isset($_POST['email'])) ? htmlentities($_POST['email']) : "";
$password = (isset($_POST["password"])) ? md5(htmlentities( $_POST["password"]))  : "";
if (!empty($_POST['submit_validate'])){
  $query = "INSERT INTO tb_akun (nama,email,password,level) values ('$nama','$email','$password', 3)";
  if ($db->query($query)){ ?>
  <script>
    alert('Akun berhasil dibuat,silahkan Masuk!');
    window.location = '../register'
  </script>
  <?php
    // header('location:../login');
  }else { ?>
  <script>
    alert('Email atau password anda tidak sesuai!');
    window.location = '../register'
  </script>
<?php
  }
}
?>