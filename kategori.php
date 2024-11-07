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
      Kategori
    </div>
    <div class="card-body">
      <h5 class="card-title">Ini adalah bagian Kategori</h5>
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
                <?php } ?>
      </div>
    </div>
  </div>