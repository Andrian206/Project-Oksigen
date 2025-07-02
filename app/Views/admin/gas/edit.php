<?= $this->extend('partials/layout') ?>
<?= $this->section('content') ?>

    <h1>Edit Gas <?= esc($gas['nama_gas']) ?></h1>

    <?= $this->include('partials/validation_errors') ?>

    <form action="/admin/gas/<?= $gas['id_gas'] ?>" method="post">
        <?= csrf_field() ?>
        
        <label for="nama_gas">Nama Gas</label>
        <input type="text" name="nama_gas" id="nama_gas" value="<?= old('nama_gas', $gas['nama_gas']) ?>" required>
        
        <label for="harga_beli">Harga Beli</label>
        <input type="number" name="harga_beli" id="harga_beli" value="<?= old('harga_beli', $gas['harga_beli']) ?>" required>
        
        <label for="harga_jual">Harga Jual</label>
        <input type="number" name="harga_jual" id="harga_jual" value="<?= old('harga_jual', $gas['harga_jual']) ?>" required>
        
        <button type="submit">Update</button>
        <a href="/admin/gas" class="button button-cancel">Kembali</a>
    </form>

<?= $this->endSection() ?>