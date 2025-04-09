<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RTController;
use App\Http\Controllers\DusunController;
use App\Http\Controllers\RWController;
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

// Route::get('/', function () {
//     return view('layout.header');
// });

Route::resource('/', AdminController::class);
Route::resource('/rt', RTController::class);
Route::resource('/rw', RWController::class);
Route::resource('/dusun', DusunController::class);
