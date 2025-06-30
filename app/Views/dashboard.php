<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Selamat datang, <?= session()->get('username'); ?> 👋</h2>
    <a href="/pelanggan">Kelola Pelanggan</a><br>
    <a href="/gas">Kelola Gas</a><br>
    <a href="/profile/edit">Lengkapi Profil</a><br>
    <a href="/logout">Logout</a>
</body>
</html>
