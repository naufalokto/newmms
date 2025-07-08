<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('type_service')->insert([
            [
                'nama_service' => 'daily',
                'deskripsi' => 'dummy',
            ],
            [
                'nama_service' => 'racing1',
                'deskripsi' => 'dummy',
            ],
            [
                'nama_service' => 'racing2',
                'deskripsi' => 'dummy',
            ],
        ]);
    }
}
