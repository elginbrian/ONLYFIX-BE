<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('technician_id');
            $table->timestamp('date');
            $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled']);
            $table->double('total_price');
            $table->timestamps();
        
            $table->foreign('customer_id')->references('customer_id')->on('customers')->onDelete('cascade');
            $table->foreign('technician_id')->references('technician_id')->on('technicians')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
