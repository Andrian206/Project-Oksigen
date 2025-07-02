<?php
namespace App\Controllers;

use App\Models\AdminModel;

class AdminController extends BaseController
{
    public function index()
    {
        $data['admins'] = (new AdminModel())->findAll();
        return view('admin/admins/index', $data);
    }

    public function new()
    {
        return view('admin/admins/new');
    }

    public function create()
    {
        $rules = [
            'username'     => 'required|is_unique[admins.username]|min_length[5]',
            'nama_lengkap' => 'required',
            'password'     => 'required|min_length[8]',
            'confirm_password' => 'required|matches[password]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/admin/admins/new')->withInput()->with('errors', $this->validator->getErrors());
        }

        (new AdminModel())->save([
            'username'     => $this->request->getPost('username'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'password'     => $this->request->getPost('password'),
        ]);

        return redirect()->to('/admin/admins')->with('success', 'Admin baru berhasil ditambahkan.');
    }

    public function edit($id = null)
    {
        $data['admin'] = (new AdminModel())->find($id);
        return view('admin/admins/edit', $data);
    }

    public function update($id = null)
    {
        $rules = [
            'username'     => "required|is_unique[admins.username,id_admin,{$id}]|min_length[5]",
            'nama_lengkap' => 'required',
        ];

        if ($this->request->getPost('password')) {
            $rules['password'] = 'min_length[8]';
            $rules['confirm_password'] = 'matches[password]';
        }

        if (!$this->validate($rules)) {
            return redirect()->to("/admin/admins/edit/{$id}")->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $data = [
            'username'     => $this->request->getPost('username'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
        ];
        
        if ($this->request->getPost('password')) {
            $data['password'] = $this->request->getPost('password');
        }

        (new AdminModel())->update($id, $data);

        return redirect()->to('/admin/admins')->with('success', 'Data admin berhasil diperbarui.');
    }

    public function delete($id = null)
    {
        if ($id == session('id_admin')) {
            return redirect()->to('/admin/admins')->with('error', 'Anda tidak bisa menghapus akun Anda sendiri.');
        }

        (new AdminModel())->delete($id);
        return redirect()->to('/admin/admins')->with('success', 'Admin berhasil dihapus.');
    }
}