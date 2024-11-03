<?php
include("connect.php");
$nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$email = (isset($_POST['email'])) ? htmlentities($_POST['email']) : "";
$nohp = (isset($_POST['nohp'])) ? htmlentities($_POST['nohp']) : "";
$level = (isset($_POST['level'])) ? htmlentities($_POST['level']) : "";
$password = md5('password');
if(!empty($_POST['validate_input'])){
  $query = mysqli_query($db, "INSERT INTO tb_akun (nama,email,password,nohp,level) values ('$nama','$email','$password','$nohp','$level')");
  if(!$query){
    $pesan = '<script>
    alert("gagal");
   
    </script>';
    
  }else {
    $pesan = "<script>
    alert('berhasil');
     window.location = '../akun';
     </script>";
  }
  echo"".$pesan."";
}
?>