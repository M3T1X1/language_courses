<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransakcjeController;
use App\Http\Controllers\ZnizkaController;
use App\Http\Controllers\KlientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PublicCourseController;



Route::get('/test-db', function () {
    return DB::select('SELECT * FROM instruktorzy LIMIT 1');
});

Route::get('/admin/transakcje', [AdminController::class, 'showTransactions'])->name('admin.transakcje');
Route::get('/transakcje', [TransakcjeController::class, 'index'])->name('transakcje');
Route::resource('znizki', ZnizkaController::class);

Route::get('/klienci', [KlientController::class, 'index'])->name('klienci.index');
Route::resource('klienci', KlientController::class);

// Trasy dla panelu admina
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

// Trasa dla publicznego widoku kursów (oferta)
Route::get('/oferta', [PublicCourseController::class, 'index'])->name('oferta');

Route::get('/rezerwacja', function (Request $request) {
    $courseName = $request->query('course');
    return view('rezerwacja', ['courseName' => $courseName]);
})->name('rezerwacja');

Route::get('/home', function () {
    return view('home'); // home.blade.php
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/app', function () {
    return view('app'); // app.blade.php
});

Route::get('/dashboard', function () {
    return view('dashboard'); // dashboard.blade.php
});

Route::get('/kursy', function () {
    return view('kursy'); // dashboard.blade.php
});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');




