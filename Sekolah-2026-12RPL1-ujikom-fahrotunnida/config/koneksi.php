
<?php
// 1. Definisikan identitas database

$host = "localhost";
$user = "root";
$pass = "";

$db = "2026-ujikom-12rpl1-fahrotunnida";

// 2. Eksekusi perintah koneksi
$koneksi = mysqli_connect($host, $user, $pass, $db);

// 3. Cek apakah koneksi berhasil (Debugging)
if (!$koneksi) {
    // Jika gagal, tampilkan pesan error dan hentikan program die("Koneksi ke database gagal: ". mysqli_connect_error());
}

// Jika berhasil, variabel $koneksi siap digunakan di halaman lain
 ?>

