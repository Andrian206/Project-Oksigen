<?php
namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\PelangganModel;
use App\Models\GasModel; // Tambahkan model Gas

class TransaksiController extends BaseController
{
    public function index()
    {
        $transaksiModel = new TransaksiModel();
        $data['transaksi_data'] = $transaksiModel->getTransaksiWithDetails();
        $data['title'] = 'Daftar Transaksi';
        return view('admin/transaksi/index', $data);
    }
    
    // METHOD BARU: Untuk menampilkan form tambah transaksi (disederhanakan)
    public function new()
{
    // Panggil kedua model yang dibutuhkan
        $pelangganModel = new PelangganModel();
        $gasModel = new GasModel(); // Tambahkan ini

        $data = [
            'title' => 'Buat Transaksi Baru',
            'pelanggan_list' => $pelangganModel->findAll(),
            'gas_list' => $gasModel->findAll(), // Tambahkan ini untuk mengirim daftar gas
        ];
        return view('admin/transaksi/new', $data);
    }

    // METHOD BARU: Untuk menyimpan data (disederhanakan)
    public function create()
    {
        // Aturan validasi yang lebih sederhana
        $rules = [
            'id_pelanggan'      => 'required|is_not_unique[pelanggan.id_pelanggan]',
            'tanggal_transaksi' => 'required|valid_date',
            'total'             => 'required|decimal',
            'status_bayar'      => 'required|in_list[Menunggu,Lunas,Batal]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/admin/transaksi/new')->withInput()->with('errors', $this->validator->getErrors());
        }

        $transaksiModel = new TransaksiModel();
        $transaksiModel->save($this->request->getPost());

        return redirect()->to('/admin/transaksi')->with('success', 'Transaksi berhasil dibuat.');
    }

    // Method SHOW: Tidak lagi mencari detail_transaksi
    public function show($id = null)
    {
        $transaksiModel = new TransaksiModel();
        $data['transaksi'] = $transaksiModel->getTransaksiWithDetails($id);

        if (empty($data['transaksi'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Transaksi tidak ditemukan.');
        }

        $data['title'] = 'Detail Transaksi';
        return view('admin/transaksi/show', $data);
    }

    // Method EDIT: Sudah benar, tidak perlu diubah signifikan
    public function edit($id = null)
    {
        $transaksiModel = new TransaksiModel();
        $data['transaksi'] = $transaksiModel->find($id);

        if (empty($data['transaksi'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Transaksi dengan ID ' . $id . ' tidak ditemukan.');
        }

        $data['title'] = 'Edit Status Transaksi';
        return view('admin/transaksi/edit', $data);
    }

    // Method UPDATE: Sudah benar, tidak perlu diubah
    public function update($id = null)
    {
        $rules = [
            'status_bayar' => 'required|in_list[Menunggu,Lunas,Batal]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to("/admin/transaksi/edit/{$id}")->withInput()->with('errors', $this->validator->getErrors());
        }

        $transaksiModel = new TransaksiModel();
        $transaksiModel->update($id, [
            'status_bayar' => $this->request->getPost('status_bayar'),
            'keterangan'   => $this->request->getPost('keterangan'),
        ]);

        return redirect()->to('/admin/transaksi')->with('success', 'Status transaksi berhasil diperbarui.');
    }
}