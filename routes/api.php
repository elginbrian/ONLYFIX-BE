<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserAttachmentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderAttachmentController;
use App\Http\Controllers\ReviewController;

Route::middleware(['api'])->group(function () {
    Route::get('/', function () {
        return response()->json([
            'message' => 'Welcome to OnlyFix BE',
            'teamMembers' => [
                ['name' => 'Muhammad Zaidan Azizi', 'role' => 'PM'],
                ['name' => 'Muhammad Tony Putra', 'role' => 'UI/UX'],
                ['name' => 'Dimas Rezananda', 'role' => 'FE'],
                ['name' => 'Edgar Davin Danuarta', 'role' => 'FE'],
                ['name' => 'Elgin Brian Wahyu Bramadhika', 'role' => 'BE'],
            ],
        ]);
    });

    Route::resource('users', UserController::class);
    Route::resource('technicians', TechnicianController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('user_attachments', UserAttachmentController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('order_attachments', OrderAttachmentController::class);
    Route::resource('reviews', ReviewController::class);
});