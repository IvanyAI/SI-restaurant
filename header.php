<nav class="navbar navbar-expand bg-body-tertiary sticky-top">
      <div class="container-lg">
        <a class="navbar-brand" href="."><i class="bi bi-tags"></i> Rumah Makan</a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item dropdown ">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <b><?php echo $hasil['nama'];?></b>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#"><i class="bi bi-person"></i> Profile</a></li>
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ModalUbahPassword"><i class="bi bi-key"></i> Ubah Password </a></li>
                <li><a class="dropdown-item" href="logout"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
              </ul>
            </li>
      </ul>
    </div>
  </div>
</nav>

<!--  Edit Modal -->
<div class="modal fade" id="ModalUbahPassword"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg modal-fullscreen-md-down">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Password Akun</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="needs-validation" novalidate action="proses/edit_password.php" method="post">
      <div class="row">
      <div class="col-lg-6">
<div class="form-floating mb-3">
  <input type="email" disabled class="form-control" id="floatingInput" placeholder="name@example.com"  name="email" value="<?php echo $_SESSION['email_rm']?>" required>
  <label for="floatingInput">Email</label>
  <div class="invalid-feedback">
      Masukkan Email yang valid!
    </div>
  </div>
</div>
<div class="col-lg-6">
<div class="form-floating mb-3">
  <input type="password"  class="form-control" id="floatingPassword"   name="passwordlama" required >
  <label for="floatingInput">Password lama</label>
  <div class="invalid-feedback">
      Masukkan Password lama!
    </div>
</div>
</div>
</div>
      <div class="row">

      <div class="col-lg-6">
<div class="form-floating mb-3">
  <input type="password"  class="form-control" id="floatingPassword"  name="passwordbaru" required>
  <label for="floatingInput">Password Baru</label>
  <div class="invalid-feedback">
      Masukkan Passsword baru!
    </div>
  </div>
</div>
<div class="col-lg-6">
<div class="form-floating mb-3">
  <input type="password"  class="form-control" id="floatingPassword"   name="repasswordbaru" required >
  <label for="floatingInput">Masukkan sekali lagi</label>
  <div class="invalid-feedback">
      Masukkan Password baru sekali lagi!
    </div>
</div>
</div>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="edit_pass_validate" value="1234">Save changes</button>
      </div>
</form>
      </div>
      
    </div>
  </div>
</div>
<!-- End Edit Modal -->