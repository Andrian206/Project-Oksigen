<?php
namespace App\Controllers;

use App\Models\AdminModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function loginAction()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/login')->withInput()->with('errors', $this->validator->getErrors());
        }

        $adminModel = new AdminModel();
        $username  = $this->request->getPost('username');
        $password  = $this->request->getPost('password');
        $admin     = $adminModel->where('username', $username)->first();

        if ($admin && $password === $admin['password']) {
            session()->set([
                'id_admin'   => $admin['id_admin'],
                'username'   => $admin['username'],
                'nama_lengkap'  => $admin['nama_lengkap'],
                'isLoggedIn' => true
            ]);
            
            return redirect()->to('/admin/dashboard');
        }

        return redirect()->to('/login')->with('error', 'Username atau password salah.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Anda telah berhasil logout.');
    }
}