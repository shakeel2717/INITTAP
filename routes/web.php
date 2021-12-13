<?php

use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\UserDashboard;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';
Route::redirect('/', '/login', 301);

Route::middleware(['auth', 'verified'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard/index', [UserDashboard::class, 'index'])->name('dashboard.index');
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/index', [ProfileController::class, 'index'])->name('index');
        Route::post('/index', [ProfileController::class, 'profileUpdate'])->name('update');
        Route::get('/password', [ProfileController::class, 'password'])->name('password');
        Route::post('/password', [ProfileController::class, 'passwordUpdate'])->name('password.update');
    });
});
