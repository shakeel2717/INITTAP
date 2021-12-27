<?php

use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CardManageController;
use App\Http\Controllers\admin\StockController;
use App\Http\Controllers\AdminFeatureController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\user\orderCardController;
use App\Http\Controllers\user\PaymentController;
use App\Http\Controllers\user\PricingController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\PublicController;
use App\Http\Controllers\user\UserDashboard;
use App\Http\Controllers\user\UserProfileController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/', [LandingPageController::class, 'index'])->name('home');

Route::name('user.')->group(function () {
    // Public Profile Section
    Route::get('/public/{username}', [PublicController::class, 'publicProfile'])->name('public.profile');
    Route::get('/public/save/{username}', [PublicController::class, 'publicProfileSave'])->name('public.profile.save');
});

Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard/index', [UserDashboard::class, 'index'])->name('dashboard.index');
    Route::prefix('order')->name('order.')->group(function () {
        Route::get('/index', [PricingController::class, 'index'])->name('index');
        Route::get('/show/{card}', [PricingController::class, 'show'])->name('show');
        Route::get('/edit/{order}', [PricingController::class, 'edit'])->name('edit');
    });
    Route::prefix('public')->name('public.')->group(function () {
        Route::get('/single', [PublicController::class, 'single'])->name('single');
        Route::post('/store', [PublicController::class, 'store'])->name('store');
        Route::post('/social', [PublicController::class, 'social'])->name('social');
        Route::get('/edit', [PublicController::class, 'edit'])->name('edit');
        Route::get('/show/{id}', [PublicController::class, 'show'])->name('show');
        Route::post('/addressEdit', [PublicController::class, 'addressEdit'])->name('addressEdit');
        Route::post('/socialEdit', [PublicController::class, 'socialEdit'])->name('socialEdit');
        Route::post('/websiteEdit', [PublicController::class, 'websiteEdit'])->name('websiteEdit');
        Route::post('/phoneEdit', [PublicController::class, 'phoneEdit'])->name('phoneEdit');
        Route::post('/emailEdit', [PublicController::class, 'emailEdit'])->name('emailEdit');
        Route::post('/aboutEdit', [PublicController::class, 'aboutEdit'])->name('aboutEdit');
        Route::post('/mainEdit', [PublicController::class, 'mainEdit'])->name('mainEdit');
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
    Route::resource('/stock', StockController::class);
    Route::get('/index', [AdminController::class, 'index'])->name('index');
    Route::get('users', [AdminController::class, 'users'])->name('users');
    Route::get('add-users', [AdminController::class, 'addUsers'])->name('addUsers');
    Route::post('add-users', [AdminController::class, 'addUsersReq'])->name('addUsersReq');
    Route::get('user/edit/{id}', [AdminController::class, 'userEdit'])->name('userEdit');
    Route::post('user/userEditReq/', [AdminController::class, 'userEditReq'])->name('userEditReq');

    Route::get('orders', [AdminController::class, 'orders'])->name('orders');
    Route::post('order/update/{id}', [AdminController::class, 'oderUpdate'])->name('order.update');
    Route::get('shipping', [AdminController::class, 'shipping'])->name('shipping');
    Route::get('cards/pause/{card}', [CardManageController::class, 'cardPause'])->name('cards.pause');
    Route::get('cards/active/{card}', [CardManageController::class, 'cardActive'])->name('cards.active');
    Route::get('cards/feature/{feature}', [AdminFeatureController::class, 'show'])->name('feature.show');
    Route::get('cards/feature/{feature}/edit', [AdminFeatureController::class, 'edit'])->name('feature.edit');
    Route::get('cards/feature/{feature}/delete', [AdminFeatureController::class, 'delete'])->name('feature.delete');
    Route::post('cards/feature/update', [AdminFeatureController::class, 'update'])->name('feature.update');
    Route::resource('cards', CardManageController::class);
    Route::get('user/show/{id}', [AdminController::class, 'userShow'])->name('userShow');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

// Payment Getway URL
Route::post('store', [orderCardController::class, 'store'])->name('store');

Route::prefix('api')->name('api.')->group(function () {
    Route::post('payment/success', [PaymentController::class, 'success'])->name('success');
    Route::post('payment/failed', [PaymentController::class, 'failed'])->name('failed');
});
