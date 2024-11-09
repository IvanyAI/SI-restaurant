<?php
include("proses/connect.php");
$query = mysqli_query($db, "SELECT *, SUM(harga*jumlah) AS harganya FROM tb_list_transaksi 
LEFT JOIN tb_transaksi on tb_transaksi.id_transaksi = tb_list_transaksi.transaksi
LEFT JOIN tb_menu ON tb_menu.id = tb_list_transaksi.menu
LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_transaksi.id_transaksi
GROUP BY id_list
having tb_list_transaksi.transaksi = $_GET[pencatatan]");
$kode = $_GET["pencatatan"];
$pelanggan = $_GET["pelanggan"];
while ($record = mysqli_fetch_array($query)) {
  $result[] = $record;
  // $kode = $record["id_transaksi"];
  // $pelanggan = $record["pelanggan"];
}
$select = mysqli_query($db, "SELECT id,nama_menu FROM tb_menu");
?>
<div class="col-lg-9 mt-3">
  <div class="card">
    <div class="card-header">
      Halaman Pencatatan Item
    </div>
    <div class="card-body">
      <a href="pencatatan" class="btn btn-info mb-3">Kembali</a>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-floating mb-3">
            <input type="text" disabled class="form-control " id="kodetransaksi" value="<?php echo $kode ?>">
            <label for="uploadFoto">Kode Transaksi</label>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-floating mb-3">
            <input type="text" disabled class="form-control" id="pelanggan" value="<?php echo $pelanggan ?>">
            <label for="uploadFoto">Pelanggan</label>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="tambah_transaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-fullscreen-md-down">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="needs-validation" novalidate action="proses/input_transaksiitem.php" method="post">
              <input type="hidden" name="id_transaksi" value="<?php echo $kode ?>">
              <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
              <div class="row">
                <div class="col-lg-8">
                  <div class="form-floating mb-3">
                    <select class="form-select" name="menu" id="">
                      <option selected hidden value="">Pilih Menu</option>
                      <?php
                      foreach ($select as $value) {
                        echo "<option value=$value[id]>$value[nama_menu]</option>";
                      }
                      ?>
                    </select>
                    <label for="menu"> Menu Makanan</label>
                    <div class="invalid-feedback">
                      Pilih Menu!
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingInput" placeholder="jumlah_porsi"
                      name="jumlah" required>
                    <label for="floatingInput">Jumlah Porsi</label>
                    <div class="invalid-feedback">
                      Masukkan Jumlah Porsi!
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="catatan" name="catatan">
                    <label for="floatingInput">Catatan</label>
                    <div class="invalid-feedback">
                      Masukkan Catatan!
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" name="input_transaksi_item" value="1234">Save
                  changes</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
    <!-- End Modal -->
    <!-- Bayar Modal -->
    <!-- End bAYAR Modal -->
    <?php
    if (empty($result)) {
      echo "Data tidak ada";
    } else {
      foreach ($result as $row) {
        ?>
        <!-- View Modal -->
        <!-- End View Modal -->
        <!--  Edit Modal -->
        <div class="modal fade" id="ModalEditTransaksiItem<?php echo $row['id_list'] ?>" tabindex=" -1"
          aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-fullscreen-md-down">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="needs-validation" novalidate action="proses/edit_transaksiitem.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $row['id_list'] ?>">
                  <input type="hidden" name="id_transaksi" value="<?php echo $kode ?>">
                  <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="form-floating mb-3">
                        <select class="form-select" name="menu" id="">
                          <option selected hidden value="">Pilih Menu</option>
                          <?php
                          foreach ($select as $value) {
                            if ($row['menu'] == $value['id']) {
                              echo "<option selected value=$value[id]>$value[nama_menu]</option>";
                            } else {
                              echo "<option value=$value[id]>$value[nama_menu]</option>";
                            }

                          }
                          ?>
                        </select>
                        <label for="menu"> Menu Makanan</label>
                        <div class="invalid-feedback">
                          Pilih Menu!
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingInput" placeholder="jumlah_porsi"
                          name="jumlah" required value="<?php echo $row['jumlah'] ?>">
                        <label for="floatingInput">Jumlah Porsi</label>
                        <div class="invalid-feedback">
                          Masukkan Jumlah Porsi!
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="catatan" name="catatan"
                          value="<?php echo $row['catatan'] ?>">
                        <label for="floatingInput">Catatan</label>
                        <div class="invalid-feedback">
                          Masukkan Catatan!
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" name="edit_transaksi_item" value="1234">Save
                      changes</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
        <!-- End Edit Modal -->
        <!--  Hapus Modal -->
        <div class="modal fade" id="ModalHapusTransaksiItem<?php echo $row['id_list'] ?>" tabindex="-1"
          aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-fullscreen-md-down">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Akun</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="needs-validation" novalidate action="proses/hapus_transaksiitem.php" method="post">
                  <input type="hidden" value="<?php echo $row['id_list'] ?>" name="id">
                  <input type="hidden" name="id_transaksi" value="<?php echo $kode ?>">
                  <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                  <div class="col-lg-12">
                    Apakah anda ingin menghapus menu <b><?php echo $row['nama_menu'] ?></b>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="hapus_transaksiitem" value="1234">Hapus</button>
                  </div>
              </div>
              </form>


            </div>
          </div>
        </div>
        <!-- End Hapus Modal -->
      <?php } ?>

      <!-- bAYAR Modal -->
      <div class="modal fade" id="bayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Bayar Menu</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr class="text-nowrap">

                      <th scope="col">Menu</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Qty</th>
                      <th scope="col">Status</th>
                      <th scope="col">Catatan</th>
                      <th scope="col">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $total = 0;
                    foreach ($result as $row) {
                      ?>
                      <tr>
                        <td><?php echo $row['nama_menu'] ?></td>
                        <td><?php echo number_format($row['harga'], 0, ',', '.') ?></td>
                        <td><?php echo $row['jumlah'] ?></td>
                        <td><?php echo $row['status'] ?></td>
                        <td><?php echo $row['catatan'] ?></td>
                        <td><?php echo number_format($row['harganya'], 0, ',', '.') ?></td>

                      </tr>
                      <?php
                      $total += $row['harganya'];
                    }
                    ?>
                    <tr>
                      <td colspan="5" class="fw-bold">
                        Total Harga
                      </td>
                      <td class="fw-bold">
                        <?php echo number_format($total, 0, ',', '.') ?>
                      </td>
                    </tr>
                  </tbody>
                </table>

              </div>
              <span class="text-danger fs-5 fw-semibold">Apakah anda yakin akan melakukan pembayaran</span>
              <form class="needs-validation" novalidate action="proses/bayar.php" method="post">
                <input type="hidden" name="id_transaksi" value="<?php echo $kode ?>">
                <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                <input type="hidden" name="total" value="<?php echo $total ?>">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="floatingInput" placeholder="Nominal Uang" name="uang"
                        required>
                      <label for="floatingInput">Jumlah Nominal Uang</label>
                      <div class="invalid-feedback">
                        Masukkan Jumlah Uang!
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary" name="bayar" value="1234">
                    Bayar</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
      <!-- End Bayar Modal -->


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

              <th scope="col">Menu</th>
              <th scope="col">Harga</th>
              <th scope="col">Qty</th>
              <th scope="col">Status</th>
              <th scope="col">Catatan</th>
              <th scope="col">Total</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $total = 0;
            foreach ($result as $row) {
              ?>
              <tr>
                <td><?php echo $row['nama_menu'] ?></td>
                <td><?php echo number_format($row['harga'], 0, ',', '.') ?></td>
                <td><?php echo $row['jumlah'] ?></td>
                <td><?php echo $row['status'] ?></td>
                <td><?php echo $row['catatan'] ?></td>
                <td><?php echo number_format($row['harganya'], 0, ',', '.') ?></td>
                <td>
                  <div class="d-flex">
                    <button
                      class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-warning"; ?>  "
                      data-bs-toggle="modal" data-bs-target="#ModalEditTransaksiItem<?php echo $row['id_list'] ?>"><i
                        class="bi bi-pencil"></i></button>
                    <button
                      class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-danger"; ?> "
                      data-bs-toggle="modal" data-bs-target="#ModalHapusTransaksiItem<?php echo $row['id_list'] ?>"><i
                        class="bi bi-trash3"></i></button>
                  </div>
                </td>
              </tr>
              <?php
              $total += $row['harganya'];
            }
            ?>
            <tr>
              <td colspan="5" class="fw-bold">
                Total Harga
              </td>
              <td class="fw-bold">
                <?php echo number_format($total, 0, ',', '.') ?>
              </td>
            </tr>
          </tbody>
        </table>

      </div>
    <?php } ?>
    <div>
      <button
        class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary disabled" : "btn btn-success"; ?>  ms-3 mb-3 me-1"
        data-bs-toggle="modal" data-bs-target="#tambah_transaksi"><i class=" bi bi-plus-lg"></i> Transaksi</button>
      <button
        class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary disabled" : "btn btn-primary"; ?> ms-3 mb-3 me-1"
        data-bs-toggle="modal" data-bs-target="#bayar"><i class=" bi bi-cash-coin"></i>Bayar</button>
    </div>
  </div>
</div>
</div>