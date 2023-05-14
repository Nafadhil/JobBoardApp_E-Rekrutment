<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JobSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'position' => 'IT',
            'location' => "Jaksel",
            'end_date' => "1 Juni 2023",
        ];

        // Simple Queries
        $this->db->table('jobs')->insert($data);

        $data = [
            'position' => 'UI/UX',
            'location' => "Jaksel",
            'end_date' => "1 Juni 2023",
        ];
        // Using Query Builder
        $this->db->table('jobs')->insert($data);
    }
}