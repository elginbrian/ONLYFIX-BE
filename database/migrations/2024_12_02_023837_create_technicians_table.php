<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('technicians', function (Blueprint $table) {
            $table->id('technician_id');
            $table->unsignedBigInteger('user_id'); 
            $table->string('description');
            $table->double('price');
            $table->string('phone_num');
            $table->string('city');
            $table->double('rating');
            $table->enum('category', ['electrician', 'plumber', 'builder', 'carpenter']);
            $table->string('availability');
            $table->timestamps();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('technicians');
    }
};
