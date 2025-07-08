<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ServiceController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Register route
Route::get('/register', function () {
    return view('signup');
})->name('register');

Route::get('/admin/dashboard', function () {
    return "Welcome Admin";
})->middleware(['auth', 'role:admin']);

// Route untuk dashboard customer tanpa authentication (frontend only)
Route::get('/customer/dashboard', function () {
    return view('customer-dashboard');
})->name('customer.dashboard');


// Route original dengan middleware (untuk nanti)
//Route::get('/customer/dashboard', [CustomerDashboardController::class, 'index'])
//     ->middleware(['auth', 'role:cust']);

// route sementara belum diberikan middleware
Route::resource('produk', ProdukController::class)->only(['index', 'store', 'create']);

//route booking service (belumm middleware)
Route::get('/service', [ServiceController::class, 'create'])->name('service.create');
Route::post('/service', [ServiceController::class, 'store'])->name('service.store');
Route::get('/validate-slot', [ServiceController::class, 'validateslot']);
Route::get('/service-types', [ServiceController::class, 'getServiceTypes']);
Route::get('/service/history', [ServiceController::class, 'indexByUser']) ->name('service.history');
Route::post('/service/{id}/cancel', [ServiceController::class, 'cancel'])->name('service.cancel');

