<?php
// Pastikan koneksi database terpanggil
include 'config/koneksi.php';

if (isset($_POST['kirim'])) {

    // 1. Tangkap data dari form
    $id_kategori = $_POST['id_kategori'];
    $lokasi      = $_POST['lokasi'];
    $keterangan  = $_POST['keterangan'];

    // 2. Perintah SQL untuk memasukkan data (INSERT)
    // Menggunakan NIS 2024 secara manual sesuai instruksi di komentar kamu
    $query = "INSERT INTO `input-aspirasi` (nis, id_kategori, lokasi, keterangan) 
              VALUES ('124', '$id_kategori', '$lokasi', '$keterangan')";

    // 3. Jalankan query
    $simpan = mysqli_query($koneksi, $query);

    if ($simpan) {
        echo "<script>
                alert('Laporan berhasil dikirim!'); 
                window.location='data-pengaduan.php';
              </script>";
    } else {
        echo "Gagal mengirim laporan: " . mysqli_error($koneksi);
    }
}
?>