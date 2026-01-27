<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Halaman Pengaduan</h2>
<form action="proses-aspirasi.php" method="post">

<div>
    <label>Kategori</label>
    <select name="id_kategori" required>
    <option value="1">lingkungan</option>
    <option value="2">sarana lab</option>
    </select>
</div>

<div>
<label>Lokasi</label>
<input type="text" name="lokasi" required>
</div>

<div>
<label>keterangan</label>
<textarea name="keterangan" required></textarea>
</div>

<button type="submit" name="kirim">Kirim Pengaduan</button>
</form>
</body>
</html>