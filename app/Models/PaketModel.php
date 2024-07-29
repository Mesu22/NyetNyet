<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketModel extends Model
{
    protected $table = 'pakets';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'deskripsi', 'harga', 'isi_paket'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}