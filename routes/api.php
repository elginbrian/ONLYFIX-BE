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

Route::get('/', function () {
    return redirect('/api/v1');
});

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
        Route::post('register', 'register')->withoutMiddleware([Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);;
        Route::post('login', 'login')->withoutMiddleware([Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);;
        Route::post('logout', 'logout')->middleware('auth:api');
        Route::get('current-user', 'currentUser')->middleware('auth:api');
    });

    // User Routes
    Route::resource('users', UserController::class)->except(['create', 'edit'])->withoutMiddleware([Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);;
    Route::resource('technicians', TechnicianController::class)->only(['index', 'show', 'store', 'update', 'destroy'])->withoutMiddleware([Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);;
    Route::resource('customers', CustomerController::class)->only(['index', 'show', 'store', 'update', 'destroy'])->withoutMiddleware([Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);;
    Route::controller(ProfileController::class)->group(function () {
        Route::get('profile/{user_id}', 'show')->withoutMiddleware([Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);;
        Route::put('profile/{user_id}', 'update')->withoutMiddleware([Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);;
    });
    Route::resource('user-attachments', UserAttachmentController::class)->except(['create', 'edit'])->withoutMiddleware([Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);;

    // Order Routes
    Route::resource('orders', OrderController::class)->except(['create', 'edit'])->withoutMiddleware([Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);;
    Route::controller(OrderManagementController::class)->group(function () {
        Route::get('orders/{order_id}', 'show')->withoutMiddleware([Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);;
        Route::post('orders', 'store')->withoutMiddleware([Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);;
        Route::post('orders/{order_id}/attachments', 'addAttachment')->withoutMiddleware([Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);;
        Route::post('orders/{order_id}/review', 'addReview')->withoutMiddleware([Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);;
    });

    // Review Routes
    Route::resource('reviews', ReviewController::class)->only(['index', 'show', 'store', 'update', 'destroy'])->withoutMiddleware([Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);;

    // Attachment Routes
    Route::controller(AttachmentController::class)->group(function () {
        Route::get('attachments/user/{user_id}', 'getUserAttachments')->withoutMiddleware([Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);;
        Route::get('attachments/order/{order_id}', 'getOrderAttachments')->withoutMiddleware([Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);;
        Route::post('attachments/user/{user_id}', 'storeUserAttachment')->withoutMiddleware([Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);;
        Route::post('attachments/order/{order_id}', 'storeOrderAttachment')->withoutMiddleware([Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);;
    });
});
