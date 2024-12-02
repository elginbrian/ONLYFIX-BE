<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reviews = [
            ['review_id' => '83927641', 'order_id' => 10001, 'technician_id' => 41, 'customer_id' => 21, 'rating' => 5, 'comment' => 'Pekerjaan sangat cepat dan hasil memuaskan. Terima kasih!', 'review_date' => '2024-12-01'],
            ['review_id' => '72910583', 'order_id' => 10002, 'technician_id' => 42, 'customer_id' => 22, 'rating' => 4, 'comment' => 'Tukang pipa yang sangat profesional dan terampil.', 'review_date' => '2024-12-02'],
            ['review_id' => '31529764', 'order_id' => 10003, 'technician_id' => 43, 'customer_id' => 23, 'rating' => 5, 'comment' => 'Pekerjaan bangunan sangat baik, saya sangat puas dengan hasilnya.', 'review_date' => '2024-12-03'],
            ['review_id' => '48193075', 'order_id' => 10004, 'technician_id' => 44, 'customer_id' => 24, 'rating' => 3, 'comment' => 'Pekerjaan sedikit terlambat, namun hasilnya baik.', 'review_date' => '2024-12-04'],
            ['review_id' => '24681057', 'order_id' => 10005, 'technician_id' => 45, 'customer_id' => 25, 'rating' => 5, 'comment' => 'Tukang listrik yang sangat kompeten, pekerjaan selesai tepat waktu.', 'review_date' => '2024-12-05'],
            ['review_id' => '53127480', 'order_id' => 10006, 'technician_id' => 46, 'customer_id' => 26, 'rating' => 4, 'comment' => 'Pipa terpasang dengan baik, tapi ada sedikit masalah dengan tekanan air.', 'review_date' => '2024-12-06'],
            ['review_id' => '97541368', 'order_id' => 10007, 'technician_id' => 47, 'customer_id' => 27, 'rating' => 5, 'comment' => 'Pekerjaan bangunan sangat detail dan sesuai harapan.', 'review_date' => '2024-12-07'],
            ['review_id' => '25813940', 'order_id' => 10008, 'technician_id' => 48, 'customer_id' => 28, 'rating' => 4, 'comment' => 'Tukang kayu yang baik, tetapi sedikit lambat dalam menyelesaikan pekerjaan.', 'review_date' => '2024-12-08'],
            ['review_id' => '60234781', 'order_id' => 10009, 'technician_id' => 41, 'customer_id' => 29, 'rating' => 5, 'comment' => 'Pekerjaan listrik cepat dan rapi, sangat memuaskan!', 'review_date' => '2024-12-09'],
            ['review_id' => '81756392', 'order_id' => 10010, 'technician_id' => 42, 'customer_id' => 30, 'rating' => 4, 'comment' => 'Tukang pipa yang baik, tapi ada sedikit kekurangan dalam kualitas bahan.', 'review_date' => '2024-12-10'],
            ['review_id' => '64902718', 'order_id' => 10011, 'technician_id' => 43, 'customer_id' => 31, 'rating' => 5, 'comment' => 'Renovasi rumah sangat memuaskan, pekerjaannya sangat rapih.', 'review_date' => '2024-12-11'],
            ['review_id' => '98471056', 'order_id' => 10012, 'technician_id' => 44, 'customer_id' => 32, 'rating' => 4, 'comment' => 'Meja dan kursi kayu sangat baik, hanya saja sedikit lebih lama dari yang diharapkan.', 'review_date' => '2024-12-12'],
            ['review_id' => '18769034', 'order_id' => 10013, 'technician_id' => 45, 'customer_id' => 33, 'rating' => 5, 'comment' => 'Tukang listrik ini sangat berkompeten, hasil pekerjaan sangat memuaskan.', 'review_date' => '2024-12-13'],
            ['review_id' => '70234815', 'order_id' => 10014, 'technician_id' => 46, 'customer_id' => 34, 'rating' => 4, 'comment' => 'Pipa terpasang dengan baik, namun harus ada sedikit penyesuaian.', 'review_date' => '2024-12-14'],
            ['review_id' => '51648327', 'order_id' => 10015, 'technician_id' => 47, 'customer_id' => 35, 'rating' => 5, 'comment' => 'Bangunan yang dibangun sangat kokoh dan sesuai dengan desain.', 'review_date' => '2024-12-15'],
            ['review_id' => '26450739', 'order_id' => 10016, 'technician_id' => 48, 'customer_id' => 36, 'rating' => 4, 'comment' => 'Hasil pekerjaan kayu sangat baik, tapi sedikit terlambat.', 'review_date' => '2024-12-16'],
            ['review_id' => '41283695', 'order_id' => 10017, 'technician_id' => 41, 'customer_id' => 21, 'rating' => 5, 'comment' => 'Instalasi listrik selesai dengan sangat baik, sangat direkomendasikan!', 'review_date' => '2024-12-17'],
            ['review_id' => '65372840', 'order_id' => 10018, 'technician_id' => 42, 'customer_id' => 22, 'rating' => 4, 'comment' => 'Instalasi pipa cukup baik, sedikit kurang dalam hal kerapian.', 'review_date' => '2024-12-18'],
            ['review_id' => '84916073', 'order_id' => 10019, 'technician_id' => 43, 'customer_id' => 23, 'rating' => 5, 'comment' => 'Bangunan yang dibangun sangat solid dan sesuai dengan ekspektasi.', 'review_date' => '2024-12-19'],
            ['review_id' => '94021865', 'order_id' => 10020, 'technician_id' => 44, 'customer_id' => 24, 'rating' => 5, 'comment' => 'Pekerjaan kayu sangat detail, hasilnya luar biasa!', 'review_date' => '2024-12-20'],
        ];

        DB::table('reviews')->insert($reviews);
    }
}
