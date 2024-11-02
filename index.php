
  <?php
  if (isset($_GET['x']) && $_GET['x']=='halamanutama'){
    $page = 'home.php';
    include "main.php";
  }elseif (isset($_GET['x']) && $_GET['x']=='menu'){
    $page = 'menu.php';
    include "main.php";
  }
  elseif (isset($_GET['x']) && $_GET['x']=='kategori'){
    $page = 'kategori.php';
    include "main.php";
  }elseif (isset($_GET['x']) && $_GET['x']=='laporan'){
    $page = 'laporan.php';
    include "main.php";
  }elseif (isset($_GET['x']) && $_GET['x']=='akun'){
    $page = 'akun.php';
    include "main.php";
  }elseif (isset($_GET['x']) && $_GET['x']=='login'){
    include "login.php";
  }elseif (isset($_GET['x']) && $_GET['x']=='logout'){
    include "proses/logout.php";
  }else {
    $page = 'home.php';
    include "main.php";
  }
  ?>
