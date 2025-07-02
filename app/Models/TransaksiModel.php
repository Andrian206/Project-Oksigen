<?php
namespace App\Models;
use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table            = 'transaksi';
    protected $primaryKey       = 'id_transaksi';
    protected $allowedFields    = ['id_pelanggan', 'tanggal_transaksi', 'total', 'status_bayar', 'keterangan'];
    protected $useTimestamps    = true;

    public function getTransaksiWithDetails($id = null)
    {
        $builder = $this->select('transaksi.*, pelanggan.nama as nama_pelanggan')
                        ->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan');

        if ($id === null) {
            // Jika tidak ada ID, ambil semua data untuk halaman index
            return $builder->orderBy('transaksi.created_at', 'DESC')->findAll();
        }

        // Jika ada ID, ambil satu data saja untuk halaman show
        return $builder->where('transaksi.id_transaksi', $id)->first();
    }   
}