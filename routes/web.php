<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConsumerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\LoginController;



// Route ke halaman welcome
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk menampilkan dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// Route untuk menampilkan form kategori (GET)
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');

// Route untuk menyimpan data kategori (POST)
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');

// Route untuk menampilkan daftar kategori (GET)
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');

// Route untuk mengedit kategori (GET)
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');

// Route untuk memperbarui kategori (PUT)
Route::patch('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');

// Route untuk menghapus kategori (DELETE)
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.delete');

Route::resource('foods', FoodController::class);


Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

Route::get('/home', [HomeController::class, 'index']); // Halaman utama
Route::get('/admin/login', [HomeController::class, 'showAdminLoginForm']);//form login admin

Route::get('/dbcnsmr', [ConsumerController::class, 'index'])->name('consumer.dashboard');

// Route untuk menambahkan item ke keranjang
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view'); //melihat keranjang
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');//checkout
Route::post('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.remove');

// Dashboard admin (setelah login sukses)
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');

Route::get('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('admin.login.submit');

// Setelah login, alihkan admin ke dashboard produk (foods)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [FoodController::class, 'index'])->name('dashboard');
    Route::resource('foods', FoodController::class);
});

Route::resource('foods', FoodController::class)->middleware('auth');

// Rute untuk struk konsumen
Route::get('/struk', function () {
    return view('consumer.struk', [
        'cart' => session('cart', []),
        'total' => session('total', 0),
    ]);
})->name('consumer.struk');

// Rute untuk unduhan invoice dengan Order ID
Route::get('/invoice/{orderId}', [CartController::class, 'generateInvoice'])->name('cart.invoice');
Route::get('/struk/download', [CartController::class, 'downloadInvoice'])->name('consumer.struk.download');

//rutebukadbncsmr
Route::get('/dbcnsmr', [ConsumerController::class, 'index'])->name('consumer.dashboard');
Route::get('/', function () {
    return view('home.home'); // Nama file home.blade.php
})->name('home');
