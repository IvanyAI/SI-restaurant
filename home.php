<?php
include("proses/connect.php");
$query = mysqli_query($db, "SELECT * FROM tb_menu");
while ($row = mysqli_fetch_array($query)) {
  $result[] = $row;
}
?>

<div class="col-lg-9 mt-3">
  <!-- Carousel -->
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <?php
      $slide = 0;
      $firstSlideTombol = true;
      foreach ($result as $dataTombol) {
        ($firstSlideTombol) ? $active = "active" : $active = "";
        $firstSlideTombol = false;
        ?>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $slide ?>"
          class="<?php echo $active ?>" aria-current="true" aria-label="Slide <?php echo $slide + 1 ?>"></button>
        <?php $slide++;
      } ?>
    </div>
    <div class="carousel-inner rounded-1">
      <?php
      $firstSlide = true;
      foreach ($result as $data) {
        ($firstSlide) ? $active = "active" : $active = "";
        $firstSlide = false;
        ?>
        <div class="carousel-item <?php echo $active ?>">
          <img src="assets/img/<?php echo $data['foto'] ?>" class="img-fluid "
            style="height:250px; width:1000px; object-fit: cover;" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5><?php echo $data['nama_menu'] ?></h5>
            <p><?php echo $data['keterangan'] ?></p>
          </div>
        </div>
      <?php } ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- Carousel -->
  <div class="card mt-4 rounded-1">
    <div class="card-body text-center">
      <h5 class="card-title">SIRUMA - Sistem Informasi Rumah Makan</h5>
      <p class="card-text">Sistem informasi rumah makan adalah aplikasi atau platform teknologi yang dirancang untuk
        mendukung operasional dan manajemen sebuah rumah makan atau restoran. Sistem ini bertujuan untuk mengoptimalkan
        berbagai aspek operasional, mulai dari manajemen pesanan hingga pelacakan inventaris, sehingga meningkatkan
        efisiensi dan pengalaman pelanggan.</p>
    </div>
  </div>
</div>