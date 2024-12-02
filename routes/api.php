<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserAttachmentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderAttachmentController;
use App\Http\Controllers\ReviewController;

Route::middleware(['api'])->group(function () {
    Route::get('/', function () {
        return response('Welcome to OnlyFix BE by Elgin Brian.');
    });

    Route::resource('users', UserController::class);
    Route::resource('technicians', TechnicianController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('user_attachments', UserAttachmentController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('order_attachments', OrderAttachmentController::class);
    Route::resource('reviews', ReviewController::class);
});