<?php
include "../config/koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM `input-aspirasi` WHERE id_pelaporan='$id'");

$data = mysqli_fetch_assoc($query);

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
    <title>Document</title>
</head>
<body>
    <div> NIS : <?=  $data['nis']; ?></div>
    <div> kategori : <?=  $data['id_kategori']; ?></div>
    <div> Lokasi : <?=  $data['lokasi']; ?></div>
    <div> Status : <?=  $data['status']; ?></div>
    <div> Keterangan : <?=  $data['keterangan']; ?></div>

<h1>Feedback Admin</h1>

 <form action="" method="POST"> 
    <div>
            <label>Status</label><br>
            <select name="status">
                <option value="menunggu">Menunggu</option>
                <option value="proses">Proses</option>
                <option value="selesai">Selesai</option>
            </select>
        </div>
<textarea name="feedback" id="">
    <?=  $data['feedback']; ?>
</textarea>
<button type="submit" name="update">Simpan Perubahan</button>
 </form>
</body>
</html>