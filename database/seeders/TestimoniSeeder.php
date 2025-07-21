<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimoni;
use App\Models\Service;

class TestimoniSeeder extends Seeder
{
    public function run()
    {
        // Ambil semua service yang sudah selesai (status = 'fin')
        $finishedServices = Service::where('status', 'fin')->get();

        // Buat testimoni untuk setiap service yang sudah selesai
        foreach ($finishedServices as $service) {
            // Skip jika sudah ada testimoni untuk service ini
            $existingTestimoni = Testimoni::where('id_service', $service->id_service)->first();
            if ($existingTestimoni) {
                continue;
            }

            // Buat testimoni berdasarkan tipe service
            $testimoniData = $this->getTestimoniData($service->id_tipe_service);
            
            Testimoni::create([
                'id_pengguna' => $service->id_pengguna,
                'id_service' => $service->id_service,
                'isi_testimoni' => $testimoniData['isi_testimoni'],
                'menyoroti' => $testimoniData['menyoroti'],
                'rating_bintang' => $testimoniData['rating_bintang'],
            ]);
        }

        // Buat beberapa testimoni tambahan untuk variasi
        $additionalTestimoni = [
            [
                'id_pengguna' => 6,
                'id_service' => 1, // Service pertama untuk pengguna 6
                'isi_testimoni' => 'Service sangat memuaskan! Mekanik sangat teliti dan profesional. Motor saya sekarang berjalan dengan lancar tanpa masalah. Harga juga sangat terjangkau untuk kualitas service yang diberikan. Sangat direkomendasikan!',
                'menyoroti' => 'true',
                'rating_bintang' => 5,
            ],
            [
                'id_pengguna' => 6,
                'id_service' => 2, // Service kedua untuk pengguna 6
                'isi_testimoni' => 'Tune up racing yang luar biasa! Performa motor saya meningkat drastis. Tim mekanik sangat ahli dalam hal racing dan tuning. Hasilnya melebihi ekspektasi saya. Terima kasih MMS!',
                'menyoroti' => 'true',
                'rating_bintang' => 5,
            ],
            [
                'id_pengguna' => 3,
                'id_service' => 5, // Service untuk pengguna 3
                'isi_testimoni' => 'Service rutin yang sangat baik. Motor saya yang tadinya bergetar saat idle sekarang sudah normal kembali. Mekanik ramah dan menjelaskan setiap langkah service dengan detail. Sangat puas!',
                'menyoroti' => 'false',
                'rating_bintang' => 4,
            ],
            [
                'id_pengguna' => 3,
                'id_service' => 6, // Service racing untuk pengguna 3
                'isi_testimoni' => 'Tune up untuk balapan weekend berhasil dengan sempurna! Motor saya sekarang siap untuk track day. Tim MMS sangat profesional dan memahami kebutuhan racing. Hasil tune up sangat optimal!',
                'menyoroti' => 'true',
                'rating_bintang' => 5,
            ],
        ];

        foreach ($additionalTestimoni as $testimoni) {
            // Skip jika sudah ada testimoni untuk service ini
            $existingTestimoni = Testimoni::where('id_service', $testimoni['id_service'])->first();
            if (!$existingTestimoni) {
                Testimoni::create($testimoni);
            }
        }
    }

    private function getTestimoniData($idTipeService)
    {
        $testimoniData = [
            1 => [ // daily service
                'isi_testimoni' => 'Service harian yang sangat memuaskan. Mekanik sangat teliti dalam pemeriksaan dan perbaikan. Motor saya sekarang berjalan dengan lancar dan efisien. Harga sangat terjangkau untuk kualitas service yang diberikan.',
                'menyoroti' => 'false',
                'rating_bintang' => 4,
            ],
            2 => [ // racing1 service
                'isi_testimoni' => 'Tune up racing yang luar biasa! Performa motor saya meningkat signifikan. Tim mekanik sangat ahli dalam hal racing dan tuning. Hasilnya melebihi ekspektasi saya. Sangat direkomendasikan untuk pecinta racing!',
                'menyoroti' => 'true',
                'rating_bintang' => 5,
            ],
            3 => [ // racing2 service
                'isi_testimoni' => 'Service racing level 2 yang sangat profesional. Ganti oli dan filter dilakukan dengan sempurna. Sistem pendingin juga dicek dengan teliti. Motor saya sekarang siap untuk performa maksimal.',
                'menyoroti' => 'false',
                'rating_bintang' => 4,
            ],
        ];

        return $testimoniData[$idTipeService] ?? [
            'isi_testimoni' => 'Service yang sangat memuaskan. Tim mekanik profesional dan hasil kerja yang berkualitas tinggi.',
            'menyoroti' => 'false',
            'rating_bintang' => 4,
        ];
    }
} 