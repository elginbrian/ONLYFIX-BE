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
        Schema::create('order_attachments', function (Blueprint $table) {
            $table->id('attachment_id');
            $table->unsignedBigInteger('order_id'); 
            $table->string('file_url');
            $table->timestamp('uploaded_at')->nullable();
            $table->timestamps();
        
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_attachments');
    }
};
