<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('cabang')->insert([
            [
                'nama_cabang' => 'Pakis',
            ],
            [
                'nama_cabang' => 'Sulfat',
            ],
        ]);
    }
}
