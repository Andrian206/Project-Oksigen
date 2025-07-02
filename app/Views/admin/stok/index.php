<?= $this->extend('partials/layout') ?>
<?= $this->section('content') ?>

    <div class="page-actions">
        <h1>Riwayat Stok</h1>
        <a href="/admin/stok/new" class="button button-add">Tambah Data Stok</a>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Gas</th>
                    <th>Tipe</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stok_data as $stok): ?>
                <tr>
                    <td><?= date('d M Y, H:i', strtotime($stok['created_at'])) ?></td>
                    <td><?= esc($stok['nama_gas']) ?></td>
                    <td>
                        <span class="<?= $stok['tipe'] == 'MASUK' ? 'status-masuk' : 'status-keluar'; ?>">
                            <?= esc($stok['tipe']) ?>
                        </span>
                    </td>
                    <td><?= esc($stok['jumlah']) ?></td>
                    <td><?= esc($stok['keterangan']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?= $this->endSection() ?>