<?php

namespace App\Controllers;

use App\Models\PelangganModel;

class Pelanggan extends BaseController
{
    protected $pelangganModel;

    public function __construct()
    {
        $this->pelangganModel = new PelangganModel();
    }

    public function index()
    {
        $data['pelanggan'] = $this->pelangganModel->findAll();
        return view('pelanggan/index', $data);
    }

    public function create()
    {
        return view('pelanggan/create');
    }

    public function store()
    {
        $this->pelangganModel->save([
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'jaminan_tabung' => $this->request->getPost('jaminan_tabung') ? 1 : 0,
        ]);
        return redirect()->to('/pelanggan');
    }

    public function edit($id)
    {
        $data['pelanggan'] = $this->pelangganModel->find($id);
        return view('pelanggan/edit', $data);
    }

    public function update($id)
    {
        $this->pelangganModel->update($id, [
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'jaminan_tabung' => $this->request->getPost('jaminan_tabung') ? 1 : 0,
        ]);
        return redirect()->to('/pelanggan');
    }

    public function delete($id)
    {
        $this->pelangganModel->delete($id);
        return redirect()->to('/pelanggan');
    }
}
