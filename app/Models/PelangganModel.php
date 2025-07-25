<?php
namespace App\Models;
use CodeIgniter\Model;

class PelangganModel extends Model
{
    protected $table            = 'pelanggan';
    protected $primaryKey       = 'id_pelanggan';
    protected $allowedFields    = ['nama', 'jenis_kelamin', 'alamat', 'no_hp', 'jaminan_tabung'];
    protected $useTimestamps    = true;
}