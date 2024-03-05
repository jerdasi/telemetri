<?php

use App\Http\Controllers\KonfigurasiWaktuController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WilayahController;
use App\Models\KonfigurasiWaktu;
use App\Models\Laporan;
use App\Models\Pos;
use App\Models\Wilayah;
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
        $list_waktu = KonfigurasiWaktu::all();
        $list_wilayah = Wilayah::all();
        $list_pos = Pos::all();
        $list_laporan = Laporan::all();
        $list_pos_id = Pos::pluck("id")->sort();
        $laporan_per_pos = collect([]);

        foreach ($list_pos_id as $pos_id) {
            $latest_laporan = Laporan::where('pos_id', $pos_id)
                ->latest()
                ->take(5)
                ->get();

            $laporan_per_pos->put($pos_id, $latest_laporan);
        }

        return view('dashboard', compact('laporan_per_pos', 'list_wilayah', 'list_pos', 'list_waktu', 'list_laporan'));
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


