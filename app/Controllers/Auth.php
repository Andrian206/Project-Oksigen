<?php

namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function doLogin()
    {
        if (!$this->validate([
            'username' => 'required',
            'password' => 'required'
        ])) {
            return redirect()->to('/login')->with('error', 'Harap isi username dan password');
        }

        $userModel = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'id_user'    => $user['id_user'],
                'username'   => $user['username'],
                'role'       => $user['role'],
                'isLoggedIn' => true
            ]);

            if ($user['role'] === 'admin') {
                return redirect()->to('/dashboard');
            } else {
                return redirect()->to('/userpanel');
            }
        }

        return redirect()->to('/login')->with('error', 'Login gagal');
    }


    public function register()
    {
        return view('auth/register');
    }

    public function doRegister()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $confirm  = $this->request->getPost('confirm_password');

        if (!$username || !$password || !$confirm) {
            return redirect()->to('/register')->with('error', 'Semua field wajib diisi!');
        }

        if (!preg_match('/^[a-zA-Z0-9._-]{8,}$/', $username)) {
            return redirect()->to('/register')->with('error', 'Username minimal 8 karakter dan hanya huruf, angka, titik, underscore atau strip!');
        }

        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $password)) {
            return redirect()->to('/register')->with('error', 'Password harus kuat: huruf besar, kecil, angka & simbol!');
        }

        if ($password !== $confirm) {
            return redirect()->to('/register')->with('error', 'Konfirmasi password tidak cocok!');
        }

        $userModel = new \App\Models\UserModel();
        if ($userModel->where('username', $username)->first()) {
            return redirect()->to('/register')->with('error', 'Username sudah digunakan!');
        }

        $userModel->insert([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role'     => 'user' 
        ]);

        $idUserBaru = $userModel->insertID();

        $pelangganModel = new \App\Models\PelangganModel();
        $pelangganModel->insert([
            'nama' => $username,
            'id_user' => $idUserBaru,
            'jenis_kelamin' => null,
            'alamat' => null,
            'no_hp' => null,
            'jaminan_tabung' => 0
        ]);

        return redirect()->to('/login')->with('success', 'Akun berhasil dibuat!');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
