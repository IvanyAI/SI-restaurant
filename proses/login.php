<?php
session_start();
include("connect.php");

class Proses
{
  private $db;

  public function __construct($db)
  {
    $this->db = $db;
  }

  public function login($email, $password)
  {

    $email = mysqli_real_escape_string($this->db, $email);
    $password = mysqli_real_escape_string($this->db, $password);

    $query = "SELECT * FROM tb_akun WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($this->db, $query);
    $hasil = mysqli_fetch_assoc($result);

    if ($hasil) {
      $_SESSION['email_rm'] = $email;
      $_SESSION['level_rm'] = $hasil['level'];
      $_SESSION['id_rm'] = $hasil['id'];
      if ($_SESSION['level_rm'] == 3) {
        echo "<script>
                    alert('Kamu berhasil masuk!');
                    window.location = '../pemesanan';
                    </script>";
      } else {
        echo "<script>
        alert('Kamu berhasil masuk!');
        window.location = '../home';
        </script>";
      }

    } else {
      echo "<script>
                    alert('Email atau password anda salah!');
                    window.location = '../login';
                  </script>";
    }
  }

  public function register($nama, $email, $password)
  {

    $nama = mysqli_real_escape_string($this->db, $nama);
    $email = mysqli_real_escape_string($this->db, $email);
    $password = mysqli_real_escape_string($this->db, $password);

    $checkEmailQuery = "SELECT * FROM tb_akun WHERE email = '$email'";
    $checkResult = mysqli_query($this->db, $checkEmailQuery);

    if (mysqli_num_rows($checkResult) > 0) {
      echo "<script>
              alert('Email yang dimasukkan telah ada!');
              window.location = '../register';
            </script>";
    } else {
      $query = "INSERT INTO tb_akun (nama, email, password, level) VALUES ('$nama', '$email', '$password', 3)";
      $result = mysqli_query($this->db, $query);

      if ($result) {
        echo "<script>
                        alert('Akun berhasil dibuat, silahkan Masuk!');
                        window.location = '../register';
                      </script>";
      } else {
        echo "<script>
                        alert('Email atau password anda tidak sesuai!');
                        window.location = '../register';
                      </script>";
      }
    }
  }

  public function logout()
  {
    session_destroy();
    header('location:login');
  }

  public function resetPassword($id)
  {

    $id = mysqli_real_escape_string($this->db, $id);

    $query = "UPDATE tb_akun SET password = md5('12345') WHERE id = '$id'";
    $result = mysqli_query($this->db, $query);

    if ($result) {
      echo "<script>
                alert('Password berhasil direset');
                window.location = '../akun';
              </script>";
    } else {
      echo "<script>
                alert('Password gagal direset');
              </script>";
    }
  }
}


if (!empty($_POST['resvalidate_input']) && isset($_POST['id'])) {
  $id = htmlentities($_POST['id']);

  $proses = new Proses($db);
  $proses->resetPassword($id);
}


if (!empty($_POST['submit_validate']) && isset($_POST['email'], $_POST['password'])) {
  $email = htmlentities($_POST['email']);
  $password = md5(htmlentities($_POST['password']));

  $proses = new Proses($db);
  $proses->login($email, $password);
}


if (!empty($_POST['submitreg_validate']) && isset($_POST['nama'], $_POST['email'], $_POST['password'])) {
  $nama = htmlentities($_POST['nama']);
  $email = htmlentities($_POST['email']);
  $password = md5(htmlentities($_POST['password']));

  $proses = new Proses($db);
  $proses->register($nama, $email, $password);
}


if (isset($_GET['logout'])) {
  $proses = new Proses($db);
  $proses->logout();
}
?>