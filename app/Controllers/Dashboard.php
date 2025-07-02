<?php

namespace App\Controllers;

// 1. Panggil semua model yang datanya akan ditampilkan di dashboard
use App\Models\PelangganModel;
use App\Models\TransaksiModel;
use App\Models\GasModel;

// 2. Nama class harus 'Dashboard' sesuai dengan yang ada di file Routes.php
class Dashboard extends BaseController
{
    public function index()
    {
        // 3. Buat instance dari setiap model
        $pelangganModel = new PelangganModel();
        $transaksiModel = new TransaksiModel();
        $gasModel = new GasModel();

        // 4. Siapkan sebuah array untuk menampung semua data yang akan dikirim ke view
        $data = [
            'title'                 => 'Dashboard',
            'total_pelanggan'       => $pelangganModel->countAllResults(),
            'total_gas'             => $gasModel->countAllResults(),
            'transaksi_bulan_ini'   => $transaksiModel
                                        ->where('MONTH(tanggal_transaksi)', date('m')) // Filter bulan ini
                                        ->where('YEAR(tanggal_transaksi)', date('Y'))  // Filter tahun ini
                                        ->countAllResults(),
        ];
        
        // 5. Tampilkan view dashboard dan kirimkan array $data
        return view('admin/dashboard', $data);
    }
}