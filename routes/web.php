<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RuanganController;
use App\Http\Controllers\Admin\RuangController;
use App\Http\Controllers\AuthController;
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
    });


Route::prefix('pegawai')
    ->name('pegawai.')
    ->middleware(['auth', 'role:pegawai'])
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('pegawai.pages.dashboard.index');
        })->name('dashboard');
    });
