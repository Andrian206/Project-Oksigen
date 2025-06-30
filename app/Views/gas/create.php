<h2>Tambah Gas</h2>
<form method="post" action="/gas/store">
    <label>Nama Gas</label><br>
    <input type="text" name="nama_gas" required><br><br>
    <label>Harga Beli</label><br>
    <input type="number" step="0.01" name="harga_beli" required><br><br>
    <label>Harga Jual</label><br>
    <input type="number" step="0.01" name="harga_jual" required><br><br>
    <button type="submit">Simpan</button>
</form>
<p><a href="/gas">Kembali ke Daftar Gas</a></p>