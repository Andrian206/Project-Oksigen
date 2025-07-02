<?= $this->extend('partials/layout') ?>
<?= $this->section('content') ?>

    <h1>Tambah Pelanggan Baru</h1>

    <?= $this->include('partials/validation_errors') ?>

    <form action="/admin/pelanggan" method="post">
        <?= csrf_field() ?>
        
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" value="<?= old('nama') ?>" required>

        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select name="jenis_kelamin" id="jenis_kelamin">
            <option value="">-- Pilih --</option>
            <option value="Laki-Laki" <?= old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' ?>>Laki-Laki</option>
            <option value="Perempuan" <?= old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
        </select>
        
        <label for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat"><?= old('alamat') ?></textarea>

        <label for="no_hp">No. HP</label>
        <input type="text" name="no_hp" id="no_hp" value="<?= old('no_hp') ?>">

        <div class="checkbox-group">
            <input type="checkbox" name="jaminan_tabung" value="1" id="jaminan_tabung" <?= old('jaminan_tabung') ? 'checked' : '' ?>>
            <label for="jaminan_tabung">Ada jaminan tabung</label>
        </div>
        
        <button type="submit">Simpan</button>
        <a href="/admin/pelanggan" class="button button-cancel">Kembali</a>
    </form>

<?= $this->endSection() ?>