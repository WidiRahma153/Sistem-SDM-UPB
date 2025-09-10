<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin Sistem',
                'password' => '123456', // akan otomatis di-hash karena 'password' => 'hashed' di model
                'role' => 'admin',
                'id_dosen' => null,
            ]
        );

        // Dosen
        User::updateOrCreate(
            ['email' => 'dosen1@example.com'],
            [
                'name' => 'Dosen Satu',
                'password' => '123456', // password dosen
                'role' => 'dosen',
                'id_dosen' => 1, 
            ]
        );
    }
}

