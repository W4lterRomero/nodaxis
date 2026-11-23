<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteRequestController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\QuoteDashboardController;
use App\Http\Middleware\EnsureAdmin;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/cotizar', [QuoteRequestController::class, 'create'])->name('quotes.create');
Route::post('/cotizar', [QuoteRequestController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('quotes.store');

Route::view('/terminos', 'terms')->name('terms');
Route::post('/boletin', [NewsletterController::class, 'store'])
    ->middleware('throttle:3,10')
    ->name('newsletter.store');
Route::post('/boletin/baja', [NewsletterController::class, 'unsubscribe'])
    ->middleware('throttle:3,10')
    ->name('newsletter.unsubscribe');

Route::get('/admin/login', [AdminAuthController::class, 'create'])->name('login');
Route::post('/admin/login', [AdminAuthController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('admin.login.store');

Route::middleware(['auth', EnsureAdmin::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [QuoteDashboardController::class, 'index'])->name('index');
    Route::get('/boletin.csv', [QuoteDashboardController::class, 'exportNewsletter'])->name('newsletter.export');
    Route::patch('/solicitudes/{quoteRequest}/estado', [QuoteDashboardController::class, 'updateStatus'])
        ->name('quotes.status');
    Route::post('/logout', [AdminAuthController::class, 'destroy'])->name('logout');
});
