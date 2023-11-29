<?php

use App\Http\Controllers\Admin\AbsenMengajarController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GuruMapelController;
use App\Http\Controllers\Admin\GuruPiketController;
use App\Http\Controllers\Admin\JadwalPelajaranController;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\RuangController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WaktuAbsensiController;
use App\Http\Controllers\Admin\WaktuPelajaranController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Pegawai\AbsenMengajarController as PegawaiAbsenMengajarController;
use App\Http\Controllers\Pegawai\JadwalPelajaranController as PegawaiJadwalPelajaranController;
use App\Http\Controllers\Pegawai\ScanController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');


Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/ruang', RuangController::class);
        Route::resource('/mapel', MapelController::class);
        Route::resource('/waktu_absensi', WaktuAbsensiController::class);
        Route::resource('/waktu_pelajaran', WaktuPelajaranController::class);
        Route::resource('/pegawai', PegawaiController::class);
        Route::resource('/user', UserController::class);
        Route::resource('/guru_piket', GuruPiketController::class);
        Route::resource('/jadwal_pelajaran', JadwalPelajaranController::class);
        Route::resource('/guru_mapel', GuruMapelController::class);
        Route::resource('/absen_mengajar', AbsenMengajarController::class);
    });


Route::prefix('pegawai')
    ->name('pegawai.')
    ->middleware(['auth', 'role:pegawai'])
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('pegawai.pages.dashboard.index');
        })->name('dashboard');

        Route::resource('/jadwal_pelajaran', PegawaiJadwalPelajaranController::class);
        Route::resource('/absen_mengajar', PegawaiAbsenMengajarController::class);

        Route::get('/scan/ruangan', [ScanController::class, 'scanRuangan'])->name('scan.ruangan');
        Route::post('/scan/ruangan', [ScanController::class, 'storeScanRuangan'])->name('scan.ruangan.store');
    });
