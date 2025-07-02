<?= $this->extend('partials/layout') ?>
<?= $this->section('content') ?>

    <div class="page-actions">
        <h1>Edit Status Transaksi #<?= $transaksi['id_transaksi'] ?></h1>
    </div>

    <?= $this->include('partials/validation_errors') ?>

    <form action="/admin/transaksi/update/<?= $transaksi['id_transaksi'] ?>" method="post" class="form-card">
        <?= csrf_field() ?>
        
        <label for="status_bayar">Status Pembayaran</label>
        <select name="status_bayar" id="status_bayar" required>
            <option value="Menunggu" <?= $transaksi['status_bayar'] == 'Menunggu' ? 'selected' : '' ?>>Menunggu</option>
            <option value="Lunas" <?= $transaksi['status_bayar'] == 'Lunas' ? 'selected' : '' ?>>Lunas</option>
            <option value="Batal" <?= $transaksi['status_bayar'] == 'Batal' ? 'selected' : '' ?>>Batal</option>
        </select>

        <label for="keterangan">Keterangan (Opsional)</label>
        <textarea name="keterangan" id="keterangan" rows="4"><?= esc($transaksi['keterangan']) ?></textarea>

        <div class="action-buttons" style="margin-top: 1.5rem;">
            <button type="submit" class="button button-add">Update Status</button>
            <a href="/admin/transaksi" class="button button-cancel">Kembali</a>
        </div>
    </form>

<?= $this->endSection() ?>