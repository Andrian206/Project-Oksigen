<?= $this->extend('partials/layout') ?>
<?= $this->section('content') ?>

    <!-- PERUBAHAN DI SINI: Mengelompokkan Judul dan Tombol Aksi Halaman -->
    <div class="page-actions">
        <h1>Daftar Jenis Gas</h1>
        <div class="action-buttons">
            <a href="/admin/gas/new" class="button button-add">Tambah Gas Baru</a>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama Gas</th>
                <th>Harga Beli</th>
                <th>Harga Jual (Rp)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gas as $g): ?>
            <tr>
                <td><?= esc($g['nama_gas']) ?></td>
                <td>Rp. <?= number_format($g['harga_beli'], 0, ',', '.') ?></td>
                <td>Rp. <?= number_format($g['harga_jual'], 0, ',', '.') ?></td>
                <td>
                    <!-- PERUBAHAN DI SINI: Membungkus tombol aksi di dalam tabel -->
                    <div class="action-buttons">
                        <a href="/admin/gas/edit/<?= $g['id_gas'] ?>" class="button button-edit">Edit</a>
                        <form action="/admin/gas/<?= $g['id_gas'] ?>" method="post" onsubmit="return confirm('Yakin hapus?');">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="button button-delete">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?= $this->endSection() ?>