<h2>Lengkapi Data Profil</h2>

<?php if(session()->getFlashdata('success')): ?>
    <div style="color: green;"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<form method="post" action="/userpanel/update">
    <label>Nama Lengkap</label><br>
    <input type="text" name="nama" value="<?= esc($pelanggan['nama']) ?>" required><br><br>

    <label>Jenis Kelamin</label><br>
    <select name="jenis_kelamin" required>
        <option value="">--Pilih--</option>
        <option value="Laki-Laki" <?= $pelanggan['jenis_kelamin'] == 'Laki-Laki' ? 'selected' : '' ?>>Laki-Laki</option>
        <option value="Perempuan" <?= $pelanggan['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
    </select><br><br>

    <label>Alamat</label><br>
    <textarea name="alamat" required><?= esc($pelanggan['alamat']) ?></textarea><br><br>

    <label>No HP</label><br>
    <input type="text" name="no_hp" value="<?= esc($pelanggan['no_hp']) ?>" required><br><br>

    <label><input type="checkbox" name="jaminan_tabung" value="1" <?= $pelanggan['jaminan_tabung'] ? 'checked' : '' ?>> Ada jaminan tabung</label><br><br>

    <button type="submit">Simpan Data</button>
</form>

<p><a href="/userpanel">Kembali ke Dashboard</a></p>
