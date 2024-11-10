<?php
include("proses/connect.php");
date_default_timezone_set('Asia/Jakarta');
$query = mysqli_query($db, "SELECT tb_transaksi.*,tb_bayar.*, nama, SUM(harga*jumlah) AS harganya FROM tb_transaksi LEFT JOIN tb_akun ON tb_akun.id = tb_transaksi.kasir
LEFT JOIN tb_list_transaksi on tb_list_transaksi.transaksi = tb_transaksi.id_transaksi
LEFT JOIN tb_menu ON tb_menu.id = tb_list_transaksi.menu
LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_transaksi.id_transaksi
GROUP BY id_transaksi ORDER BY waktu_transaksi DESC");
while ($record = mysqli_fetch_array($query)) {
  $result[] = $record;
}
?>
<div class="col-lg-9 mt-3">
  <div class="card">
    <div class="card-header">
      Halaman Pencatatan
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col d-flex justify-content-end">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahMenu">Tambah
            Transaksi</button>
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
                      <input type="text" class="form-control" id="pelanggan" placeholder="name pelanggan"
                        name="pelanggan" required>
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
      <?php
      foreach ($result as $row) {
        ?>
        <!-- View Modal -->
        <!-- End View Modal -->
        <!--  Edit Modal -->
        <div class="modal fade" id="ModalEditTransaksi<?php echo $row['id_transaksi'] ?>" tabindex=" -1"
          aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-fullscreen-md-down">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="needs-validation" novalidate action="proses/edit_transaksi.php" method="post">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="id_transaksi" name="id_transaksi"
                          value="<?php echo $row['id_transaksi'] ?>" readonly>
                        <label for="id_transaksi">Kode Transaksi</label>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="pelanggan" placeholder="name pelanggan"
                          name="pelanggan" required value="<?php echo $row['pelanggan'] ?>">
                        <label for="pelanggan">Pelanggan</label>
                        <div class="invalid-feedback">
                          Masukkan Nama Pelanggan!
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" name="validate_edit_order" value="1234">Simpan
                      Transaksi</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
        <!-- End Edit Modal -->
        <!--  Hapus Modal -->
        <div class="modal fade" id="ModalHapusTransaksi<?php echo $row['id_transaksi'] ?>" tabindex="-1"
          aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-fullscreen-md-down">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Akun</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="needs-validation" novalidate action="proses/hapus_transaksi.php" method="post">
                  <input type="hidden" value="<?php echo $row['id_transaksi'] ?>" name="id_transaksi">
                  <div class="col-lg-12">
                    Apakah anda ingin menghapus transaksi atas nama<b> <?php echo $row['pelanggan'] ?></b> dengan kode
                    transaksi <?php echo $row['id_transaksi'] ?>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="hapus_transaksi" value="1234">Hapus</button>
                  </div>
              </div>
              </form>


            </div>
          </div>
        </div>
        <!-- End Hapus Modal -->

        <?php
      }
      if (empty($result)) {

        echo "Data menu tidak ada,silahkan menambah menu!";
      } else {


        ?>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr class="text-nowrap">
                <th scope="col">NO</th>
                <th scope="col">Kode Transaksi</th>
                <th scope="col">Pelanggan</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Kasir</th>
                <th scope="col">status</th>
                <th scope="col">waktu order</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($result as $row) {
                ?>
                <tr>
                  <th scope="row"><?php echo $no++ ?></th>
                  <td><?php echo $row['id_transaksi'] ?></td>
                  <td><?php echo $row['pelanggan'] ?>
                  </td>
                  <td><?php echo number_format((int) $row['harganya'], 0, ',', '.') ?></td>
                  <td><?php echo $row['nama'] ?></td>
                  <td><?php echo (!empty($row['id_bayar'])) ? "<span class='badge text-bg-success'>dibayar</span>" : " "; ?>
                  </td>
                  <td><?php echo $row['waktu_transaksi'] ?></td>
                  <td>
                    <div class="d-flex">
                      <a class="btn btn-info me-1"
                        href="./?x=pencatatanitem&pencatatan=<?php echo $row['id_transaksi'] . "&pelanggan=" . $row['pelanggan'] ?>"><i
                          class="bi bi-eye"></i></a>
                      <button
                        class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary me-1 disabled" : "btn btn-warning"; ?>  "
                        data-bs-toggle="modal" data-bs-target="#ModalEditTransaksi<?php echo $row['id_transaksi'] ?>"><i
                          class="bi bi-pencil"></i></button>
                      <button
                        class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary me-1 disabled" : "btn btn-danger"; ?> "
                        data-bs-toggle="modal" data-bs-target="#ModalHapusTransaksi<?php echo $row['id_transaksi'] ?>"><i
                          class="bi bi-trash3"></i></button>
                    </div>
                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      <?php } ?>
    </div>
  </div>
</div>