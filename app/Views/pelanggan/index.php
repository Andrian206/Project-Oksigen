<!DOCTYPE html>
<html>
<head>
    <title>Data Pelanggan</title>
</head>
<body>
    <h1>Daftar Pelanggan</h1>

    <a href="/pelanggan/create">Tambah Pelanggan</a>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Jaminan Tabung</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($pelanggan as $row): ?>
            <tr>
                <td><?= $row['id_pelanggan'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['jenis_kelamin'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td><?= $row['no_hp'] ?></td>
                <td><?= $row['jaminan_tabung'] ? 'Ya' : 'Tidak' ?></td>
                <td>
                    <a href="/pelanggan/edit/<?= $row['id_pelanggan'] ?>">Edit</a> |
                    <a href="/pelanggan/delete/<?= $row['id_pelanggan'] ?>" onclick="return confirm('Yakin?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <p><a href="/dashboard">Kembali ke Dashboard</a></p>
</body>
</html>
