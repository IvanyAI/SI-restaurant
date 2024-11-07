<?php
include("proses/connect.php");
$query = mysqli_query($db, "SELECT * FROM tb_menu");
while ($record = mysqli_fetch_array($query)) {
  $result[] = $record;
}
?>
<div class="col-lg-9 mt-3">
  <div class="card">
    <div class="card-header">
      Halaman Menu
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col d-flex justify-content-end">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahMenu">Tambah Menu</button>
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="ModalTambahMenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="proses/input_menu.php" method="post"
                enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="input-group mb-3">
                      <input type="file" class="form-control py-3" id="uploadFoto" placeholder="Nama kamu" name="foto"
                        required>
                      <label class="input-group-text" for="uploadFoto">Upload foto menu</label>
                      <div class="invalid-feedback">
                        Masukkan Foto!
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput" placeholder="name menu"
                        name="nama_menu" required>
                      <label for="floatingInput">Nama menu</label>
                      <div class="invalid-feedback">
                        Masukkan nama menu!
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput" placeholder="keterangan"
                        name="keterangan">
                      <label for="floatingInput">Keterangan Menu</label>
                      <div class="invalid-feedback">
                        Masukkan Keterangan!
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput" placeholder="keterangan"
                        name="kategori">
                      <label for="floatingInput">Kategori Makanan</label>
                      <div class="invalid-feedback">
                        Isi Kategori!
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating">
                      <input type="number" class="form-control" id="floatingPassword" placeholder="Harga" name="harga"
                        required>
                      <label for="floatingPassword">Harga</label>
                      <div class="invalid-feedback">
                        Masukkan harga!
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary" name="validate_input_menu" value="1234">Save
                    changes</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
      <!-- End Modal -->
      <?php
      foreach ($result as $row) {
        ?>
        <!-- View Modal -->
        <div class="modal fade" id="ModalViewMenu<?php echo $row['id'] ?>" tabindex="-1"
          aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-fullscreen-md-down">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="needs-validation" novalidate action="proses/input_menu.php" method="post"
                  enctype="multipart/form-data">
                  <div class="row">

                    <div class="col-lg-12">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name menu" disabled
                          value="<?php echo $row['nama_menu'] ?>">
                        <label for="floatingInput">Nama menu</label>

                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" disabled id="floatingInput"
                          value="<?php echo $row['keterangan'] ?>">
                        <label for="floatingInput">Keterangan Menu</label>

                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="text" disabled class="form-control" id="floatingInput"
                          value="<?php echo $row['kategori'] ?>">
                        <label for="floatingInput">Kategori Makanan</label>

                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-floating">
                        <input type="number" disabled class="form-control" id="floatingPassword" placeholder="Harga"
                          value="<?php echo $row['harga'] ?>">
                        <label for="floatingPassword">Harga</label>

                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" name="validate_input_menu" value="1234">Save
                      changes</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
        <!-- End View Modal -->
        <!--  Edit Modal -->
        <div class="modal fade" id="ModalEditMenu<?php echo $row['id'] ?>" tabindex=" -1"
          aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-fullscreen-md-down">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="needs-validation" novalidate action="proses/edit_menu.php" method="post"
                  enctype="multipart/form-data">
                  <input type="hidden" value="<?php echo $row['id'] ?> " name="id">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="input-group mb-3">
                        <input type="file" class="form-control py-3" id="uploadFoto" placeholder="Nama kamu" name="foto"
                          required>
                        <label class="input-group-text" for="uploadFoto">Upload foto menu</label>
                        <div class="invalid-feedback">
                          Masukkan Foto!
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name menu"
                          name="nama_menu" required value=" <?php echo $row['nama_menu'] ?>">
                        <label for="floatingInput">Nama menu</label>
                        <div class="invalid-feedback">
                          Masukkan nama menu!
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="keterangan"
                          name="keterangan" value=" <?php echo $row['keterangan'] ?>">
                        <label for="floatingInput">Keterangan Menu</label>
                        <div class="invalid-feedback">
                          Masukkan Keterangan!
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="kategori" id="floatingInput"
                          value="<?php echo $row['kategori'] ?>">
                        <label for="floatingInput">Kategori Makanan</label>
                        <div class="invalid-feedback">
                          Isi Kategori!
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-floating">
                        <input type="number" class="form-control" id="floatingPassword" placeholder="Harga" name="harga"
                          required value="<?php echo $row['harga'] ?>">
                        <label for="floatingPassword">Harga</label>
                        <div class="invalid-feedback">
                          Masukkan harga!
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" name="validate_input_menu" value="1234">Save
                      changes</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
        <!-- End Edit Modal -->
        <!--  Hapus Modal -->
        <div class="modal fade" id="ModalHapusMenu<?php echo $row['id'] ?>" tabindex="-1"
          aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-fullscreen-md-down">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Akun</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="needs-validation" novalidate action="proses/hapus_menu.php" method="post">
                  <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                  <div class="col-lg-12">
                    Apakah anda ingin menghapus menu <b><?php echo $row['nama_menu'] ?></b>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="validate_input" value="1234">Hapus</button>
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
                <th scope="col">Foto Menu</th>
                <th scope="col">Nama Menu</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Kategori</th>
                <th scope="col">Harga</th>
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
                  <td>
                    <div style="width:80px">

                      <img src="assets/img/<?php echo $row['foto'] ?>" class="img-thumbnail" alt="...">
                    </div>
                  </td>
                  <td><?php echo $row['nama_menu'] ?></td>
                  <td><?php echo $row['keterangan'] ?>
                  </td>
                  <td><?php echo $row['kategori'] ?></td>
                  <td><?php echo $row['harga'] ?></td>
                  <td>
                    <div class="d-flex">
                      <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal"
                        data-bs-target="#ModalViewMenu<?php echo $row['id'] ?>"><i class="bi bi-eye"></i></button>
                      <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal"
                        data-bs-target="#ModalEditMenu<?php echo $row['id'] ?>"><i class="bi bi-pencil"></i></button>
                      <button class="btn btn-danger btn-sm me-1  " data-bs-toggle="modal"
                        data-bs-target="#ModalHapusMenu<?php echo $row['id'] ?>"><i class="bi bi-trash3"></i></button>
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