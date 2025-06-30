<h2>Edit Gas</h2>
<form method="post" action="/gas/update/<?= $gas['id_gas'] ?>">
    <label>Nama Gas</label><br>
    <input type="text" name="nama_gas" value="<?= $gas['nama_gas'] ?>" required><br><br>
    <label>Harga Beli</label><br>
    <input type="number" step="0.01" name="harga_beli" value="<?= $gas['harga_beli'] ?>" required><br><br>
    <label>Harga Jual</label><br>
    <input type="number" step="0.01" name="harga_jual" value="<?= $gas['harga_jual'] ?>" required><br><br>
    <button type="submit">Update</button>
</form>
<p><a href="/gas">Kembali ke Daftar Gas</a></p>