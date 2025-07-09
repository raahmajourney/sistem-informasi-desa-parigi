<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DokumenController;

// Public Routes
Route::get('/', [HomeController::class, 'index']);
Route::get('home', [HomeController::class, 'index'])->name('home');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('products', function () {
    return view('products');
})->name('products');

Route::get('documents', function () {
    return view('documents');
})->name('documents');

// ✅ Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard/{section}', [DashboardController::class, 'section'])->name('dashboard.section');

    Route::resource('aktivitas', ActivityController::class)->parameters([
        'aktivitas' => 'activity'
    ]);

    Route::post('produk', [ProductController::class, 'store'])->name('produk.store');
    Route::delete('produk/{product}', [ProductController::class, 'destroy'])->name('produk.destroy');
    Route::get('produk/{product}/edit', [ProductController::class, 'edit'])->name('produk.edit');
    Route::put('produk/{product}', [ProductController::class, 'update'])->name('produk.update');

    Route::resource('dokumen', DokumenController::class)->parameters([
        'dokumen' => 'dokumen'
    ]);
});