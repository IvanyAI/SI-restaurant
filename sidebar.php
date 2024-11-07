<div class="col-lg-3">
  <nav class="navbar navbar-expand-lg bg-body-tertiary rounded-3 border mt-3">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
        aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel"
        style="width:250px">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Pilihan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1 ">
            <li class="nav-item">
              <a class="nav-link  ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'halamanutama') || !isset($_GET['x']) ? 'active link-light' : 'link-dark'; ?>"
                aria-current="page" href="halamanutama"><i class="bi bi-kanban"></i> Halaman Utama</a>
            </li>
            <?php if ($hasil['level'] == 2) { ?>
              <li class="nav-item">
                <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'pencatatan') ? 'active link-light' : 'link-dark'; ?>"
                  href="pencatatan"><i class="bi bi-clipboard-check"></i> Pencatatan</a>
              </li><?php } ?>
            <?php if ($hasil['level'] == 1) { ?>
              <li class="nav-item">
                <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'menu') ? 'active link-light' : 'link-dark'; ?>"
                  href="menu"><i class="bi bi-list"></i> Daftar Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'kategori') ? 'active link-light' : 'link-dark'; ?>"
                  href="kategori"><i class="bi bi-card-list"></i> Kategori Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'akun') ? 'active link-light' : 'link-dark'; ?>"
                  href="akun"><i class="bi bi-person-badge"></i> Akun</a>
              </li>
              <li class="nav-item">
                <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'laporan') ? 'active link-light' : 'link-dark'; ?>"
                  href="laporan"><i class="bi bi-bar-chart"></i> Laporan</a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</div>