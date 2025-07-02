<?= $this->extend('partials/layout') ?>
<?= $this->section('content') ?>

    <h1>Edit Admin <?= esc($admin['username']) ?></h1>
    
    <?= $this->include('partials/validation_errors') ?>

    <form action="/admin/admins/<?= $admin['id_admin'] ?>" method="post">
        <?= csrf_field() ?>
        
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?= old('username', $admin['username']) ?>" required>
        
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" id="nama_lengkap" value="<?= old('nama_lengkap', $admin['nama_lengkap']) ?>" required>

        <hr>
        <p>Kosongkan password jika tidak ingin mengubahnya.</p>

        <label for="password">Password Baru</label>
        <input type="password" name="password" id="password">

        <label for="confirm_password">Konfirmasi Password Baru</label>
        <input type="password" name="confirm_password" id="confirm_password">

        <button type="submit">Update</button>
        <a href="/admin/admins" class="button button-cancel">Batal</a>
    </form>
    
<?= $this->endSection() ?>