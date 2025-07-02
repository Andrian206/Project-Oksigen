<?php
namespace App\Models;
use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table            = 'admins';
    protected $primaryKey       = 'id_admin';
    protected $allowedFields    = ['username', 'password', 'nama_lengkap'];
    protected $useTimestamps    = true;
}