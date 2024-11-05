<?php
include("connect.php");
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$email = (isset($_POST['email'])) ? htmlentities($_POST['email']) : "";
$nohp = (isset($_POST['nohp'])) ? htmlentities($_POST['nohp']) : "";
$level = (isset($_POST['level'])) ? htmlentities($_POST['level']) : "";
if(!empty($_POST['validate_input'])){
  $select = mysqli_query($db, "select * from tb_akun where email='$email'" );
  if(mysqli_num_rows($select) > 0){  
    $pesan = "<script>
      alert('Email yang dimasukkan sudah ada!');
      window.location = '../akun';
      </script>";
  }else {
  $query = mysqli_query($db, "UPDATE tb_akun set nama = '$nama', email = '$email', nohp='$nohp',level = '$level' where id = '$id'");
  if($query){
    
    $pesan = "<script>
    alert('berhasil');
     window.location = '../akun';
     </script>";
  }else {
    $pesan = '<script>
    alert("gagal diupdate");
    </script>';
  }
}
  echo"".$pesan."";
}
?>