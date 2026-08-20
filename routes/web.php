<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DeveloperController;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');
Route::get('/layanan', [HomeController::class, 'services'])->name('services');

Route::get('/produk', [ProductController::class, 'index'])->name('products.index');
Route::get('/produk/{product:slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/kontak', [ContactController::class, 'index'])->name('contact');
Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store');



Route::prefix('admin')->name('admin.')->group(function () {
    
    Route::middleware('admin.guest')->group(function () {
        Route::get('login', [AuthController::class, 'create'])->name('login');
        Route::post('login', [AuthController::class, 'store'])->name('login.store');
    });

    Route::middleware(['admin.auth', 'admin.nocache'])->group(function () {
        Route::post('logout', [AuthController::class, 'destroy'])->name('logout');

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('produk', [AdminProductController::class, 'index'])->name('products.index');
        Route::get('produk/tambah', [AdminProductController::class, 'create'])->name('products.create');
        Route::post('produk', [AdminProductController::class, 'store'])->name('products.store');
        Route::get('produk/{product:id}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
        Route::put('produk/{product:id}', [AdminProductController::class, 'update'])->name('products.update');
        Route::delete('produk/{product:id}', [AdminProductController::class, 'destroy'])->name('products.destroy');

        Route::get('pesan-masuk', [MessageController::class, 'index'])->name('messages.index');
        Route::get('pesan-masuk/{pesanMasuk}', [MessageController::class, 'show'])->name('messages.show');
        Route::delete('pesan-masuk/{pesanMasuk}', [MessageController::class, 'destroy'])->name('messages.destroy');

        Route::get('profil-pembuat', [DeveloperController::class, 'index'])->name('developer');
    });
});
