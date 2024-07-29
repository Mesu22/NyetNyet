<?php

namespace App\Models;

use CodeIgniter\Model;

class HeroSectionModel extends Model
{
    protected $table = 'hero_section';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'image', 'whatsapp_number', 'whatsapp_message'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getHeroSections()
    {
        return $this->findAll();
    }

    public function getHeroSection($id)
    {
        return $this->find($id);
    }
}