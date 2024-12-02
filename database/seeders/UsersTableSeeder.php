<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['user_id' => 12345678, 'username' => 'john_doe', 'email' => 'john@example.com', 'password' => bcrypt('password123'), 'account_type' => 'customer'],
            ['user_id' => 23456789, 'username' => 'jane_smith', 'email' => 'jane@example.com', 'password' => bcrypt('password456'), 'account_type' => 'customer'],
            ['user_id' => 67890123, 'username' => 'alice_johnson', 'email' => 'alice@example.com', 'password' => bcrypt('password789'), 'account_type' => 'customer'],
            ['user_id' => 78901234, 'username' => 'bob_williams', 'email' => 'bob@example.com', 'password' => bcrypt('password101'), 'account_type' => 'customer'],
            ['user_id' => 22345679, 'username' => 'charlie_brown', 'email' => 'charlie@example.com', 'password' => bcrypt('password112'), 'account_type' => 'customer'],
            ['user_id' => 33456780, 'username' => 'david_martin', 'email' => 'david@example.com', 'password' => bcrypt('password113'), 'account_type' => 'customer'],
            ['user_id' => 77890124, 'username' => 'eve_clark', 'email' => 'eve@example.com', 'password' => bcrypt('password114'), 'account_type' => 'customer'],
            ['user_id' => 88901235, 'username' => 'frank_harris', 'email' => 'frank@example.com', 'password' => bcrypt('password115'), 'account_type' => 'customer'],
            ['user_id' => 34567890, 'username' => 'grace_lee', 'email' => 'grace@example.com', 'password' => bcrypt('password116'), 'account_type' => 'customer'],
            ['user_id' => 45678901, 'username' => 'henry_king', 'email' => 'henry@example.com', 'password' => bcrypt('password117'), 'account_type' => 'customer'],
            ['user_id' => 89012345, 'username' => 'irene_young', 'email' => 'irene@example.com', 'password' => bcrypt('password118'), 'account_type' => 'customer'],
            ['user_id' => 90123456, 'username' => 'jack_baker', 'email' => 'jack@example.com', 'password' => bcrypt('password119'), 'account_type' => 'customer'],
            ['user_id' => 77890124, 'username' => 'kelly_smith', 'email' => 'kelly@example.com', 'password' => bcrypt('password120'), 'account_type' => 'customer'],
            ['user_id' => 88901235, 'username' => 'luke_jones', 'email' => 'luke@example.com', 'password' => bcrypt('password121'), 'account_type' => 'customer'],
            ['user_id' => 99012346, 'username' => 'mia_white', 'email' => 'mia@example.com', 'password' => bcrypt('password122'), 'account_type' => 'customer'],
            ['user_id' => 10123457, 'username' => 'nina_green', 'email' => 'nina@example.com', 'password' => bcrypt('password123'), 'account_type' => 'customer']
        ];

        DB::table('users')->insert($users);

        $customers = [
            ['user_id' => 12345678, 'phone_num' => '081234567890', 'address' => 'Jl. Raya Merdeka No.1', 'city' => 'Jakarta'],
            ['user_id' => 23456789, 'phone_num' => '081234567891', 'address' => 'Jl. Pahlawan No.2', 'city' => 'Bandung'],
            ['user_id' => 67890123, 'phone_num' => '081234567892', 'address' => 'Jl. Mawar No.3', 'city' => 'Surabaya'],
            ['user_id' => 78901234, 'phone_num' => '081234567893', 'address' => 'Jl. Kenanga No.4', 'city' => 'Medan'],
            ['user_id' => 22345679, 'phone_num' => '081234567894', 'address' => 'Jl. Cendana No.5', 'city' => 'Yogyakarta'],
            ['user_id' => 33456780, 'phone_num' => '081234567895', 'address' => 'Jl. Bunga No.6', 'city' => 'Semarang'],
            ['user_id' => 77890124, 'phone_num' => '081234567896', 'address' => 'Jl. Kamboja No.7', 'city' => 'Makassar'],
            ['user_id' => 88901235, 'phone_num' => '081234567897', 'address' => 'Jl. Melati No.8', 'city' => 'Denpasar'],
            ['user_id' => 34567890, 'phone_num' => '081234567898', 'address' => 'Jl. Pahlawan No.9', 'city' => 'Palembang'],
            ['user_id' => 45678901, 'phone_num' => '081234567899', 'address' => 'Jl. Senang No.10', 'city' => 'Surakarta'],
            ['user_id' => 89012345, 'phone_num' => '081234567900', 'address' => 'Jl. Gading No.11', 'city' => 'Pontianak'],
            ['user_id' => 90123456, 'phone_num' => '081234567901', 'address' => 'Jl. Gemilang No.12', 'city' => 'Batam'],
            ['user_id' => 77890124, 'phone_num' => '081234567902', 'address' => 'Jl. Pantai No.13', 'city' => 'Bali'],
            ['user_id' => 88901235, 'phone_num' => '081234567903', 'address' => 'Jl. Indah No.14', 'city' => 'Cirebon'],
            ['user_id' => 99012346, 'phone_num' => '081234567904', 'address' => 'Jl. Lestari No.15', 'city' => 'Jakarta'],
            ['user_id' => 10123457, 'phone_num' => '081234567905', 'address' => 'Jl. Indah No.16', 'city' => 'Bengkulu']
        ];

        DB::table('customers')->insert($customers);
    }
}
