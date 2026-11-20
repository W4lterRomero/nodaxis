<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteRequestController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\QuoteDashboardController;
use App\Http\Middleware\EnsureAdmin;

Route::get('/', function () {
    return view('home');
});

Route::get('/cotizar', [QuoteRequestController::class, 'create'])->name('quotes.create');
Route::post('/cotizar', [QuoteRequestController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('quotes.store');

Route::get('/admin/login', [AdminAuthController::class, 'create'])->name('login');
Route::post('/admin/login', [AdminAuthController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('admin.login.store');

Route::middleware(['auth', EnsureAdmin::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [QuoteDashboardController::class, 'index'])->name('index');
    Route::patch('/solicitudes/{quoteRequest}/estado', [QuoteDashboardController::class, 'updateStatus'])
        ->name('quotes.status');
    Route::post('/logout', [AdminAuthController::class, 'destroy'])->name('logout');
});
