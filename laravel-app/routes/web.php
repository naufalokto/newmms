<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\ProdukController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);


Route::get('/admin/dashboard', function () {
    return "Welcome Admin";
})->middleware(['auth', 'role:admin']);

Route::get('/customer/dashboard', [CustomerDashboardController::class, 'index'])
    ->middleware(['auth', 'role:cust']);

    //route sementara belum diberikan middleware
Route::resource('produk', ProdukController::class)->only(['index', 'store', 'create']);
