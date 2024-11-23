// Pastikan DOM sudah sepenuhnya dimuat sebelum mengeksekusi JavaScript
document.addEventListener("DOMContentLoaded", function () {
  // Menambahkan event listener untuk tombol konfirmasi pesanan
  document
    .getElementById("konfirmasiPesananBtn")
    .addEventListener("click", function () {
      // Array untuk menyimpan rincian pesanan
      var menuItems = [];
      var totalPrice = 0;

      // Ambil semua baris data dari tabel (kecuali header)
      var rows = document.querySelectorAll("tbody tr");

      // Loop melalui setiap baris dan ambil data menu, harga, jumlah, dan total
      rows.forEach(function (row) {
        var menu = row.querySelector("td:nth-child(1)").innerText.trim(); // Nama menu
        var qty = parseInt(
          row.querySelector("td:nth-child(3)").innerText.trim()
        ); // Jumlah porsi
        var price = parseInt(
          row
            .querySelector("td:nth-child(2)")
            .innerText.replace(/[^\d]/g, "")
            .trim()
        ); // Harga per item
        var total = parseInt(
          row
            .querySelector("td:nth-child(4)")
            .innerText.replace(/[^\d]/g, "")
            .trim()
        ); // Total harga per item

        // Tambahkan rincian menu ke dalam array menuItems
        menuItems.push(menu + " (x" + qty + ") - Rp " + total.toLocaleString());
        totalPrice += total; // Hitung total harga seluruh pesanan
      });

      // Cek jika tidak ada produk yang dipilih
      if (menuItems.length === 0) {
        alert("Tidak ada produk yang dipilih.");
        return; // Keluar dari fungsi jika tidak ada produk
      }

      // Menyusun pesan untuk WhatsApp
      var message = "Pesanan dari pelanggan:\n";
      message += "====================\n";
      menuItems.forEach(function (item) {
        message += item + "\n";
      });
      message += "====================\n";
      message += "Total Harga: Rp " + totalPrice.toLocaleString();

      // Nomor WhatsApp kasir (ganti dengan nomor yang sesuai)
      var waNumber = "628123456789"; // Ganti dengan nomor WhatsApp kasir Anda

      // Encode pesan agar aman untuk URL
      var encodedMessage = encodeURIComponent(message);

      // Arahkan pengguna ke WhatsApp dengan pesan yang sudah disiapkan
      window.open(
        "https://wa.me/" + waNumber + "?text=" + encodedMessage,
        "_blank"
      );
    });
});
