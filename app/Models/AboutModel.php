<?php

namespace App\Models;

use CodeIgniter\Model;

class AboutModel extends Model
{
    protected $table = 'about';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'description', 'image'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}