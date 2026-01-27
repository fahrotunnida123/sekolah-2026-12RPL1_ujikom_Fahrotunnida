<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Siswa</title>
    <style>
        /* Sedikit CSS agar tampilan lebih rapi dan terbaca */
        body { font-family: sans-serif; margin: 20px; line-height: 1.6; }
        form { max-width: 400px; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input, select, button { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; }
        button { background-color: #2ecc71; color: white; border: none; cursor: pointer; margin-top: 20px; }
        button:hover { background-color: #27ae60; }
    </style>
</head>
<body>

    <h2>Tambah Data Siswa</h2>

    <form action="proses-tambah-siswa.php" method="POST">
        
        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>

        <label for="nis">NIS (Akan jadi Username)</label>
        <input type="text" id="nis" name="nis" placeholder="Masukkan NIS" required>

        <label for="kelas">Kelas</label>
        <select name="kelas" id="kelas" required>
            <option value="">-- Pilih Kelas --</option>
            <option value="12 RPL 1">12 RPL 1</option>
            <option value="12 RPL 2">12 RPL 2</option>
            <option value="12 TKR 1">12 TKR 1</option>
            <option value="12 TKR 2">12 TKR 2</option>
        </select>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Masukkan password" required>

        <button type="submit" name="simpan">Simpan Data Siswa</button>

    </form>

</body>
</html>