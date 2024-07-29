<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ContactInfoSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'type' => 'address',
                'value' => 'Jl. Contoh No. 123, Kota Contoh',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'type' => 'phone',
                'value' => '+62 123 4567 890',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'type' => 'email',
                'value' => 'info@contoh.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('contact_info')->insertBatch($data);
    }
}