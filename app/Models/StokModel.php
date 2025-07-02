<?php

namespace App\Models;

use CodeIgniter\Model;

class StokModel extends Model
{
    protected $table            = 'stok';
    protected $primaryKey       = 'id_stok';
    protected $allowedFields    = ['id_gas', 'jumlah', 'tipe', 'keterangan'];
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = ''; 
}