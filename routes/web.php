<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

/**
 * Web Routes
 *
 * File ini mendefinisikan rute yang digunakan dalam aplikasi web.
 */


/**
 * Route untuk halaman utama admin
 *
 * Middleware: auth (hanya pengguna yang sudah login)
 */
Route::get('/', [AdminController::class, 'admin'])->name('admin')->middleware('auth');

/**
 * Route untuk menampilkan halaman registrasi
 */
Route::get('register', [RegisterController::class, 'index'])->name('register');

/**
 * Route untuk memproses pendaftaran pengguna
 */
Route::post('register', [RegisterController::class, 'store'])->name('register.store');

/**
 * Route untuk menampilkan halaman login
 */
Route::get('login', [LoginController::class, 'index'])->name('login');

/**
 * Route untuk memproses login pengguna
 */
Route::post('login', [LoginController::class, 'process'])->name('login.process');

/**
 * Route untuk logout pengguna
 */
Route::get('login/keluar', [LoginController::class, 'keluar'])->name('login.keluar');

/**
 * Route untuk halaman dashboard admin
 *
 * Middleware: auth (hanya pengguna yang sudah login)
 */
Route::get('admin', function()
{
    return view('admin');
})->name('admin')->middleware('auth');

/**
 * Route untuk halaman daftar pengguna
 *
 * Middleware: auth (hanya pengguna yang sudah login)
 */
Route::get('users', function()
{
    return view('users.index');
})->name('users')->middleware('auth');

/**
 * Route untuk halaman daftar mobil
 *
 * Middleware: auth (hanya pengguna yang sudah login)
 */
Route::get('mobil', function(){
    return view('mobil.index');
})->name('mobil')->middleware('auth');

/**
 * Route untuk halaman transaksi
 *
 * Middleware: auth (hanya pengguna yang sudah login)
 */
Route::get('transaksi', function() {
    return view('transaksi.index');
})->name('transaksi')->middleware('auth');

/**
 * Route untuk halaman laporan transaksi/log transaksi
 *
 * Middleware: auth (hanya pengguna yang sudah login)
 */
Route::get('laporan', function() {
    return view('laporan.index');
})->name('laporan')->middleware('auth');