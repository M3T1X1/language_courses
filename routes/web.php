<?php

use Illuminate\Support\Facades\Route;

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
