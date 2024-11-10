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
}
$select = mysqli_query($db, "SELECT id,nama_menu FROM tb_menu");
?>
<div class="col-lg-9 mt-3">
  <div class="card">
    <div class="card-header">
      Halaman Lihat Item
    </div>
    <div class="card-body">
      <a href="laporan" class="btn btn-info mb-3">Kembali</a>
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


      <?php } ?>




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
    <?php } ?>
  </div>
</div>
</div>