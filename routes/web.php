<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RtController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LembagaDesaController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\AnggotaLembagaController;
use App\Http\Controllers\JabatanLembagaController;
use App\Http\Controllers\MultipleuploadsController;

// ===================================================
// AUTH
// ===================================================
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ===================================================
// DASHBOARD (HARUS LOGIN)
// ===================================================
Route::middleware('auth.session')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD
    Route::resource('warga', WargaController::class);
    Route::resource('rw', RwController::class);
    Route::resource('rt', RtController::class);
    Route::resource('perangkat_desa', PerangkatDesaController::class);
    Route::resource('lembaga_desa', LembagaDesaController::class);
    Route::resource('jabatan_lembaga', JabatanLembagaController::class);
    Route::resource('anggota_lembaga', AnggotaLembagaController::class);
    Route::resource('keluarga', KeluargaController::class);

    Route::get('/multipleuploads', 'MultipleuploadsController@index')->name('uploads');
    Route::post('/save', 'MultipleuploadsController@store')->name('uploads.store');

});
