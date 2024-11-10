<?php
include("proses/connect.php");
date_default_timezone_set('Asia/Jakarta');
$query = mysqli_query($db, "SELECT tb_transaksi.*,tb_bayar.*, nama, SUM(harga*jumlah) AS harganya FROM tb_transaksi LEFT JOIN tb_akun ON tb_akun.id = tb_transaksi.kasir
LEFT JOIN tb_list_transaksi on tb_list_transaksi.transaksi = tb_transaksi.id_transaksi
LEFT JOIN tb_menu ON tb_menu.id = tb_list_transaksi.menu
JOIN tb_bayar ON tb_bayar.id_bayar = tb_transaksi.id_transaksi
GROUP BY id_transaksi ORDER BY waktu_transaksi ASC");
while ($record = mysqli_fetch_array($query)) {
  $result[] = $record;
}
?>
<div class="col-lg-9 mt-3">
  <div class="card">
    <div class="card-header">
      Halaman Laporan
    </div>
    <div class="card-body">


      <?php

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
                <th scope="col">waktu order</th>
                <th scope="col">waktu bayar</th>
                <th scope="col">Pelanggan</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Kasir</th>
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
                  <td><?php echo $row['waktu_transaksi'] ?></td>
                  <td><?php echo $row['waktu_bayar'] ?></td>
                  <td><?php echo $row['pelanggan'] ?>
                  </td>
                  <td><?php echo number_format((int) $row['harganya'], 0, ',', '.') ?></td>
                  <td><?php echo $row['nama'] ?></td>
                  <td>
                    <div class="d-flex">
                      <a class="btn btn-info btn-sm me-1"
                        href="./?x=viewitem&pencatatan=<?php echo $row['id_transaksi'] . "&pelanggan=" . $row['pelanggan'] ?>"><i
                          class="bi bi-eye"></i></a>
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