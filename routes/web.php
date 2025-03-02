<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;



Route::get('/', [AdminController::class, 'admin'])->name('admin')->middleware('auth');

Route::get('register', [RegisterController::class, 'index'])->name('register');

Route::post('register', [RegisterController::class, 'store'])->name('register.store');

Route::get('login', [LoginController::class, 'index'])->name('login');

Route::post('login', [LoginController::class, 'process'])->name('login.process');

Route::get('login/keluar', [LoginController::class, 'keluar'])->name('login.keluar');

Route::get('users', function()
{
    return view('users.index');
})->name('users')->middleware('auth');

Route::get('/mobil', function(){
    return view('mobil.index');
})->name('mobil')->middleware('auth');