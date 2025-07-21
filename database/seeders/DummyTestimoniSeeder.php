<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimoni;
use App\Models\Pengguna;

class DummyTestimoniSeeder extends Seeder
{
    public function run()
    {
        // Ambil beberapa pengguna yang ada
        $pengguna = Pengguna::where('peran', 'cust')->take(6)->get();
        
        // Jika tidak ada pengguna customer, buat dummy pengguna
        if ($pengguna->count() < 6) {
            $dummyPengguna = [];
            for ($i = 1; $i <= 6; $i++) {
                $dummyPengguna[] = Pengguna::create([
                    'nama' => "Customer $i",
                    'username' => "customer$i",
                    'password' => bcrypt('password'),
                    'no_hp' => "0812345678$i",
                    'peran' => 'cust'
                ]);
            }
            $pengguna = collect($dummyPengguna);
        }

        $testimonials = [
            [
                'nama' => 'Sarah Johnson',
                'isi_testimoni' => 'The service at Mifta Motor Sport was exceptional! My bike feels brand new after the tune-up. The mechanics are highly skilled and professional. Highly recommended for any motorcycle enthusiast!',
                'rating_bintang' => 5,
                'jenis_kelamin' => 'P'
            ],
            [
                'nama' => 'Michael Chen',
                'isi_testimoni' => 'Outstanding racing tune-up service! My bike performance improved dramatically. The team really knows their stuff when it comes to high-performance motorcycles. Worth every penny!',
                'rating_bintang' => 5,
                'jenis_kelamin' => 'L'
            ],
            [
                'nama' => 'Emily Rodriguez',
                'isi_testimoni' => 'Great experience with the daily service. The staff was friendly and explained everything clearly. My bike runs smoothly now and the price was very reasonable. Will definitely come back!',
                'rating_bintang' => 4,
                'jenis_kelamin' => 'P'
            ],
            [
                'nama' => 'David Thompson',
                'isi_testimoni' => 'Professional service from start to finish. The racing level 2 service exceeded my expectations. My motorcycle is now ready for the track with optimal performance. Excellent work!',
                'rating_bintang' => 5,
                'jenis_kelamin' => 'L'
            ],
            [
                'nama' => 'Lisa Wang',
                'isi_testimoni' => 'Very satisfied with the maintenance service. The mechanics are thorough and honest about what needs to be done. My bike is running perfectly now. Great value for money!',
                'rating_bintang' => 4,
                'jenis_kelamin' => 'P'
            ],
            [
                'nama' => 'Robert Kim',
                'isi_testimoni' => 'Amazing racing tune-up! The team at MMS really understands performance motorcycles. My bike now has incredible power and handling. Best motorcycle service I\'ve ever experienced!',
                'rating_bintang' => 5,
                'jenis_kelamin' => 'L'
            ]
        ];

        foreach ($testimonials as $index => $testimonial) {
            // Update nama pengguna jika ada
            if ($pengguna->count() > $index) {
                $pengguna[$index]->update(['nama' => $testimonial['nama']]);
            }

            Testimoni::create([
                'id_pengguna' => $pengguna[$index]->id_pengguna,
                'id_service' => $index + 1, // Dummy service ID
                'isi_testimoni' => $testimonial['isi_testimoni'],
                'menyoroti' => $testimonial['rating_bintang'] == 5 ? 'true' : 'false',
                'rating_bintang' => $testimonial['rating_bintang'],
            ]);
        }
    }
} 