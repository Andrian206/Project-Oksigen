<h2>Register</h2>

<?php if(session()->getFlashdata('error')): ?>
    <div style="color:red"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<form method="post" action="/register">
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
    <input type="password" name="confirm_password"
        required
        placeholder="Ulangi password"><br><br>

    <button type="submit">Daftar</button>
</form>

<p>Sudah punya akun? <a href="/login">Login di sini</a></p>
