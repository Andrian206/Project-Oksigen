<?php
namespace App\Models;
use CodeIgniter\Model;

class GasModel extends Model
{
    protected $table            = 'jenis_gas'; 
    protected $primaryKey       = 'id_gas';
    protected $allowedFields    = ['nama_gas', 'harga_beli', 'harga_jual'];
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
}