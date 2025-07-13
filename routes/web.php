<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CustomerDashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Login & Register
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', function () {
    return view('signup');
})->name('register');
Route::post('/register', [UserController::class, 'register']);

// Admin Dashboard (dengan middleware)
Route::get('/admin/dashboard', function () {
    return "Welcome Admin";
})->middleware(['auth', 'role:admin']);

// Customer Dashboard (tanpa middleware)
Route::get('/customer/dashboard', function () {
    return view('customer-dashboard');
})->name('customer.dashboard');

// Produk
Route::resource('produk', ProdukController::class)->only(['index', 'store', 'create']);

// Halaman produk customer
Route::get('/customer/product', [ProdukController::class, 'index'])->name('customer.product');
Route::get('/product-customer', function () {
    return view('product-customer');
})->name('product.customer');

// Booking Service
Route::get('/service', [ServiceController::class, 'create'])->name('service.create');
Route::post('/service', [ServiceController::class, 'store'])->name('service.store');
Route::get('/validate-slot', [ServiceController::class, 'validateslot']);
Route::get('/service-types', [ServiceController::class, 'getServiceTypes']);
Route::get('/service/history', [ServiceController::class, 'indexByUser'])->name('service.history');
Route::post('/service/{id}/cancel', [ServiceController::class, 'cancel'])->name('service.cancel');
Route::get('/service/all', [ServiceController::class, 'indexBycabang'])->name('service.all');
Route::post('/service/{id}/start', [ServiceController::class, 'startService'])->name('service.start');

// Testimoni
Route::get('/testimoni', [TestimoniController::class, 'getTestimoni']);
Route::post('/testimoni', [TestimoniController::class, 'postTestimoni']);
Route::delete('/testimoni/{id}', [TestimoniController::class, 'deleteTestimoni']);

// Berita
Route::get('/berita', [BeritaController::class, 'getBerita']);
Route::post('/berita', [BeritaController::class, 'postBerita']);
Route::put('/berita/{id}', [BeritaController::class, 'editBerita']);
Route::delete('/berita/{id}', [BeritaController::class, 'deleteBerita']);