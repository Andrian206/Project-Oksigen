<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Andhy Isi Oksigen</title>
    <style>
        /* Mengambil variabel warna dari layout utama untuk konsistensi */
        :root {
            --biru-gelap: #2c3e50;
            --hijau: #27ae60;
            --abu-bg: #f5f7fa;
            --abu-border: #dfe4ea;
            --putih: #ffffff;
            --teks: #34495e;
            --merah: #e74c3c;
            --bayangan: 0 4px 12px rgba(0, 0, 0, 0.08);
            --radius-sudut: 8px;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: var(--abu-bg);
            margin: 0;
        }

        .login-container {
            background: var(--putih);
            padding: 2.5rem;
            border-radius: var(--radius-sudut);
            box-shadow: var(--bayangan);
            width: 100%;
            max-width: 380px;
            text-align: center;
        }

        .login-title {
            color: var(--biru-gelap);
            font-size: 1.8rem;
            font-weight: 600;
            margin-top: 0;
            margin-bottom: 0.5rem;
        }

        .login-subtitle {
            color: #7f8c8d;
            margin-bottom: 2rem;
        }

        form {
            text-align: left;
        }
        
        label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--teks);
            font-weight: 600;
        }
        
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 0.9rem;
            margin-bottom: 1.25rem;
            border: 1px solid var(--abu-border);
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 1rem;
            transition: all 0.2s ease;
        }
        
        input:focus {
            outline: none;
            border-color: var(--hijau);
            box-shadow: 0 0 0 3px rgba(39, 174, 96, 0.2);
        }
        
        button {
            width: 100%;
            padding: 0.8rem;
            margin-top: 0.5rem;
            background-color: var(--hijau);
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.2s ease;
        }
        
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(39, 174, 96, 0.3);
        }

        .alert {
            text-align: center;
            padding: 0.8rem;
            margin-bottom: 1.5rem;
            border-radius: 6px;
            border: 1px solid transparent;
        }
        .alert-error { background-color: #f8d7da; color: #721c24; border-color: #f5c6cb; }
        .alert-success { background-color: #d4edda; color: #155724; border-color: #c3e6cb; }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="login-title">Andhy Isi Oksigen</h2>
        <p class="login-subtitle">Selamat Datang</p>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <form method="post" action="/login">
            <?= csrf_field() ?>
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>