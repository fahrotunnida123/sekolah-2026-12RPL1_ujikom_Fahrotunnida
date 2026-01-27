<?php
// Panggil koneksi database
include 'config/koneksi.php';

// 1. Ambil ID dari link Tanggapi (URL)
$id = $_GET['id'];

if (isset($_POST['update'])) {
    // Tangkap data dari form
    $status   = $_POST['status'];
    $feedback = $_POST['feedback'];

    // 2. Perintah SQL untuk memperbarui data (UPDATE)
    // Perbaikan: mysqli_query, variabel $, dan nama tabel input_aspirasi
    $update = mysqli_query($koneksi, "UPDATE `input-aspirasi` SET 
                                      status='$status', 
                                      feedback='$feedback' 
                                      WHERE id_pelaporan='$id'");

    if ($update) {
        echo "<script>
                alert('Feedback berhasil disimpan!'); 
                window.location='data-pengaduan.php';
              </script>";
    } else {
        echo "Gagal mengupdate: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanggapi Pengaduan</title>
</head>
<body>

    <h2>Berikan Tanggapan</h2>
    
    <form action="" method="POST">
        <div>
            <label>Status</label><br>
            <select name="status">
                <option value="menunggu">Menunggu</option>
                <option value="proses">Proses</option>
                <option value="selesai">Selesai</option>
            </select>
        </div>
        <br>
        <div>
            <label>Feedback Admin</label><br>
            <textarea name="feedback" rows="5" cols="30" placeholder="Tulis tanggapan di sini..."></textarea>
        </div>
        <br>
        <button type="submit" name="update">Simpan Perubahan</button>
        <a href="data-pengaduan.php">Kembali</a>
    </form>

</body>
</html>