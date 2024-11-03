<?php
  session_start();
  if (isset($_GET['x']) && $_GET['x']=='halamanutama'){
    $page = 'home.php';
    include "main.php";
  }elseif (isset($_GET['x']) && $_GET['x']=='menu'){
    if($_SESSION['level_rm']==1){
      $page = 'menu.php';
      include "main.php";
    }else {
      $page = 'home.php';
      include "main.php";
    }
  }
  elseif (isset($_GET['x']) && $_GET['x']=='kategori'){
    if($_SESSION['level_rm']==1){
      $page = 'kategori.php';
      include "main.php";
    }else {
      $page = 'home.php';
      include "main.php";
    }
  }elseif (isset($_GET['x']) && $_GET['x']=='laporan'){
    if($_SESSION['level_rm']==1){
      $page = 'laporan.php';
      include "main.php";
    }else {
      $page = 'home.php';
      include "main.php";
    }
  }elseif (isset($_GET['x']) && $_GET['x']=='akun'){
    if($_SESSION['level_rm']==1){
      $page = 'akun.php';
      include "main.php";
    }else {
      $page = 'home.php';
      include "main.php";
    }
  }elseif (isset($_GET['x']) && $_GET['x']=='pencatatan'){
    if($_SESSION['level_rm']==2){
      $page = 'pencatatan.php';
      include "main.php";
    }else {
      $page = 'home.php';
      include "main.php";
    }
  }elseif (isset($_GET['x']) && $_GET['x']=='login'){
    include "login.php";
  }elseif (isset($_GET['x']) && $_GET['x']=='logout'){
    include "proses/logout.php";
  }elseif (isset($_GET['x']) && $_GET['x']=='register'){
    include "register.php";
  }else {
    $page = 'home.php';
    include "main.php";
  }
  ?>
