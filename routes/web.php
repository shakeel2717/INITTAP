<?php

use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\user\orderCardController;
use App\Http\Controllers\user\PaymentController;
use App\Http\Controllers\user\PricingController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\UserDashboard;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';
Route::redirect('/', '/login', 301);

Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard/index', [UserDashboard::class, 'index'])->name('dashboard.index');
    Route::prefix('order')->name('order.')->group(function () {
        Route::get('/index', [PricingController::class, 'index'])->name('index');
        Route::get('/show/{card}', [PricingController::class, 'show'])->name('show');
        Route::get('/edit/{order}', [PricingController::class, 'edit'])->name('edit');
        
    });
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/index', [ProfileController::class, 'index'])->name('index');
        Route::post('/index', [ProfileController::class, 'profileUpdate'])->name('update');
        Route::get('/password', [ProfileController::class, 'password'])->name('password');
        Route::post('/password', [ProfileController::class, 'passwordUpdate'])->name('password.update');
        Route::post('/address', [ProfileController::class, 'addressUpdate'])->name('address.update');
    });
});

// Admin Login Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminAuthController::class, 'login'])->name('login');
});

// Admin Dashboard
Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard/index', [AdminController::class, 'index'])->name('dashboard.index');
});

// Payment Getway URL
Route::post('store', [orderCardController::class, 'store'])->name('store');

Route::prefix('api')->name('api.')->group(function () {
    Route::post('payment/success', [PaymentController::class, 'success'])->name('success');
    Route::post('payment/failed', [PaymentController::class, 'failed'])->name('failed');
});
