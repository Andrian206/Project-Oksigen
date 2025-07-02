<?= $this->extend('partials/layout') ?>
<?= $this->section('content') ?>

    <div class="page-actions">
        <h1>Kelola Admin</h1>
        <a href="/admin/admins/new" class="button button-add">Tambah Admin Baru</a>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admins as $admin): ?>
                <tr>
                    <td><?= esc($admin['username']) ?></td>
                    <td><?= esc($admin['nama_lengkap']) ?></td>
                    <td>
                        <div class="action-buttons">
                            <?php if ($admin['id_admin'] != session('id_admin')): ?>
                                <a href="/admin/admins/edit/<?= $admin['id_admin'] ?>" class="button button-edit">Edit</a>
                                <form action="/admin/admins/<?= $admin['id_admin'] ?>" method="post" onsubmit="return confirm('Yakin hapus admin ini?');">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="button button-delete">Hapus</button>
                                </form>
                            <?php else: ?>
                                <span style="color: #7f8c8d;">(Akun Anda)</span>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?= $this->endSection() ?>