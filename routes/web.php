<?php

use App\Http\Controllers\user\PaymentController;
use App\Http\Controllers\user\PricingController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\UserDashboard;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';
Route::redirect('/', '/login', 301);

Route::middleware(['auth', 'verified'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard/index', [UserDashboard::class, 'index'])->name('dashboard.index');
    Route::prefix('order')->name('order.')->group(function () {
        Route::get('/index', [PricingController::class, 'index'])->name('index');
        Route::get('/test', [PricingController::class, 'test'])->name('test');
    });
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/index', [ProfileController::class, 'index'])->name('index');
        Route::post('/index', [ProfileController::class, 'profileUpdate'])->name('update');
        Route::get('/password', [ProfileController::class, 'password'])->name('password');
        Route::post('/password', [ProfileController::class, 'passwordUpdate'])->name('password.update');
        Route::post('/address', [ProfileController::class, 'addressUpdate'])->name('address.update');
    });
});

// Payment Getway URL

Route::prefix('api')->name('api.')->group(function () {
    Route::post('payment/success', [PaymentController::class, 'success'])->name('success');
    Route::post('payment/failed', [PaymentController::class, 'failed'])->name('failed');
});
