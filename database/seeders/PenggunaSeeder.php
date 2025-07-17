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
            'no_hp' => '08123456789',
        ]);

        Pengguna::create([
            'nama' => 'Admin Dua',
            'username' => 'admin22',
            'password' => Hash::make('admin2123'),
            'peran' => 'admin',
            'no_hp' => '08123456788',
        ]);

        Pengguna::create([
            'nama' => 'Customer Satu',
            'username' => 'cust1',
            'password' => Hash::make('cust123'),
            'peran' => 'cust',
            'no_hp' => '08123456787',
        ]);
    }
} 