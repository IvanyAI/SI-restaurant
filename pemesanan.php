<?php
include("proses/connect.php");
$query = mysqli_query($db, "SELECT * FROM tb_menu");
while ($record = mysqli_fetch_array($query)) {
  $result[] = $record;
}
?>
<div class="card mt-3">
  <h5 class="card-header bg-body-light">Menu</h5>
  <div class="card-body">
    <div class="container my-4">
      <div class="row g-3">
        <?php
        $no = 1;
        foreach ($result as $row) {
          ?>
          <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100">
              <img src="assets/img/<?php echo $row['foto'] ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['nama_menu'] ?></h5>
                <h6 class="card-title"><?php echo $row['kategori'] ?></h6>
                <p class="card-text"><?php echo $row['keterangan'] ?></p>
                <p class="card-text">Rp.<?php echo $row['harga'] ?></p>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahMenu">Pesan</button>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="ModalTambahMenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-fullscreen-md-down">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Transaksi</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="needs-validation" novalidate action="proses/input_transaksi.php" method="post">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="id_transaksi" name="id_transaksi"
                      value="<?php echo date('ymdHi'), rand(100, 999) ?>" readonly>
                    <label for="id_transaksi">Kode Transaksi</label>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="pelanggan" placeholder="name pelanggan" name="pelanggan"
                      required>
                    <label for="pelanggan">Pelanggan</label>
                    <div class="invalid-feedback">
                      Masukkan Nama Pelanggan!
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" name="validate_input_order" value="1234">Buat
                  Transaksi</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
    <!-- End Transaksi Modal -->