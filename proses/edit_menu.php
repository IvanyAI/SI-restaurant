<?php
include("connect.php");
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$nama_menu = (isset($_POST['nama_menu'])) ? htmlentities($_POST['nama_menu']) : "";
$keterangan = (isset($_POST['keterangan'])) ? htmlentities($_POST['keterangan']) : "";
$kategori = (isset($_POST['kategori'])) ? htmlentities($_POST['kategori']) : "";
$harga = (isset($_POST['harga'])) ? htmlentities($_POST['harga']) : "";
// $level = (isset($_POST['level'])) ? htmlentities($_POST['level']) : "";
// $password = md5(htmlentities($_POST["password"]));
$kode_random = rand(10_000, 99_999) . "-";
$target_dir = "../assets/img/" . $kode_random;
$target_file = $target_dir . basename($_FILES['foto']['name']);
$imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (!empty($_POST['validate_input_menu'])) {
  // cek gambar / !
  $cek = getimagesize($_FILES['foto']['tmp_name']);
  if ($cek === false) {
    $message = "ini bukan file gambar";
    $statusUpload = 0;
  } else {
    $statusUpload = 1;
    if (file_exists($target_file)) {
      $message = "filee sudah ada";
      $statusUpload = 0;
    } else {
      if ($_FILES['foto']['size'] > 500000) {
        $message = 'File foto yang diupload terlalu besar';
        $statusUpload = 0;
      } else {
        if ($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && $imageType != "gif") {
          $message = "maaf hanya diperbolehkan gambar yang memiliki formar JPG,PNG,JPEG dan GIF";
          $statusUpload = 0;
        }
      }
    }
  }

  if ($statusUpload == 0) {
    $message = "<script>alert('" . $message . ",gambar tidak dapat diupload!');
               window.location = '../menu';</script>";
  } else {
    $select = mysqli_query($db, "select * from tb_menu where nama_menu='$nama_menu'");
    if (mysqli_num_rows($select) > 0) {
      $message = "<script>alert('nama menu yang dimasukkan telah ada!');
      window.location = '../menu';</script>";
    } else {
      if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
        $query = mysqli_query($db, "UPDATE tb_menu set foto ='" . $kode_random . $_FILES['foto']['name'] . "',nama_menu = '$nama_menu',keterangan='$keterangan',kategori = '$kategori',harga = '$harga' where id='$id' ");
        if ($query) {
          $message = '<script>alert("Berhasil");
          window.location="../menu"</script>';
        } else {
          $message = '<script>alert("Data gagal dimasukkan");
          window.location="../menu"</script>';
        }
      } else {
        $message = '<script>alert("Maaf,terjadi kesalahan file tidak dapat diup");
          window.location="../menu"</script>';
      }
    }
  }

}
echo "" . $message . "";
?>