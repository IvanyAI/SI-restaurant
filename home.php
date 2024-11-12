<?php
include("proses/connect.php");
$query = mysqli_query($db, "SELECT * FROM tb_menu");
while ($row = mysqli_fetch_array($query)) {
  $result[] = $row;
}
$query_chart = mysqli_query($db, "SELECT nama_menu, tb_menu.id,SUM(tb_list_transaksi.jumlah) AS total_jumlah FROM tb_menu
LEFT JOIN tb_list_transaksi ON tb_menu.id = tb_list_transaksi.menu
GROUP BY tb_menu.id
ORDER BY tb_menu.id ASC ");
$result_chart = array();

while ($record_chart = mysqli_fetch_array($query_chart)) {
  $result_chart[] = $record_chart;
}
$array_menu = array_column($result_chart, "nama_menu");
$array_menu_quote = array_map(function ($menu) {
  return "'" . $menu . "'";
}, $array_menu);
$string_menu = implode(",", $array_menu_quote);
// echo $string_menu . "\n";
$array_jumlah_transaksi = array_column($result_chart, "total_jumlah");
$string_jumlah_pesanan = implode(',', $array_jumlah_transaksi);
// echo $string_jumlah_pesanan;

?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
  <!-- Judul -->
  <div class="card mt-4 rounded-1">
    <div class="card-body text-center">
      <h5 class="card-title">SIRUMA - Sistem Informasi Rumah Makan</h5>
      <p class="card-text">Sistem informasi rumah makan adalah aplikasi atau platform teknologi yang dirancang untuk
        mendukung operasional dan manajemen sebuah rumah makan atau restoran. Sistem ini bertujuan untuk mengoptimalkan
        berbagai aspek operasional, mulai dari manajemen pesanan hingga pelacakan inventaris, sehingga meningkatkan
        efisiensi dan pengalaman pelanggan.</p>
    </div>
  </div>
  <!-- End Judul -->
  <!-- chart -->
  <div class="card mt-4 rounded-1">
    <div class="card-body text-center">
      <div>
        <canvas id="myChart"></canvas>
      </div>
      <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: [<?php echo $string_menu ?>],
            datasets: [{
              label: 'Jumlah Terjual',
              data: [<?php echo $string_jumlah_pesanan ?>],
              borderWidth: 1,
              backgroundColor: [
                'rgba(245, 40, 145, 0.8)', 'rgba(0, 144, 213, 0.8)', 'rgba(234, 245, 44, 0.8)', 'rgba(49, 234, 34, 0.8)'
              ]
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>
    </div>
  </div>
  <!-- End chart -->
</div>