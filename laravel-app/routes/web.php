<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CustomerDashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/admin/dashboard', function () {
    return "Welcome Admin";
})->middleware(['auth', 'role:admin']);

Route::get('/customer/dashboard', [CustomerDashboardController::class, 'index'])
    ->middleware(['auth', 'role:cust']);
