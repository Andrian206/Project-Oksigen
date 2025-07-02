<?= $this->extend('partials/layout') ?>
<?= $this->section('content') ?>

    <h1>Tambah Admin Baru</h1>
    
    <?= $this->include('partials/validation_errors') ?>

    <form action="/admin/admins" method="post">
        <?= csrf_field() ?>
        
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?= old('username') ?>" required>
        
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" id="nama_lengkap" value="<?= old('nama_lengkap') ?>" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <label for="confirm_password">Konfirmasi Password</label>
        <input type="password" name="confirm_password" id="confirm_password" required>

        <button type="submit">Simpan</button>
        <a href="/admin/admins" class="button button-cancel">Kembali</a>
    </form>
    
<?= $this->endSection() ?>