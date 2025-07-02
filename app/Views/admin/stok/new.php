<?= $this->extend('partials/layout') ?>
<?= $this->section('content') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Stok</title>
</head>
<body>
    <h1>Form Tambah Stok</h1>

    <?php if(session()->has('errors')): ?>
        <div style="color:red">
            <ul>
            <?php foreach (session('errors') as $error) : ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="/admin/stok" method="post">
        <?= csrf_field() ?>
        
        <label for="id_gas">Pilih Gas</label><br>
        <select name="id_gas" id="id_gas" required>
            <option value="">Pilih Jenis Gas</option>
            <?php foreach($gas_list as $gas): ?>
                <option value="<?= $gas['id_gas'] ?>" <?= set_select('id_gas', $gas['id_gas']) ?>>
                    <?= esc($gas['nama_gas']) ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <label>Tipe Pergerakan</label><br>
        <input type="radio" name="tipe" value="MASUK" <?= set_radio('tipe', 'MASUK', true) ?> > Masuk
        <input type="radio" name="tipe" value="KELUAR" <?= set_radio('tipe', 'KELUAR') ?> > Keluar
        <br><br>

        <label for="jumlah">Jumlah</label><br>
        <input type="number" name="jumlah" id="jumlah" value="<?= set_value('jumlah') ?>" required><br><br>

        <label for="keterangan">Keterangan</label><br>
        <textarea name="keterangan" id="keterangan"><?= set_value('keterangan') ?></textarea><br><br>

        <button type="submit">Simpan</button>
        <a href="/admin/stok" class="button button-cancel">Kembali</a>
    </form>
</body>
</html>
<?= $this->endSection() ?>