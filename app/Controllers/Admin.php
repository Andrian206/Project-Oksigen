<?php
namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController
{
    public function register()
    {
        return view('auth/register_admin');
    }

    public function add()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $confirm  = $this->request->getPost('confirm_password');

        if (!$username || !$password || !$confirm) {
            return redirect()->to('/admin/register')->with('error', 'Semua field wajib diisi!');
        }

        if (!preg_match('/^[a-zA-Z0-9._-]{8,}$/', $username)) {
            return redirect()->to('/admin/register')->with('error', 'Format username tidak valid!');
        }

        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $password)) {
            return redirect()->to('/admin/register')->with('error', 'Password harus kuat!');
        }

        if ($password !== $confirm) {
            return redirect()->to('/admin/register')->with('error', 'Konfirmasi password tidak cocok!');
        }

        $userModel = new UserModel();

        if ($userModel->where('username', $username)->first()) {
            return redirect()->to('/admin/register')->with('error', 'Username sudah digunakan!');
        }

        $userModel->insert([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role'     => 'admin'
        ]);

        return redirect()->to('/dashboard')->with('success', 'Admin baru berhasil ditambahkan');
    }
}
