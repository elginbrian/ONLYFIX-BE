<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TechnicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technicians = [
            ['user_id' => 34567890, 'description' => 'Tukang listrik berpengalaman, ahli dalam instalasi dan perbaikan listrik.', 'price' => 200000, 'phone_num' => '081234567890', 'city' => 'Jakarta', 'rating' => 4.8, 'category' => 'electrician', 'availability' => 'available'],
            ['user_id' => 45678901, 'description' => 'Tukang pipa terampil dengan pengalaman lebih dari 5 tahun.', 'price' => 250000, 'phone_num' => '081234567891', 'city' => 'Bandung', 'rating' => 4.6, 'category' => 'plumber', 'availability' => 'available'],
            ['user_id' => 89012345, 'description' => 'Tukang bangunan dengan keahlian tinggi dalam konstruksi rumah dan gedung.', 'price' => 350000, 'phone_num' => '081234567892', 'city' => 'Surabaya', 'rating' => 4.7, 'category' => 'builder', 'availability' => 'available'],
            ['user_id' => 90123456, 'description' => 'Tukang kayu profesional, ahli dalam pembuatan dan perbaikan furnitur.', 'price' => 200000, 'phone_num' => '081234567893', 'city' => 'Medan', 'rating' => 4.5, 'category' => 'carpenter', 'availability' => 'busy'],
            ['user_id' => 44567891, 'description' => 'Tukang listrik dengan pengalaman luas dalam perbaikan instalasi rumah.', 'price' => 220000, 'phone_num' => '081234567894', 'city' => 'Yogyakarta', 'rating' => 4.6, 'category' => 'electrician', 'availability' => 'available'],
            ['user_id' => 55678902, 'description' => 'Tukang pipa berlisensi dan berpengalaman dalam instalasi sanitasi rumah.', 'price' => 240000, 'phone_num' => '081234567895', 'city' => 'Semarang', 'rating' => 4.4, 'category' => 'plumber', 'availability' => 'available'],
            ['user_id' => 99012346, 'description' => 'Tukang bangunan dengan spesialisasi dalam renovasi rumah dan gedung besar.', 'price' => 370000, 'phone_num' => '081234567896', 'city' => 'Makassar', 'rating' => 4.9, 'category' => 'builder', 'availability' => 'busy'],
            ['user_id' => 10123457, 'description' => 'Tukang kayu dengan pengalaman luas dalam pembuatan lemari dan meja kerja.', 'price' => 210000, 'phone_num' => '081234567897', 'city' => 'Denpasar', 'rating' => 4.3, 'category' => 'carpenter', 'availability' => 'available'],
        ];

        DB::table('technicians')->insert($technicians);
    }
}
