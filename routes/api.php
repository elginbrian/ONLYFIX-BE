<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    UserController,
    TechnicianController,
    CustomerController,
    UserAttachmentController,
    OrderController,
    OrderManagementController,
    ReviewController,
    ProfileController,
    AttachmentController
};

Route::prefix('api/v1')->middleware(['api'])->group(function () {
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

    // Auth Routes
    Route::controller(AuthController::class)->group(function () {
        Route::post('register', 'register');
        Route::post('login', 'login');
        Route::post('logout', 'logout')->middleware('auth:api');
        Route::get('current-user', 'currentUser')->middleware('auth:api');
        Route::get('csrf-token', function () {
            return response()->json(['csrfToken' => csrf_token()]);
        });
    });

    // User Routes
    Route::resource('users', UserController::class)->except(['create', 'edit']);
    Route::resource('technicians', TechnicianController::class)->only(['index', 'show', 'store', 'update', 'destroy']);
    Route::resource('customers', CustomerController::class)->only(['index', 'show', 'store', 'update', 'destroy']);
    Route::controller(ProfileController::class)->group(function () {
        Route::get('profile/{user_id}', 'show');
        Route::put('profile/{user_id}', 'update');
    });
    Route::resource('user-attachments', UserAttachmentController::class)->except(['create', 'edit']);

    // Order Routes
    Route::resource('orders', OrderController::class)->except(['create', 'edit']);
    Route::controller(OrderManagementController::class)->group(function () {
        Route::get('orders/{order_id}', 'show');
        Route::post('orders', 'store');
        Route::post('orders/{order_id}/attachments', 'addAttachment');
        Route::post('orders/{order_id}/review', 'addReview');
    });

    // Review Routes
    Route::resource('reviews', ReviewController::class)->only(['index', 'show', 'store', 'update', 'destroy']);

    // Attachment Routes
    Route::controller(AttachmentController::class)->group(function () {
        Route::get('attachments/user/{user_id}', 'getUserAttachments');
        Route::get('attachments/order/{order_id}', 'getOrderAttachments');
        Route::post('attachments/user/{user_id}', 'storeUserAttachment');
        Route::post('attachments/order/{order_id}', 'storeOrderAttachment');
    });
});
