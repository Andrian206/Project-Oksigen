<?= $this->extend('partials/layout') ?>
<?= $this->section('content') ?>

    <div class="page-actions">
        <h1>Buat Transaksi Baru</h1>
    </div>

    <?= $this->include('partials/validation_errors') ?>

    <form action="/admin/transaksi/create" method="post" class="form-card">
        <?= csrf_field() ?>
        
        <!-- Baris 1: Pelanggan & Tanggal -->
        <div style="display:flex; gap: 2rem; margin-bottom: 1rem;">
            <div style="flex: 1;">
                <label for="id_pelanggan">Pilih Pelanggan</label>
                <select name="id_pelanggan" id="id_pelanggan" required>
                    <option value="">-- Pilih Pelanggan --</option>
                    <?php foreach($pelanggan_list as $pelanggan): ?>
                        <option value="<?= $pelanggan['id_pelanggan'] ?>" <?= old('id_pelanggan') == $pelanggan['id_pelanggan'] ? 'selected' : '' ?>>
                            <?= esc($pelanggan['nama']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div style="flex: 1;">
                <label for="tanggal_transaksi">Tanggal Transaksi</label>
                <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" value="<?= old('tanggal_transaksi', date('Y-m-d')) ?>" required>
            </div>
        </div>

        <hr>
        
        <!-- Baris 2: Pemilihan Produk & Jumlah -->
        <div style="display:flex; gap: 2rem; margin-bottom: 1rem;">
            <div style="flex: 2;">
                <label for="id_gas">Pilih Produk (Gas)</label>
                <select id="id_gas">
                    <option value="">-- Pilih Produk untuk Menghitung Total --</option>
                    <?php foreach($gas_list as $gas): ?>
                        <option value="<?= $gas['id_gas'] ?>" data-harga="<?= $gas['harga_jual'] ?>">
                            <?= esc($gas['nama_gas']) ?> (Rp <?= number_format($gas['harga_jual'], 0, ',', '.') ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div style="flex: 1;">
                <label for="jumlah">Jumlah</label>
                <input type="number" id="jumlah" value="1" min="1" required>
            </div>
        </div>

        <label for="total">Total Harga (Rp) - Terisi Otomatis</label>
        <input type="number" name="total" id="total" step="0.01" value="<?= old('total') ?>" required readonly style="background-color: #e9ecef; font-weight: bold; font-size: 1.1rem;">

        <label for="status_bayar">Status Pembayaran</label>
        <select name="status_bayar" id="status_bayar" required>
            <option value="Menunggu" <?= old('status_bayar') == 'Menunggu' ? 'selected' : '' ?>>Menunggu</option>
            <option value="Lunas" <?= old('status_bayar') == 'Lunas' ? 'selected' : '' ?>>Lunas</option>
            <option value="Batal" <?= old('status_bayar') == 'Batal' ? 'selected' : '' ?>>Batal</option>
        </select>

        <label for="keterangan">Keterangan (Opsional)</label>
        <textarea name="keterangan" id="keterangan" rows="3"><?= old('keterangan') ?></textarea>
        
        <div class="action-buttons" style="margin-top: 2rem;">
            <button type="submit" class="button button-add">Simpan Transaksi</button>
            <a href="/admin/transaksi" class="button button-cancel">Kembali</a>
        </div>
    </form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Ambil elemen-elemen yang dibutuhkan
    const gasSelect = document.getElementById('id_gas');
    const jumlahInput = document.getElementById('jumlah');
    const totalInput = document.getElementById('total');

    // Buat fungsi untuk menghitung total
    function hitungTotal() {
        // Ambil option yang sedang dipilih
        const selectedOption = gasSelect.options[gasSelect.selectedIndex];
        
        // Ambil harga dari atribut data-harga
        const harga = parseFloat(selectedOption.dataset.harga) || 0;
        
        // Ambil jumlah dari input
        const jumlah = parseInt(jumlahInput.value) || 0;

        // Hitung totalnya
        const total = harga * jumlah;

        // Masukkan hasilnya ke dalam input total
        totalInput.value = total;
    }

    // Panggil fungsi hitungTotal setiap kali pilihan gas atau jumlah berubah
    gasSelect.addEventListener('change', hitungTotal);
    jumlahInput.addEventListener('input', hitungTotal);
});
</script>

<?= $this->endSection() ?>