<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserAttachmentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderAttachmentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\OrderManagementController; 
use App\Http\Controllers\AttachmentController; 

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

    // User routes
    Route::resource('users', UserController::class);
    Route::resource('technicians', TechnicianController::class);
    Route::resource('customers', CustomerController::class);
    Route::get('profile/{user_id}', [ProfileController::class, 'show']); 
    Route::put('profile/{user_id}', [ProfileController::class, 'update']);
    Route::resource('user_attachments', UserAttachmentController::class);

    // Order routes
    Route::resource('orders', OrderController::class);
    Route::get('order/{order_id}', [OrderManagementController::class, 'show']);  
    Route::post('orders', [OrderManagementController::class, 'store']); 
    Route::post('orders/{order_id}/attachments', [OrderManagementController::class, 'addAttachment']); 
    Route::post('orders/{order_id}/review', [OrderManagementController::class, 'addReview']); 
    Route::resource('order_attachments', OrderAttachmentController::class);

    // Review routes
    Route::resource('reviews', ReviewController::class);
    
    // Attachment
    Route::get('attachments/user/{user_id}', [AttachmentController::class, 'getUserAttachments']); 
    Route::get('attachments/order/{order_id}', [AttachmentController::class, 'getOrderAttachments']);  
    Route::post('attachments/user/{user_id}', [AttachmentController::class, 'storeUserAttachment']);  
    Route::post('attachments/order/{order_id}', [AttachmentController::class, 'storeOrderAttachment']); 
}
);

