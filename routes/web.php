<?php

use App\Http\Controllers\KonfigurasiWaktuController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WilayahController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/login');
    });
    Route::get('/', function () {
        return view('dashboard');
    });

    Route::resource('laporan', LaporanController::class);
    Route::get('laporan/export/excel', [LaporanController::class, 'export']);
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::resource('konfigurasi-waktu', KonfigurasiWaktuController::class);
    Route::resource('konfigurasi-wilayah', WilayahController::class);
    Route::resource('pos', PosController::class);
    Route::resource('konfigurasi-user', UserController::class);

});


