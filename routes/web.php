<?php

use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\ProviderController;
use App\Http\Controllers\Admin\RateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingPageController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//admin route
Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::controller(RateController::class)->group(function () {
        Route::get('/rate-pricing', 'index')->name('rate_pricing');
        Route::post('/rate-pricing/list', 'list');
        Route::get('/rate-pricing/add', 'add')->name('rate_pricing.add');
        Route::get('/rate-pricing/edit/{id}', 'edit')->name('rate_pricing.edit');
        Route::post('/rate-pricing/save', 'store');
        Route::post('/rate-pricing/update', 'update');
        Route::post('/rate-pricing/delete', 'destroy');
    });
    Route::controller(ProviderController::class)->group(function () {
        Route::get('/provider-celular', 'index')->name('provider_celular');
        Route::post('/provider-celular/list', 'list');
        Route::post('/provider-celular/save', 'store');
        Route::post('/provider-celular/delete', 'destroy');
        Route::post('/provider-celular/info', 'info');
        Route::post('/provider-celular/update', 'update');
    });
    Route::controller(PaymentMethodController::class)->group(function () {
        Route::get('/payment-method', 'index')->name('payment_method');
        Route::post('/payment-method/list', 'list');
        Route::post('/payment-method/save', 'store');
        Route::post('/payment-method/delete', 'destroy');
        Route::post('/payment-method/info', 'info');
        Route::post('/payment-method/update', 'update');
    });
});

require __DIR__ . '/auth.php';
