<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransakcjeController;
use App\Http\Controllers\ZnizkaController;

Route::get('/admin/transakcje', [AdminController::class, 'showTransactions'])->name('admin.transakcje');
Route::get('/transakcje', [TransakcjeController::class, 'index'])->name('transakcje');
Route::resource('znizki', ZnizkaController::class);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home'); // home.blade.php
});

Route::get('/login', function () {
    return view('login'); // login.blade.php
});

Route::get('/app', function () {
    return view('app'); // app.blade.php
});

Route::get('/dashboard', function () {
    return view('dashboard'); // dashboard.blade.php
});
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});



