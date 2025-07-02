<?php
namespace App\Controllers;

use App\Models\GasModel;

class GasController extends BaseController
{
    public function index()
    {
        $data['gas'] = (new GasModel())->findAll();
        $data['title'] = 'Daftar Jenis Gas';
        return view('admin/gas/index', $data);
    }

    public function new()
    {
        $data['title'] = 'Tambah Gas Baru';
        return view('admin/gas/new', $data);
    }

    public function create()
    {
        $rules = [
            'nama_gas'   => 'required|is_unique[jenis_gas.nama_gas]',
            'harga_beli' => 'required|decimal',
            'harga_jual' => 'required|decimal'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/admin/gas/new')->withInput()->with('errors', $this->validator->getErrors());
        }

        (new GasModel())->save($this->request->getPost());
        return redirect()->to('/admin/gas')->with('success', 'Data gas berhasil ditambahkan.');
    }

    public function edit($id = null)
    {
        $gasModel = new GasModel();
        $data['gas'] = $gasModel->find($id);
        $data['title'] = 'Edit Gas';
        
        if (empty($data['gas'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data gas tidak ditemukan.');
        }

        return view('admin/gas/edit', $data);
    }

    public function update($id = null)
    {
        $rules = [
            'nama_gas'   => "required|is_unique[jenis_gas.nama_gas,id_gas,{$id}]",
            'harga_beli' => 'required|decimal',
            'harga_jual' => 'required|decimal'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to("/admin/gas/edit/{$id}")->withInput()->with('errors', $this->validator->getErrors());
        }

        (new GasModel())->update($id, $this->request->getPost());
        return redirect()->to('/admin/gas')->with('success', 'Data gas berhasil diperbarui.');
    }

    public function delete($id = null)
    {
        (new GasModel())->delete($id);
        return redirect()->to('/admin/gas')->with('success', 'Data gas berhasil dihapus.');
    }
}