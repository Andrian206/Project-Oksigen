<?= $this->extend('partials/layout') ?>
<?= $this->section('content') ?>

    <div class="page-actions">
        <h1>Detail Transaksi #<?= esc($transaksi['id_transaksi']) ?></h1>
        <div class="action-buttons">
            <a href="/admin/transaksi/edit/<?= $transaksi['id_transaksi'] ?>" class="button button-edit">Edit Status</a>
            <a href="/admin/transaksi" class="button button-cancel">Kembali</a>
        </div>
    </div>

    <div class="form-card">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div>
                <strong>Pelanggan:</strong><br>
                <?= esc($transaksi['nama_pelanggan']) ?>
            </div>
            <div>
                <strong>Tanggal Transaksi:</strong><br>
                <?= date('d F Y, H:i', strtotime($transaksi['tanggal_transaksi'])) ?>
            </div>
            <div>
                <strong>Status Bayar:</strong><br>
                <span style="font-weight: bold; color: <?= $transaksi['status_bayar'] == 'Lunas' ? 'var(--hijau)' : ($transaksi['status_bayar'] == 'Batal' ? 'var(--merah)' : 'var(--kuning)') ?>;">
                    <?= esc($transaksi['status_bayar']) ?>
                </span>
            </div>
            <div>
                <strong>Total Bayar:</strong><br>
                <span style="font-weight: bold; font-size: 1.2rem;">
                    Rp <?= number_format($transaksi['total'], 0, ',', '.') ?>
                </span>
            </div>
        </div>
        <hr style="margin: 1.5rem 0;">
        <h3>Keterangan</h3>
        <p><?= nl2br(esc($transaksi['keterangan'] ?? 'Tidak ada keterangan.')) ?></p>
    </div>

<?= $this->endSection() ?>