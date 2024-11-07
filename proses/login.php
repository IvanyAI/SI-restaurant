<?php
session_start();
include("connect.php");
$email = (isset($_POST['email'])) ? htmlentities($_POST['email']) : "";
$password = (isset($_POST["password"])) ? md5(htmlentities($_POST["password"])) : "";
if (!empty($_POST['submit_validate'])) {
  $query = mysqli_query($db, "SELECT * FROM tb_akun where email = '$email' and password = '$password'");
  $hasil = mysqli_fetch_array($query);
  if ($hasil) {
    $_SESSION['email_rm'] = $email;
    $_SESSION['level_rm'] = $hasil['level'];
    header('location:../home');
  } else { ?>
    <script>
      alert('Email atau password anda salah!');
      window.location = '../login'
    </script>
    <?php
  }
}
?>