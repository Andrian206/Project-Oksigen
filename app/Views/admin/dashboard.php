<?= $this->extend('partials/layout') ?>
<?= $this->section('content') ?>

    <div class="page-actions">
        <h1>Dashboard</h1>
    </div>
    <p style="font-size: 1.2rem; margin-top:-1rem; margin-bottom: 2rem;">Selamat datang kembali, <strong><?= esc(session('nama_lengkap') ?? session('username')) ?>!</strong></p>

    <div class="dashboard-grid">
        <div class="dashboard-card">
            <div class="card-header">
                <h3>Total Pelanggan</h3>
                <div class="card-icon">
                    <!-- Ikon SVG sederhana untuk pengguna -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                </div>
            </div>
            <div class="angka"><?= $total_pelanggan ?></div>
            <a href="/admin/pelanggan" class="link">Kelola Pelanggan →</a>
        </div>

        <div class="dashboard-card">
            <div class="card-header">
                <h3>Transaksi Bulan Ini</h3>
                 <div class="card-icon">
                    <!-- Ikon SVG sederhana untuk transaksi -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                </div>
            </div>
            <div class="angka"><?= $transaksi_bulan_ini ?></div>
            <a href="/admin/transaksi" class="link">Lihat Transaksi →</a>
        </div>

        <div class="dashboard-card">
            <div class="card-header">
                <h3>Jenis Gas Tersedia</h3>
                 <div class="card-icon">
                    <!-- Ikon SVG sederhana untuk gas/produk -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                </div>
            </div>
            <div class="angka"><?= $total_gas ?></div>
            <a href="/admin/gas" class="link">Kelola Jenis Gas →</a>
        </div>

        <div class="dashboard-card">
            <div class="card-header">
                <h3>Pendapatan Bulan Ini</h3>
                 <div class="card-icon" style="color: var(--hijau);">
                    <!-- Ikon SVG sederhana untuk pendapatan -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                </div>
            </div>
            <!-- Anda perlu menambahkan logika untuk $pendapatan_bulan_ini di controller -->
            <div class="angka">Rp 0</div>
            <a href="/admin/transaksi" class="link">Lihat Laporan →</a>
        </div>
    </div>

<?= $this->endSection() ?>