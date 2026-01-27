<?php
include '../config/koneksi.php';

if (isset($_POST['simpan'])) {

    // 1. Ambil data dari form dengan sedikit pembersihan (trim)
    $nama     = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $nis      = mysqli_real_escape_string($koneksi, $_POST['nis']); // NIS digunakan sebagai Username
    $kelas    = mysqli_real_escape_string($koneksi, $_POST['kelas']);
    $raw_pass = $_POST['password'];

    // 2. Enkripsi Password
    // Menggunakan password_hash adalah standar keamanan industri saat ini
    $password_aman = password_hash($raw_pass, PASSWORD_DEFAULT);

    // 3. Query Insert ke tabel user
    // Pastikan nama kolom di database (nama, username, password, nis, kelas) sudah sesuai
    $query = "INSERT INTO user (nama, username, password, nis, kelas) 
              VALUES ('$nama', '$nis', '$password_aman', '$nis', '$kelas')";

    $simpan = mysqli_query($koneksi, $query);

    // 4. Cek apakah query berhasil
    if ($simpan) {
        echo "<script>
                alert('Data siswa berhasil ditambahkan!'); 
                window.location='form-siswa.php';
              </script>";
    } else {
        echo "Gagal menyimpan: " . mysqli_error($koneksi);
    }
}
?>