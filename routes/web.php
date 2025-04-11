<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RTController;
use App\Http\Controllers\DusunController;
use App\Http\Controllers\RWController;
use App\Http\Controllers\Auth\AdminAuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Login Admin
Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');
Route::get('/logout', [AdminAuthController::class, 'logout']);

// Semua yang ada di dalam ini hanya bisa diakses setelah login (middleware logged)
Route::middleware(['logged'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Resource data lainnya
    Route::resource('/rt', RTController::class);
    Route::resource('/rw', RWController::class);
    Route::resource('/dusun', DusunController::class);
});
