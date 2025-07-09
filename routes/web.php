<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index']);
Route::get('home', [HomeController::class, 'index'])->name('home');


Route::get('login', function () {
    return view('login');
})->name('login');

Route::get('products', function () {
    return view('products');
})->name('products');

Route::get('documents', function () {
    return view('documents');
})->name('documents');


// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('dashboard/{section}', [DashboardController::class, 'section'])->name('dashboard.section');

Route::resource('aktivitas', ActivityController::class)->parameters([
    'aktivitas' => 'activity'
]);

Route::post('produk', [ProductController::class, 'store'])->name('produk.store');

