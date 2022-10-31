<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\PresensiUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest')->group(function(){
    Route::get('/', [PageController::class, 'index']);
    Route::get('/login', [PageController::class, 'showLoginPage'])->name('login');
    
    Route::post('/login', [UserController::class, 'checkLogin']);
});

Route::middleware('auth')->group(function(){
    Route::get('/home', [PageController::class, 'showHomePage']);

    Route::post('/logout', [UserController::class, 'logout']);
    Route::post('/home/presensi/{presensi_id}/{user_id}/{status}', [PresensiUserController::class, 'store'])->name('isiPresensi');

    Route::resource('/home/presensi', PresensiUserController::class)->except(['store'])->names('presensi');
    
});

Route::middleware('admin')->group(function(){
    Route::get('/dashboard', [PageController::class, 'showDashboardPage'])->name('dashboard');

    Route::post('/dashboard/presensi/toggle/{presensi}', [PresensiController::class, 'toggle']);

    Route::resource('/dashboard/mahasiswa', UserController::class)->names('user');
    Route::resource('/dashboard/presensi', PresensiController::class)->names('adminpresensi');
});

