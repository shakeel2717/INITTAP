<?php

use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CardManageController;
use App\Http\Controllers\admin\CorporateController as AdminCorporateController;
use App\Http\Controllers\admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\admin\ReferController;
use App\Http\Controllers\admin\StockController;
use App\Http\Controllers\AdminFeatureController;
use App\Http\Controllers\corporate\CardBuyController;
use App\Http\Controllers\corporate\PaymentController as CorporatePaymentController;
use App\Http\Controllers\corporate\UserManagerController;
use App\Http\Controllers\CorporateAuthController;
use App\Http\Controllers\CorporateController;
use App\Http\Controllers\CorporateTransaction;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\user\AffiliateController;
use App\Http\Controllers\user\orderCardController;
use App\Http\Controllers\user\PaymentController;
use App\Http\Controllers\user\PricingController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\PublicController;
use App\Http\Controllers\user\UserDashboard;
use App\Http\Controllers\user\UserProfileController;
use App\Http\Controllers\UserPaymentController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/', [LandingPageController::class, 'index'])->name('home');
Route::post('/form-store', [LandingPageController::class, 'store'])->name('guest.form.store');

Route::name('user.')->group(function () {
    // Public Profile Section
    Route::get('/me/{username}', [PublicController::class, 'publicProfile'])->name('public.profile');
    Route::get('/me/{username}/qr', [PublicController::class, 'publicQr'])->name('public.profile.qr');
    Route::get('/me/save/{username}', [PublicController::class, 'publicProfileSave'])->name('public.profile.save');
});

Route::middleware(['auth', 'redirectcorporate'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard/index', [UserDashboard::class, 'index'])->name('dashboard.index');
    Route::resource('affiliate', AffiliateController::class);
    Route::resource('payment', UserPaymentController::class);
    Route::prefix('order')->name('order.')->group(function () {
        Route::get('/index', [PricingController::class, 'index'])->name('index');
        Route::get('/show/{card}', [PricingController::class, 'show'])->name('show');
        Route::get('/edit/{order}', [PricingController::class, 'edit'])->name('edit');
    });
    Route::prefix('public')->name('public.')->group(function () {
        Route::get('/single', [PublicController::class, 'single'])->name('single');
        Route::post('/store', [PublicController::class, 'store'])->name('store');
        Route::post('/social', [PublicController::class, 'social'])->name('social');
        Route::post('/social/destroy', [PublicController::class, 'socialDestroy'])->name('social.destroy');
        Route::get('/edit', [PublicController::class, 'edit'])->name('edit');
        Route::get('/show/{id}', [PublicController::class, 'show'])->name('show');
        Route::post('/addressEdit', [PublicController::class, 'addressEdit'])->name('addressEdit');
        Route::post('/socialEdit', [PublicController::class, 'socialEdit'])->name('socialEdit');
        Route::post('/websiteEdit', [PublicController::class, 'websiteEdit'])->name('websiteEdit');
        Route::post('/website/destroy', [PublicController::class, 'websiteDestroy'])->name('website.destroy');
        Route::post('/phoneEdit', [PublicController::class, 'phoneEdit'])->name('phoneEdit');
        Route::post('/phone/destroy', [PublicController::class, 'phoneDestroy'])->name('phone.destroy');
        Route::post('/emailEdit', [PublicController::class, 'emailEdit'])->name('emailEdit');
        Route::post('/email/destroy', [PublicController::class, 'emailDestroy'])->name('email.destroy');
        Route::post('/aboutEdit', [PublicController::class, 'aboutEdit'])->name('aboutEdit');
        Route::post('/mainEdit', [PublicController::class, 'mainEdit'])->name('mainEdit');
        Route::get('/qrDownload', [PublicController::class, 'qrDownload'])->name('qr.download');
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
    Route::get('all-admin', [AdminController::class, 'allAdmin'])->name('allAdmin');
    Route::get('admin-edit/{id}', [AdminController::class, 'editAdmin'])->name('editAdmin');
    Route::get('admin-delete/{id}', [AdminController::class, 'deleteAdmin'])->name('deleteAdmin');
    Route::post('admin-update', [AdminController::class, 'adminUpdate'])->name('adminUpdate');
    Route::get('add-admin', [AdminController::class, 'addAdmin'])->name('addAdmin');
    Route::post('add-admin', [AdminController::class, 'addAdminReq'])->name('addAdminReq');
    Route::post('add-users', [AdminController::class, 'addUsersReq'])->name('addUsersReq');
    Route::get('user/edit/{id}', [AdminController::class, 'userEdit'])->name('userEdit');
    Route::get('user/edit/public/{id}', [AdminController::class, 'userPublicEdit'])->name('userPublicEdit');
    Route::post('user/store/public/{id}', [AdminController::class, 'userPublicStore'])->name('userPublicStore');
    Route::post('user/social/public/{id}', [AdminController::class, 'userPublicSocial'])->name('userPublicSocial');
    Route::post('user/userEditReq/', [AdminController::class, 'userEditReq'])->name('userEditReq');

    Route::get('orders', [AdminController::class, 'orders'])->name('orders');
    Route::post('order/update/{id}', [AdminController::class, 'oderUpdate'])->name('order.update');
    Route::get('order/qr/{format}/{user}', [AdminController::class, 'qrDownload'])->name('order.qrDownload');
    Route::get('shipping', [AdminController::class, 'shipping'])->name('shipping');
    Route::get('cards/pause/{card}', [CardManageController::class, 'cardPause'])->name('cards.pause');
    Route::get('cards/active/{card}', [CardManageController::class, 'cardActive'])->name('cards.active');
    Route::get('cards/feature/{feature}', [AdminFeatureController::class, 'show'])->name('feature.show');
    Route::get('cards/feature/{feature}/edit', [AdminFeatureController::class, 'edit'])->name('feature.edit');
    Route::get('cards/feature/{feature}/delete', [AdminFeatureController::class, 'delete'])->name('feature.delete');
    Route::post('cards/feature/update', [AdminFeatureController::class, 'update'])->name('feature.update');
    Route::resource('cards', CardManageController::class);
    Route::resource('corporate', AdminCorporateController::class);
    Route::get('user/show/{id}', [AdminController::class, 'userShow'])->name('userShow');
    Route::post('user/show/update', [AdminController::class, 'userUpdate'])->name('userUpdate');
    Route::get('payments/index', [AdminPaymentController::class, 'index'])->name('payment.index');
    Route::get('contact/forms', [AdminController::class, 'contactForm'])->name('contact.form');
    Route::post('corporate/subscription/fees', [AdminFeatureController::class, 'subscriptionFees'])->name('subscription.fees');
    Route::resource('refer', ReferController::class);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});



// Corporate Login Routes
Route::prefix('corporate')->name('corporate.')->group(function () {
    Route::get('auth/login', [CorporateAuthController::class, 'login'])->name('auth.login');
    Route::post('auth/login', [CorporateAuthController::class, 'loginReq'])->name('auth.login.req');
    Route::resource('auth', CorporateAuthController::class);
    Route::prefix('dashboard')->name('dashboard.')->middleware(['corporate'])->group(function () {
        Route::resource('index', CorporateController::class);
        Route::middleware('corporateaccess')->group(function () {
            Route::delete('users/deactivate/{user}', [UserManagerController::class, 'userDeactivate'])->name('users.deactivate');
            Route::resource('users', UserManagerController::class);
            Route::resource('cards', CardBuyController::class);
        });
        Route::resource('payments', CorporatePaymentController::class);
        Route::get('transactions/payments', [CorporateTransaction::class, 'payments'])->name('transactions.payments');
        Route::resource('transactions', CorporateTransaction::class);
        Route::get('user/qr/{format}/{user}', [UserManagerController::class, 'qrDownload'])->name('user.qrDownload');
    });
});




// Payment Getway URL
Route::post('store', [orderCardController::class, 'store'])->name('store');

Route::prefix('api')->name('api.')->group(function () {
    Route::post('payment/init', [PaymentController::class, 'init'])->name('init');
    Route::get('payment/success', [PaymentController::class, 'success'])->name('success');
    Route::get('payment/failed', [PaymentController::class, 'failed'])->name('failed');
    Route::post('payment/attempt', [PaymentController::class, 'attemptPayment'])->name('attempt');

    // eDahab
    Route::get('payment/edahab/success', [PaymentController::class, 'edahab'])->name('edahab.success');
});
