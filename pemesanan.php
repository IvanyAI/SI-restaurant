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
                <a href="#" class="btn btn-primary">Pesan</a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>