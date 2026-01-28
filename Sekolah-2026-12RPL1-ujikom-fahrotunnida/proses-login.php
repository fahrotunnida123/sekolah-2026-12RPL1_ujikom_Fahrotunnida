<?php
// Mulai session untuk mengingat siapa yang login
session_start();

// Panggil jembatan koneksi yang sudah dibuat di Part 2
include 'config/koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 1. Ambil data user hanya berdasarkan username (NIS)
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");

    // Hitung apakah datanya ditemukan?
    $cek = mysqli_num_rows($query);
     $hash= password_hash($_POST['password'], PASSWORD_DEFAULT);
    if ($cek > 0) {
        $data = mysqli_fetch_assoc($query);

        // 2. Verifikasi apakah password yang diketik sesuai dengan hash di database
        if (password_verify($password, $data['password'])) {
            
            // Simpan informasi user ke dalam tiket (Session)
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['nama']    = $data['nama'];
            $_SESSION['role']    = $data['role']; // admin atau siswa
            $_SESSION['nis']     = $data['nis'];  // Penting untuk histori pengaduan

            // 3. Arahkan sesuai peran (Role)
            if ($data['role'] == 'admin') {
                // Admin diarahkan ke dashboard khusus admin
                header("location:admin/data-pengaduan.php");
            } else if ($data['role'] == 'siswa') {
                // Siswa diarahkan ke halaman pengaduan
                header("location:data-pengaduan.php");
            }

        } else {
            // Jika password salah
            header("location:index.php?pesan=Password Salah");
        }
    } else {
        // Jika username (NIS) tidak ditemukan
        header("location:login.php?pesan=Username atau NIS Tidak Ditemukan");
    }
}
?>