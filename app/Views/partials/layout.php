<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Admin Panel') ?> - Andhy Isi Oksigen</title>
    
    <!-- 1. Impor Font Baru dari Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --biru-gelap: #1e293b;
            --biru: #3b82f6;
            --hijau: #16a34a;
            --kuning: #f59e0b;
            --merah: #ef4444;
            --abu-bg: #f8fafc;
            --abu-border: #e2e8f0;
            --abu-teks: #64748b;
            --putih: #ffffff;
            --bayangan: 0 4px 12px rgba(0, 0, 0, 0.08);
            --radius-sudut: 12px;
        }
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            background-color: var(--abu-bg);
            color: var(--biru-gelap);
            font-size: 16px;
        }
        .header-utama {
            background-color: var(--putih);
            padding: 0 2rem;
            border-bottom: 1px solid var(--abu-border);
            position: sticky; top: 0; z-index: 1000;
        }
        .navigasi {
            max-width: 1400px; margin: 0 auto; display: flex;
            justify-content: space-between; align-items: center; height: 70px;
        }
        .nav-brand {
            font-size: 1.5rem; font-weight: 700; color: var(--biru-gelap);
            text-decoration: none;
        }
        .nav-menu {
            display: flex; list-style: none; margin: 0; padding: 0; height: 100%;
        }
        .nav-menu a {
            display: flex; align-items: center; padding: 0 1.25rem;
            text-decoration: none; color: var(--abu-teks); font-weight: 500;
            border-bottom: 3px solid transparent; height: 100%;
            transition: all 0.2s ease-in-out;
        }
        .nav-menu a:hover {
            background-color: var(--abu-bg);
            color: var(--biru);
            border-bottom-color: var(--biru);
        }
        .nav-menu a.logout:hover { color: var(--merah); border-bottom-color: var(--merah); }
        .container { max-width: 1400px; margin: 0 auto; padding: 2.5rem; }
        .page-actions {
            display: flex; justify-content: space-between; align-items: center;
            margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem;
        }
        .page-actions h1 {
            font-size: 2.25rem; font-weight: 700; margin: 0; color: var(--biru-gelap);
        }
        .table-wrapper { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 1rem; background-color: var(--putih); box-shadow: var(--bayangan); border-radius: var(--radius-sudut); overflow: hidden; }
        th, td { padding: 1rem 1.25rem; text-align: left; border-bottom: 1px solid var(--abu-border); }
        th { background-color: var(--abu-bg); font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.8px; color: var(--abu-teks); }
        tr:last-child td { border-bottom: none; }
        .status-masuk { color: var(--hijau); font-weight: 600; }
        .status-keluar { color: var(--merah); font-weight: 600; }
        .button, button, input[type="submit"], a.button {
            display: inline-block; text-decoration: none !important;
            padding: 0.6rem 1.2rem; border-radius: 8px;
            border: none;
            cursor: pointer; font-size: 0.9rem; font-weight: 600;
            text-align: center; transition: all 0.2s ease;
        }
        .button:hover, button:hover { transform: translateY(-2px); box-shadow: var(--bayangan); }
        .button-add { background-color: var(--hijau); color: var(--putih); }
        .button-edit { background-color: var(--kuning); color: var(--biru-gelap); }
        .button-delete { background-color: var(--merah); color: var(--putih); }
        .button-cancel { background-color: #6c757d; color: var(--putih); }
        .button-view { background-color: var(--biru); color: var(--putih); }
        .action-buttons { display: flex; gap: 0.5rem; align-items: center; }
        td form { margin: 0; }
        form.form-card { background: white; padding: 2.5rem; border-radius: var(--radius-sudut); box-shadow: var(--bayangan); margin-top: 2rem; }
        label { display: block; margin-bottom: 0.5rem; font-weight: 600; }
        input, select, textarea { border-radius: var(--radius-sudut); }
        input[type="text"], input[type="number"], input[type="password"], select, textarea { width: 100%; padding: 0.9rem; margin-bottom: 1.25rem; border: 1px solid var(--abu-border); box-sizing: border-box; font-size: 1rem; }
        input:focus, select:focus, textarea:focus { outline: none; border-color: var(--biru); box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2); }
        .alert { padding: 1rem; margin-bottom: 1.5rem; border-radius: var(--radius-sudut); border: 1px solid transparent; }
        .alert-success { background-color: #dcfce7; color: #15803d; border-color: #bbf7d0; }
        .alert-error { background-color: #fee2e2; color: #b91c1c; border-color: #fecaca; }
        .dashboard-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; }
        .dashboard-card { background-color: var(--putih); padding: 1.5rem; border-radius: var(--radius-sudut); box-shadow: var(--bayangan); display: flex; flex-direction: column; }
        .card-header { display: flex; justify-content: space-between; align-items: center; }
        .card-header h3 { margin: 0; font-size: 1rem; color: var(--abu-teks); font-weight: 500; }
        .card-icon { background-color: var(--abu-bg); color: var(--biru); width: 40px; height: 40px; border-radius: 8px; display: inline-flex; align-items: center; justify-content: center; }
        .dashboard-card .angka { font-size: 2.25rem; font-weight: 700; color: var(--biru-gelap); margin-top: 0.5rem; }
        .dashboard-card .link { margin-top: auto; padding-top: 1rem; text-decoration: none; font-weight: 600; color: var(--biru); transition: color 0.2s; }
        .dashboard-card .link:hover { color: var(--biru-gelap); }
        .footer-utama { background-color: var(--biru-gelap); color: var(--abu-teks); padding: 2rem; margin-top: 3rem; }
        .footer-content { max-width: 1400px; margin: 0 auto; text-align: center; }
    </style>
</head>
<body>
    <header class="header-utama">
        <nav class="navigasi">
            <a href="/admin/dashboard" class="nav-brand">Andhy Oksigen</a>
            <ul class="nav-menu">
                <li><a href="/admin/dashboard">Dashboard</a></li>
                <li><a href="/admin/transaksi">Transaksi</a></li>
                <li><a href="/admin/stok">Riwayat Stok</a></li>
                <li><a href="/admin/pelanggan">Pelanggan</a></li>
                <li><a href="/admin/gas">Jenis Gas</a></li>
                <li><a href="/admin/admins">Admin</a></li>
                <li><a href="/admin/logout" class="logout">Logout</a></li>
            </ul>
        </nav>
    </header>
    
    <main class="container">
        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="footer-utama">
        <div class="footer-content">
            <p>© <?= date('Y') ?> Panel Admin Andhy Isi Oksigen. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>