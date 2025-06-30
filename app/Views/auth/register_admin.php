<h2>Tambah Admin</h2>

<?php if(session()->getFlashdata('error')): ?>
    <div style="color:red"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<form method="post" action="/admin/add">
    <label>Username</label><br>
    <input type="text" name="username"
        pattern="^[a-zA-Z0-9._-]{8,}$"
        required
        placeholder="8+ karakter, huruf, angka, titik/strip/underscore" />
    <br><br>

    <label>Password</label><br>
    <input type="password" name="password"
        pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$"
        required
        placeholder="Huruf besar, kecil, angka, simbol" />
    <br><br>

    <label>Konfirmasi Password</label><br>
    <input type="password" name="confirm_password" required placeholder="Ulangi password"><br><br>

    <button type="submit">Tambah Admin</button>
</form>

<p><a href="/dashboard">Kembali</a></p>
