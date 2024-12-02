<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserAttachmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userAttachments = [
            ['attachment_id' => 98765432, 'user_id' => 12345678, 'file_url' => 'https://example.com/uploads/profile1.jpg', 'uploaded_at' => '2024-12-01'],
            ['attachment_id' => 87654321, 'user_id' => 23456789, 'file_url' => 'https://example.com/uploads/profile2.jpg', 'uploaded_at' => '2024-12-02'],
            ['attachment_id' => 76543210, 'user_id' => 34567890, 'file_url' => 'https://example.com/uploads/profile3.jpg', 'uploaded_at' => '2024-12-03'],
            ['attachment_id' => 65432109, 'user_id' => 45678901, 'file_url' => 'https://example.com/uploads/profile4.jpg', 'uploaded_at' => '2024-12-04'],
            ['attachment_id' => 54321098, 'user_id' => 56789012, 'file_url' => 'https://example.com/uploads/profile5.jpg', 'uploaded_at' => '2024-12-05'],
            ['attachment_id' => 43210987, 'user_id' => 67890123, 'file_url' => 'https://example.com/uploads/profile6.jpg', 'uploaded_at' => '2024-12-06'],
            ['attachment_id' => 32109876, 'user_id' => 78901234, 'file_url' => 'https://example.com/uploads/profile7.jpg', 'uploaded_at' => '2024-12-07'],
            ['attachment_id' => 21098765, 'user_id' => 89012345, 'file_url' => 'https://example.com/uploads/profile8.jpg', 'uploaded_at' => '2024-12-08'],
            ['attachment_id' => 10987654, 'user_id' => 90123456, 'file_url' => 'https://example.com/uploads/profile9.jpg', 'uploaded_at' => '2024-12-09'],
            ['attachment_id' => 98765431, 'user_id' => 11234568, 'file_url' => 'https://example.com/uploads/profile10.jpg', 'uploaded_at' => '2024-12-10'],
            ['attachment_id' => 87654320, 'user_id' => 22345679, 'file_url' => 'https://example.com/uploads/profile11.jpg', 'uploaded_at' => '2024-12-11'],
            ['attachment_id' => 76543209, 'user_id' => 33456780, 'file_url' => 'https://example.com/uploads/profile12.jpg', 'uploaded_at' => '2024-12-12'],
            ['attachment_id' => 65432108, 'user_id' => 44567891, 'file_url' => 'https://example.com/uploads/profile13.jpg', 'uploaded_at' => '2024-12-13'],
            ['attachment_id' => 54321087, 'user_id' => 55678902, 'file_url' => 'https://example.com/uploads/profile14.jpg', 'uploaded_at' => '2024-12-14'],
            ['attachment_id' => 43210976, 'user_id' => 66789013, 'file_url' => 'https://example.com/uploads/profile15.jpg', 'uploaded_at' => '2024-12-15'],
            ['attachment_id' => 32109865, 'user_id' => 77890124, 'file_url' => 'https://example.com/uploads/profile16.jpg', 'uploaded_at' => '2024-12-16'],
            ['attachment_id' => 21098754, 'user_id' => 88901235, 'file_url' => 'https://example.com/uploads/profile17.jpg', 'uploaded_at' => '2024-12-17'],
            ['attachment_id' => 10987643, 'user_id' => 99012346, 'file_url' => 'https://example.com/uploads/profile18.jpg', 'uploaded_at' => '2024-12-18'],
            ['attachment_id' => 98765430, 'user_id' => 10123457, 'file_url' => 'https://example.com/uploads/profile19.jpg', 'uploaded_at' => '2024-12-19'],
            ['attachment_id' => 87654319, 'user_id' => 11234569, 'file_url' => 'https://example.com/uploads/profile20.jpg', 'uploaded_at' => '2024-12-20'],
        ];

        DB::table('user_attachments')->insert($userAttachments);
    }
}
