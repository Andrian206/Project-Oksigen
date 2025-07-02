<?php
namespace App\Controllers;

use App\Models\PelangganModel;

class Pelanggan extends BaseController
{
    public function index()
    {
        $data['pelanggan'] = (new PelangganModel())->findAll();
        $data['title'] = 'Daftar Pelanggan';
        return view('admin/pelanggan/index', $data);
    }

    public function new()
    {
        $data['title'] = 'Tambah Pelanggan Baru';
        return view('admin/pelanggan/new', $data);
    }

    public function create()
    {
        $rules = [
            'nama'  => 'required|max_length[100]',
            'no_hp' => 'permit_empty|max_length[20]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/admin/pelanggan/new')->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $data = $this->request->getPost();
        $data['jaminan_tabung'] = isset($data['jaminan_tabung']) ? 1 : 0;

        (new PelangganModel())->save($data);
        return redirect()->to('/admin/pelanggan')->with('success', 'Data pelanggan berhasil ditambahkan.');
    }

    public function edit($id = null)
    {
        $model = new PelangganModel();
        $data['pelanggan'] = $model->find($id);
        $data['title'] = 'Edit Pelanggan';

        if (empty($data['pelanggan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data pelanggan tidak ditemukan.');
        }

        return view('admin/pelanggan/edit', $data);
    }

    public function update($id = null)
    {
        $rules = [
            'nama'  => 'required|max_length[100]',
            'no_hp' => 'permit_empty|max_length[20]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to("/admin/pelanggan/edit/{$id}")->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $data = $this->request->getPost();
        $data['jaminan_tabung'] = isset($data['jaminan_tabung']) ? 1 : 0;

        (new PelangganModel())->update($id, $data);
        return redirect()->to('/admin/pelanggan')->with('success', 'Data pelanggan berhasil diperbarui.');
    }

    public function delete($id = null)
    {
        (new PelangganModel())->delete($id);
        return redirect()->to('/admin/pelanggan')->with('success', 'Data pelanggan berhasil dihapus.');
    }
}