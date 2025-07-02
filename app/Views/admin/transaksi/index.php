<?= $this->extend('partials/layout') ?>
<?= $this->section('content') ?>

    <div class="page-actions">
        <h1>Daftar Transaksi</h1>
        <a href="/admin/transaksi/new" class="button button-add">Tambah Transaksi</a>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Pelanggan</th>
                    <th>Total</th>
                    <th>Status Bayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transaksi_data as $trx): ?>
                <tr>
                    <td><?= date('d M Y, H:i', strtotime($trx['tanggal_transaksi'])) ?></td>
                    <td><?= esc($trx['nama_pelanggan']) ?></td>
                    <td>Rp <?= number_format($trx['total'], 0, ',', '.') ?></td>
                    <td><?= esc($trx['status_bayar']) ?></td>
                    <td>
                        <div class="action-buttons">
                            <a href="/admin/transaksi/<?= $trx['id_transaksi'] ?>" class="button button-view">Lihat Detail</a>
                            <a href="/admin/transaksi/edit/<?= $trx['id_transaksi'] ?>" class="button button-edit">Edit Status</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?= $this->endSection() ?>