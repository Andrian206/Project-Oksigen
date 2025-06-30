<h2>Selamat datang, <?= session()->get('username'); ?> (User)</h2>
<p>Ini adalah area pengguna biasa.</p>

<?php if ($pelanggan): ?>
    <h2>Profil Pelanggan</h2>
    <p><strong>Nama:</strong> <?= esc($pelanggan['nama']) ?></p>
    <p><strong>Jenis Kelamin:</strong> <?= esc($pelanggan['jenis_kelamin'] ?? '-') ?></p>
    <p><strong>Alamat:</strong> <?= esc($pelanggan['alamat'] ?? '-') ?></p>
    <p><strong>No HP:</strong> <?= esc($pelanggan['no_hp'] ?? '-') ?></p>
    <p><strong>Jaminan Tabung:</strong> <?= $pelanggan['jaminan_tabung'] ? 'Ada' : 'Tidak Ada' ?></p>
    <p><a href="/userpanel/edit">Edit Profil</a></p>
<?php else: ?>
    <p>Profil Anda belum lengkap. <a href="/userpanel/edit">Lengkapi sekarang</a>.</p>
<?php endif; ?>

<br>
<a href="/logout">Logout</a>
