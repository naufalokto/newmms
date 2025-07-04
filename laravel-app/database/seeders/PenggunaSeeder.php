<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;

class PenggunaSeeder extends Seeder
{
    public function run()
    {
        Pengguna::create([
            'nama' => 'Admin Utama',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'peran' => 'admin',
        ]);

        Pengguna::create([
            'nama' => 'Customer Satu',
            'username' => 'cust1',
            'password' => Hash::make('cust123'),
            'peran' => 'cust',
        ]);
    }
}
