<?php

use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\user\orderCardController;
use App\Http\Controllers\user\PaymentController;
use App\Http\Controllers\user\PricingController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\PublicController;
use App\Http\Controllers\user\UserDashboard;
use App\Http\Controllers\user\UserProfileController;
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
    Route::prefix('public')->name('public.')->group(function () {
        Route::get('/single', [PublicController::class, 'single'])->name('single');
        Route::get('/edit', [PublicController::class, 'edit'])->name('edit');
        Route::get('/show/{id}', [PublicController::class, 'show'])->name('show');
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
    Route::post('login', [AdminAuthController::class, 'loginReq'])->name('login.req');
});

// Admin Dashboard
Route::middleware('admin')->prefix('admin/dashboard')->name('admin.dashboard.')->group(function () {
    Route::get('/index', [AdminController::class, 'index'])->name('index');
    Route::get('users', [AdminController::class, 'users'])->name('users');
    Route::get('orders', [AdminController::class, 'orders'])->name('orders');
    Route::post('order/update/{id}', [AdminController::class, 'oderUpdate'])->name('order.update');
    Route::get('shipping', [AdminController::class, 'shipping'])->name('shipping');
    Route::get('user/show/{id}', [AdminController::class, 'userShow'])->name('userShow');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

// Payment Getway URL
Route::post('store', [orderCardController::class, 'store'])->name('store');

Route::prefix('api')->name('api.')->group(function () {
    Route::post('payment/success', [PaymentController::class, 'success'])->name('success');
    Route::post('payment/failed', [PaymentController::class, 'failed'])->name('failed');
});
