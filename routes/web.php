<?php

use App\Http\Controllers\user\UserDashboard;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';
Route::redirect('/', '/login', 301);

Route::middleware(['auth','verified'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard/index', [UserDashboard::class, 'index'])->name('dashboard.index');
});
