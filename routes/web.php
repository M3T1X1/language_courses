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
use App\Http\Controllers\RejestracjaController;
use App\Http\Controllers\LoginController;



Route::get('/test-db', function () {
    return DB::select('SELECT * FROM instruktorzy LIMIT 1');
});




// Trasa dla publicznego widoku kursów (oferta)
Route::get('/oferta', [PublicCourseController::class, 'index'])->name('oferta');

Route::get('/rezerwacja', function (Request $request) {
    $courseName = $request->query('course');
    return view('rezerwacja', ['courseName' => $courseName]);
})->name('rezerwacja');

Route::get('/home', function () {
    return view('home'); // home.blade.php
});

//Route::get('/login', function () {
//    return view('auth.login');
//})->name('login');

Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/app', function () {
    return view('app'); // app.blade.php
});

//Route::get('/kursy', function () {
//   return view('kursy'); // dashboard.blade.php
//});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/register', [RejestracjaController::class, 'showForm'])->name('register.form');
Route::post('/register', [RejestracjaController::class, 'register'])->name('register');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/dashboard', function () {
        return view('dashboard'); // dashboard.blade.php
    });

    Route::get('/klienci', [KlientController::class, 'index'])->name('klienci.index');
    Route::resource('klienci', KlientController::class);

    Route::delete('/klienci/{id}', [KlientController::class, 'destroy'])->name('klienci.destroy');

    Route::get('/klienci/{id_klienta}/edit', [KlientController::class, 'edit'])->name('klienci.edit');
    Route::put('/klienci/{id_klienta}', [KlientController::class, 'update'])->name('klienci.update');

    // Trasy dla panelu admina
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

    Route::get('/admin/transakcje', [AdminController::class, 'showTransactions'])->name('admin.transakcje');
    Route::get('/transakcje', [TransakcjeController::class, 'index'])->name('transakcje');
    Route::resource('znizki', ZnizkaController::class);


});

