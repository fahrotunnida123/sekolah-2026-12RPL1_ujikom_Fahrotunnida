<?php
// Pastikan session sudah dijalankan di bagian paling atas file ini
// $nis_login = $_SESSION['nis']; 
include 'config/koneksi.php';

// Query untuk mengambil data milik siswa yang sedang login
// Perbaikan: Menambahkan SELECT *, memperbaiki nama tabel, dan variabel NIS
$query = mysqli_query($koneksi, "SELECT * FROM `input-aspirasi` 
                                 JOIN kategori ON `input-aspirasi`.id_kategori = kategori.id_kategori 
                                 WHERE nis = '124'");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Histori Pengaduan</title>
</head>
<body>

<h2>Histori Pengaduan Saya</h2>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Kategori</th>
            <th>Lokasi</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Respon Admin</th>
        </tr>
    </thead>
    <tbody>
        <?php while($data = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td><?= $data['ket_kategori']; ?></td>
            <td><?= $data['lokasi']; ?></td>
            <td><?= $data['keterangan']; ?></td>
            <td>
                <strong><?= strtoupper($data['status']); ?></strong>
            </td>
            <td>
                <?= (!empty($data['feedback'])) ? $data['feedback'] : "<em>Belum ada respon</em>"; ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>