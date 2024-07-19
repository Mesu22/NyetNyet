<?php

namespace App\Models;

use CodeIgniter\Model;

class BerandaContentModel extends Model
{
    protected $table = 'beranda_content'; // Sesuaikan dengan nama tabel Anda
    protected $primaryKey = 'id'; // Sesuaikan dengan primary key tabel

    protected $allowedFields = ['title', 'content', 'image']; // Kolom yang dapat diisi

    public function getBerandaContent()
    {
        return $this->findAll(); // Ambil semua data dari tabel
    }
}
