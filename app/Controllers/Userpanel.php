<?php

namespace App\Controllers;

use App\Models\PelangganModel;

class UserPanel extends BaseController
{
    protected $pelangganModel;

    public function __construct()
    {
        $this->pelangganModel = new PelangganModel();
    }

    public function index()
    {
        $idUser = session()->get('id_user');
        $data['pelanggan'] = $this->pelangganModel->where('id_user', $idUser)->first();

        return view('userpanel/index', $data);
    }

    public function editProfile()
    {
        $idUser = session()->get('id_user');
        $data['pelanggan'] = $this->pelangganModel->where('id_user', $idUser)->first();

        return view('userpanel/editUser', $data); 
    }

    public function updateProfile()
    {
        $idUser = session()->get('id_user');
        $pelanggan = $this->pelangganModel->where('id_user', $idUser)->first();

        if (!$pelanggan) {
            return redirect()->to('/userpanel')->with('error', 'Data pelanggan tidak ditemukan');
        }

        $this->pelangganModel->update($pelanggan['id_pelanggan'], [
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'jaminan_tabung' => $this->request->getPost('jaminan_tabung') ? 1 : 0,
        ]);

        return redirect()->to('/userpanel')->with('success', 'Profil berhasil diperbarui');
    }
}
