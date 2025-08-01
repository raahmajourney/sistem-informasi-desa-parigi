<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\GalleryController;

// Public Routes

Route::get('/', function () {
    return redirect()->route('home');
});


Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('about', function () { return view('about'); })->name('about');


Route::get('products', function () { return view('products'); })->name('products');

Route::get('documents', function () { return view('documents'); })->name('documents');

Route::get('gallery', function () { return view('gallery'); })->name('gallery');

Route::get('education', function () { return view('education'); })->name('education');


Route::get('education', function () { return view('education'); })->name('education');

Route::get('profile', function () { return view('profile'); })->name('profile');


// home controller
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('documents', [HomeController::class, 'documents'])->name('documents');
Route::get('products', [HomeController::class, 'products'])->name('products');
Route::get('products/{product}', [HomeController::class, 'showProduct'])->name('products.detail');
Route::get('update/{activity}', [HomeController::class, 'showActivity'])->name('activity.detail');
Route::get('galeri', [HomeController::class, 'gallery'])->name('gallery');



// ✅ Protected Routes
Route::middleware(['auth'])->group(function () {

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

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

    Route::prefix('dashboard')->group(function () {
    
        Route::post('galeri', [GalleryController::class, 'store'])->name('galeri.store');
        Route::delete('galeri/{gallery}', [GalleryController::class, 'destroy'])->name('galeri.destroy');
    });

});