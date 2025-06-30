<h2>Daftar Gas</h2>
<a href="/gas/create">Tambah Gas</a>
<table border="1" cellpadding="5">
    <tr>
        <th>Nama Gas</th>
        <th>Beli</th>
        <th>Jual</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($gas as $g): ?>
    <tr>
        <td><?= $g['nama_gas'] ?></td>
        <td><?= $g['harga_beli'] ?></td>
        <td><?= $g['harga_jual'] ?></td>
        <td>
            <a href="/gas/edit/<?= $g['id_gas'] ?>">Edit</a> |
            <a href="/gas/delete/<?= $g['id_gas'] ?>" onclick="return confirm('Yakin?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<p><a href="/dashboard">Kembali ke Dashboard</a></p>