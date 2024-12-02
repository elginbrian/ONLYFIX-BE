<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            ['order_id' => 10001, 'customer_id' => 21, 'technician_id' => 41, 'date' => '2024-12-01', 'status' => 'pending', 'total_price' => 500000],
            ['order_id' => 10002, 'customer_id' => 22, 'technician_id' => 42, 'date' => '2024-12-02', 'status' => 'confirmed', 'total_price' => 480000],
            ['order_id' => 10003, 'customer_id' => 23, 'technician_id' => 43, 'date' => '2024-12-03', 'status' => 'completed', 'total_price' => 700000],
            ['order_id' => 10004, 'customer_id' => 24, 'technician_id' => 44, 'date' => '2024-12-04', 'status' => 'pending', 'total_price' => 400000],
            ['order_id' => 10005, 'customer_id' => 25, 'technician_id' => 45, 'date' => '2024-12-05', 'status' => 'confirmed', 'total_price' => 600000],
            ['order_id' => 10006, 'customer_id' => 26, 'technician_id' => 46, 'date' => '2024-12-06', 'status' => 'completed', 'total_price' => 350000],
            ['order_id' => 10007, 'customer_id' => 27, 'technician_id' => 47, 'date' => '2024-12-07', 'status' => 'pending', 'total_price' => 750000],
            ['order_id' => 10008, 'customer_id' => 28, 'technician_id' => 48, 'date' => '2024-12-08', 'status' => 'confirmed', 'total_price' => 450000],
            ['order_id' => 10009, 'customer_id' => 29, 'technician_id' => 41, 'date' => '2024-12-09', 'status' => 'completed', 'total_price' => 500000],
            ['order_id' => 10010, 'customer_id' => 30, 'technician_id' => 42, 'date' => '2024-12-10', 'status' => 'pending', 'total_price' => 550000],
            ['order_id' => 10011, 'customer_id' => 31, 'technician_id' => 43, 'date' => '2024-12-11', 'status' => 'confirmed', 'total_price' => 650000],
            ['order_id' => 10012, 'customer_id' => 32, 'technician_id' => 44, 'date' => '2024-12-12', 'status' => 'completed', 'total_price' => 420000],
            ['order_id' => 10013, 'customer_id' => 33, 'technician_id' => 45, 'date' => '2024-12-13', 'status' => 'pending', 'total_price' => 490000],
            ['order_id' => 10014, 'customer_id' => 34, 'technician_id' => 46, 'date' => '2024-12-14', 'status' => 'confirmed', 'total_price' => 550000],
            ['order_id' => 10015, 'customer_id' => 35, 'technician_id' => 47, 'date' => '2024-12-15', 'status' => 'completed', 'total_price' => 720000],
            ['order_id' => 10016, 'customer_id' => 36, 'technician_id' => 48, 'date' => '2024-12-16', 'status' => 'pending', 'total_price' => 460000],
            ['order_id' => 10017, 'customer_id' => 21, 'technician_id' => 41, 'date' => '2024-12-17', 'status' => 'confirmed', 'total_price' => 530000],
            ['order_id' => 10018, 'customer_id' => 22, 'technician_id' => 42, 'date' => '2024-12-18', 'status' => 'completed', 'total_price' => 580000],
            ['order_id' => 10019, 'customer_id' => 23, 'technician_id' => 43, 'date' => '2024-12-19', 'status' => 'pending', 'total_price' => 650000],
            ['order_id' => 10020, 'customer_id' => 24, 'technician_id' => 44, 'date' => '2024-12-20', 'status' => 'confirmed', 'total_price' => 700000],
        ];

        DB::table('orders')->insert($orders);
    }
}
