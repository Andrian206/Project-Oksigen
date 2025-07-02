<?php
namespace App\Controllers;

use App\Models\StokModel;
use App\Models\GasModel;

class StokController extends BaseController
{
    public function index()
    {

        $db = \Config\Database::connect();
        $sql = "
            SELECT 
                stok.*, 
                jenis_gas.nama_gas 
            FROM 
                stok
            LEFT JOIN 
                jenis_gas ON jenis_gas.id_gas = stok.id_gas
            ORDER BY 
                stok.created_at DESC
        ";
        $query = $db->query($sql);
        $data['stok_data'] = $query->getResultArray();
        $data['title'] = 'Riwayat Stok';
        return view('admin/stok/index', $data);
    }

    public function new()
    {
        $gasModel = new GasModel();
        $data['gas_list'] = $gasModel->findAll();
        $data['title'] = 'Tambah Data Stok';
        return view('admin/stok/new', $data);
    }

    public function create()
    {
        $rules = [
            'id_gas' => 'required|is_not_unique[jenis_gas.id_gas]',
            'jumlah' => 'required|integer|greater_than[0]',
            'tipe'   => 'required|in_list[MASUK,KELUAR]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/admin/stok/new')->withInput()->with('errors', $this->validator->getErrors());
        }

        // dd($this->request->getPost());

        $stokModel = new StokModel();
        $stokModel->save($this->request->getPost());

        return redirect()->to('/admin/stok')->with('success', 'Data stok berhasil ditambahkan.');
    }
}