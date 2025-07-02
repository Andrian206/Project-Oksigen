<?= $this->extend('partials/layout') ?>
<?= $this->section('content') ?>

    <div class="page-actions">
        <h1>Daftar Pelanggan</h1>
        <a href="/admin/pelanggan/new" class="button button-add">Tambah Pelanggan</a>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Jaminan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pelanggan as $row): ?>
                <tr>
                    <td><?= esc($row['nama']) ?></td>
                    <td><?= esc($row['jenis_kelamin']) ?></td>
                    <td><?= esc($row['no_hp']) ?></td>
                    <td><?= esc($row['alamat']) ?></td>
                    <td><?= $row['jaminan_tabung'] ? 'Ya' : 'Tidak' ?></td>
                    <td>
                        <div class="action-buttons">
                            <a href="/admin/pelanggan/edit/<?= $row['id_pelanggan'] ?>" class="button button-edit">Edit</a>
                            <form action="/admin/pelanggan/<?= $row['id_pelanggan'] ?>" method="post" onsubmit="return confirm('Yakin hapus pelanggan ini?');">
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
    </div>
<?= $this->endSection() ?>