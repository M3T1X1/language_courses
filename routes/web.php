<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

use Illuminate\Support\Facades\DB;

Route::get('/test-db', function () {
    return DB::select('SELECT * FROM instruktorzy LIMIT 1');
});
