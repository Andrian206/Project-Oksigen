<!DOCTYPE html>
<html>
<head>
    <title>Edit Pelanggan</title>
</head>
<body>
    <h1>Form Edit Pelanggan</h1>
    <form action="/pelanggan/update/<?= $pelanggan['id_pelanggan'] ?>" method="post">
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?= $pelanggan['nama'] ?>"><br><br>

        <label>Jenis Kelamin:</label>
        <select name="jenis_kelamin" required>
            <option value="Laki-Laki" <?= $pelanggan['jenis_kelamin'] == 'Laki-Laki' ? 'selected' : '' ?>>Laki-laki</option>
            <option value="Perempuan" <?= $pelanggan['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
        </select><br>

        <label>Alamat:</label><br>
        <textarea name="alamat"><?= $pelanggan['alamat'] ?></textarea><br><br>

        <label>No HP:</label><br>
        <input type="text" name="no_hp" value="<?= $pelanggan['no_hp'] ?>"><br><br>

        <label>Jaminan Tabung:</label>
        <input type="checkbox" name="jaminan_tabung" value="1" <?= $pelanggan['jaminan_tabung'] ? 'checked' : '' ?>><br><br>

        <button type="submit">Update</button>
    </form>
    <p><a href="/pelanggan">Kembali ke Daftar Pelanggan</a></p>
</body>
</html>
