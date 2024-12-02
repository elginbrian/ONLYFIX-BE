<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CustomerSeeder::class,
            TechnicianSeeder::class,
            OrderSeeder::class,
            OrderAttachmentSeeder::class,
            ReviewSeeder::class,
            UserAttachmentSeeder::class
        ]);
    }
}
