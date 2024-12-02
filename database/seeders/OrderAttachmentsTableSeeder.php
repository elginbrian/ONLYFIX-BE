<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderAttachmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orderAttachments = [
            ['attachment_id' => 12345678, 'order_id' => 10001, 'file_url' => 'https://example.com/uploads/order1_invoice.pdf', 'uploaded_at' => '2024-12-01'],
            ['attachment_id' => 23456789, 'order_id' => 10002, 'file_url' => 'https://example.com/uploads/order2_invoice.pdf', 'uploaded_at' => '2024-12-02'],
            ['attachment_id' => 34567890, 'order_id' => 10003, 'file_url' => 'https://example.com/uploads/order3_invoice.pdf', 'uploaded_at' => '2024-12-03'],
            ['attachment_id' => 45678901, 'order_id' => 10004, 'file_url' => 'https://example.com/uploads/order4_invoice.pdf', 'uploaded_at' => '2024-12-04'],
            ['attachment_id' => 56789012, 'order_id' => 10005, 'file_url' => 'https://example.com/uploads/order5_invoice.pdf', 'uploaded_at' => '2024-12-05'],
            ['attachment_id' => 67890123, 'order_id' => 10006, 'file_url' => 'https://example.com/uploads/order6_invoice.pdf', 'uploaded_at' => '2024-12-06'],
            ['attachment_id' => 78901234, 'order_id' => 10007, 'file_url' => 'https://example.com/uploads/order7_invoice.pdf', 'uploaded_at' => '2024-12-07'],
            ['attachment_id' => 89012345, 'order_id' => 10008, 'file_url' => 'https://example.com/uploads/order8_invoice.pdf', 'uploaded_at' => '2024-12-08'],
            ['attachment_id' => 90123456, 'order_id' => 10009, 'file_url' => 'https://example.com/uploads/order9_invoice.pdf', 'uploaded_at' => '2024-12-09'],
            ['attachment_id' => 10234567, 'order_id' => 10010, 'file_url' => 'https://example.com/uploads/order10_invoice.pdf', 'uploaded_at' => '2024-12-10'],
            ['attachment_id' => 21345678, 'order_id' => 10011, 'file_url' => 'https://example.com/uploads/order11_invoice.pdf', 'uploaded_at' => '2024-12-11'],
            ['attachment_id' => 32456789, 'order_id' => 10012, 'file_url' => 'https://example.com/uploads/order12_invoice.pdf', 'uploaded_at' => '2024-12-12'],
            ['attachment_id' => 43567890, 'order_id' => 10013, 'file_url' => 'https://example.com/uploads/order13_invoice.pdf', 'uploaded_at' => '2024-12-13'],
            ['attachment_id' => 54678901, 'order_id' => 10014, 'file_url' => 'https://example.com/uploads/order14_invoice.pdf', 'uploaded_at' => '2024-12-14'],
            ['attachment_id' => 65789012, 'order_id' => 10015, 'file_url' => 'https://example.com/uploads/order15_invoice.pdf', 'uploaded_at' => '2024-12-15'],
            ['attachment_id' => 76890123, 'order_id' => 10016, 'file_url' => 'https://example.com/uploads/order16_invoice.pdf', 'uploaded_at' => '2024-12-16'],
            ['attachment_id' => 87901234, 'order_id' => 10017, 'file_url' => 'https://example.com/uploads/order17_invoice.pdf', 'uploaded_at' => '2024-12-17'],
            ['attachment_id' => 98012345, 'order_id' => 10018, 'file_url' => 'https://example.com/uploads/order18_invoice.pdf', 'uploaded_at' => '2024-12-18'],
            ['attachment_id' => 10923456, 'order_id' => 10019, 'file_url' => 'https://example.com/uploads/order19_invoice.pdf', 'uploaded_at' => '2024-12-19'],
            ['attachment_id' => 21034567, 'order_id' => 10020, 'file_url' => 'https://example.com/uploads/order20_invoice.pdf', 'uploaded_at' => '2024-12-20'],
        ];

        DB::table('order_attachments')->insert($orderAttachments);
    }
}
