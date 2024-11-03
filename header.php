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
                <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Setting </a></li>
                <li><a class="dropdown-item" href="logout"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
              </ul>
            </li>
      </ul>
    </div>
  </div>
</nav>