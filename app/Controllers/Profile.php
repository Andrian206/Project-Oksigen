<?php

namespace App\Controllers;

use App\Models\PelangganModel;

class Profile extends BaseController
{
    protected $pelangganModel;

    public function __construct()
    {
        $this->pelangganModel = new PelangganModel();
    }

    public function edit()
    {
        $id_user = session()->get('id_user');
        $pelanggan = $this->pelangganModel->where('id_user', $id_user)->first();

        if (!$pelanggan) {
            
            $pelanggan = [
                'nama' => '',
                'jenis_kelamin' => '',
                'alamat' => '',
                'no_hp' => '',
                'jaminan_tabung' => 0,
            ];
        }

        return view('profile/edit', ['pelanggan' => $pelanggan]);
    }


    public function update()
    {
        $id_user = session()->get('id_user');
        $data = [
            'nama'            => $this->request->getPost('nama'),
            'jenis_kelamin'   => $this->request->getPost('jenis_kelamin'),
            'alamat'          => $this->request->getPost('alamat'),
            'no_hp'           => $this->request->getPost('no_hp'),
            'jaminan_tabung'  => $this->request->getPost('jaminan_tabung') ?? 0
        ];

        $this->pelangganModel->where('id_user', $id_user)->set($data)->update();

        return redirect()->to('/profile/edit')->with('success', 'Data berhasil diperbarui!');
    }
}
