<?php
include("connect.php");
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
if (!empty($_POST['validate_input'])) {
  $query = mysqli_query($db, "DELETE FROM tb_menu where id = '$id'");
  if ($query) {

    $pesan = "<script>
    alert('berhasil');
     window.location = '../menu';
     </script>";
  } else {
    $pesan = '<script>
    alert("gagal dihapus");
         window.location = "../menu";
    </script>';
  }
  echo "" . $pesan . "";
}
?>