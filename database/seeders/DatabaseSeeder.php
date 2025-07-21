<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CabangSeeder::class,
            TypeServiceSeeder::class,
            PenggunaSeeder::class,
            ServiceSeeder::class, // Tambahkan ServiceSeeder
            TestimoniSeeder::class, // Tambahkan TestimoniSeeder
            ProdukSeeder::class, // Tambahkan ProdukSeeder

        ]);
        // Tambahkan dummy produk secara manual
        \App\Models\Produk::create([
            'nama_produk' => 'Motul Oil',
            'kategori' => 'Oil',
            'harga' => 350000,
            'stok' => 10,
            'gambar_produk' => null,
            'deskripsi' => 'High quality engine oil.'
        ]);
        \App\Models\Produk::create([
            'nama_produk' => 'Ohlins Suspension',
            'kategori' => 'Second Part',
            'harga' => 28900000,
            'stok' => 5,
            'gambar_produk' => null,
            'deskripsi' => 'Premium suspension for motorcycles.'
        ]);
        \App\Models\Produk::create([
            'nama_produk' => 'Kawasaki H2R',
            'kategori' => 'New Part',
            'harga' => 760000000,
            'stok' => 2,
            'gambar_produk' => null,
            'deskripsi' => 'Superbike for racing.'
        ]);
        \App\Models\Produk::create([
            'nama_produk' => 'MMS T-Shirt',
            'kategori' => 'Apparel',
            'harga' => 150000,
            'stok' => 20,
            'gambar_produk' => null,
            'deskripsi' => 'Official MMS apparel.'
        ]);
    }
} 