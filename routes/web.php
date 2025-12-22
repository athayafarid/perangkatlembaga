<?php

use App\Http\Controllers\AnggotaLembagaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\JabatanLembagaController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\LembagaDesaController;
use App\Http\Controllers\MultipleuploadsController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RtController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| AUTH (TANPA LOGIN)
|--------------------------------------------------------------------------
*/

// Login

Route::get('/pengembang', function () {
    return view('admin.pengembang');
})->middleware('auth')->name('pengembang');

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Forgot Password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotForm'])
    ->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])
    ->name('password.email');

// Reset Password
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])
    ->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])
    ->name('password.update');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| DASHBOARD & CRUD (WAJIB LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware(['checkislogin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::middleware(['checkrole:Admin'])->group(function () {
        // CRUD
        // Upload
        Route::get('/multipleuploads', [MultipleuploadsController::class, 'index'])
            ->name('uploads');
        Route::post('/save', [MultipleuploadsController::class, 'store'])
            ->name('uploads.store');
        Route::resource('warga', WargaController::class);
        Route::resource('rw', RwController::class);
        Route::resource('rt', RtController::class);
        Route::resource('perangkat_desa', PerangkatDesaController::class);
        Route::resource('lembaga_desa', LembagaDesaController::class);
        Route::resource('jabatan_lembaga', JabatanLembagaController::class);
        Route::resource('anggota_lembaga', AnggotaLembagaController::class);
        Route::resource('keluarga', KeluargaController::class);

    });

    Route::middleware(['checkrole:Warga'])->group(function () {

        // Pegawai hanya bisa Lihat + Tambah
        // Route::resource('dashboard', DashboardController::class);
        Route::resource('rw', RwController::class)->only([
            'index',
            'show',
            'create',
            'store',
        ]);

        Route::resource('warga', WargaController::class)->only([
            'index',
            'show',
            'create',
            'store',
        ]);

        Route::resource('rt', RtController::class)->only([
            'index',
            'show',
            'create',
            'store',
        ]);

        Route::resource('perangkat_desa', PerangkatDesaController::class)->only([
            'index',
            'show',
            'create',
            'store',
        ]);
        Route::resource('lembaga_desa', LembagaDesaController::class)->only([
            'index',
            'show',
            'create',
            'store',
        ]);

        Route::resource('jabatan_lembaga', JabatanLembagaController::class)->only([
            'index',
            'show',
            'create',
            'store',
        ]);
        Route::resource('anggota_lembaga', AnggotaLembagaController::class)->only([
            'index',
            'show',
            'create',
            'store',
        ]);

    });
});
