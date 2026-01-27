<?php
// Letakkan include di paling atas agar koneksi siap digunakan
include '../config/koneksi.php';

// Ambil semua data aspirasi, gabungkan dengan tabel kategori agar muncul nama kategorinya
// Perbaikan: Menggunakan SELECT *, memperbaiki JOIN, dan nama tabel menggunakan underscore (_)
$query = mysqli_query($koneksi, "SELECT * FROM `input-aspirasi` 
                                 JOIN kategori ON `input-aspirasi`.id_kategori = kategori.id_kategori");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengaduan</title>
</head>
<body>

    <h2>Daftar Aspirasi</h2>
    
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>NIS</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td><?= $row['id_pelaporan']; ?></td>
                <td><?= $row['nis']; ?></td>
                <td><?= $row['ket_kategori']; ?></td>
                <td><?= $row['status']; ?></td>
                <td>
                    <a href="detail-pengaduan.php?id=<?= $row['id_pelaporan']; ?>">Tanggapi</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>