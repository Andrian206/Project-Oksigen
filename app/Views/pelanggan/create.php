<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pelanggan</title>
</head>
<body>
    <h1>Form Tambah Pelanggan</h1>
    <form action="/pelanggan/store" method="post">
        <label>Nama:</label><br>
        <input type="text" name="nama"><br><br>

        <label>Jenis Kelamin:</label>
        <select name="jenis_kelamin" required>
            <option value="Laki-Laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select><br>

        <label>Alamat:</label><br>
        <textarea name="alamat"></textarea><br><br>

        <label>No HP:</label><br>
        <input type="text" name="no_hp"><br><br>

        <label>Jaminan Tabung:</label>
        <input type="checkbox" name="jaminan_tabung" value="1"><br><br>

        <button type="submit">Simpan</button>
    </form>
    <p><a href="/pelanggan">Kembali ke Daftar Pelanggan</a></p>
</body>
</html>
