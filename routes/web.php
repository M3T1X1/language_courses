<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransakcjeController;
use App\Http\Controllers\ZnizkaController;
use App\Http\Controllers\InstruktorzyController;
use App\Http\Controllers\KlientController;
use App\Http\Controllers\DashboardController;
use App\Models\Instruktor;

// Testowe połączenie z bazą
Route::get('/test-db', function () {
    return DB::select('SELECT * FROM instruktorzy LIMIT 1');
});

// Instruktorzy
Route::get('/instruktorzy', [InstruktorzyController::class, 'index'])->name('instruktorzy.index');
Route::get('/instruktorzy/{id}', [InstruktorzyController::class, 'show'])->name('instruktorzy.show');

// Transakcje i admin
Route::get('/admin/transakcje', [AdminController::class, 'showTransactions'])->name('admin.transakcje');
Route::get('/transakcje', [TransakcjeController::class, 'index'])->name('transakcje');

// Zniżki - resource controller
Route::resource('znizki', ZnizkaController::class);

// Klienci - REST resource + pojedynczy GET na listę klientów
Route::resource('klienci', KlientController::class);
Route::get('/klienci', [KlientController::class, 'index'])->name('klienci.index');

// Strona główna - pokazuje listę klientów (opcjonalnie)
Route::get('/', [KlientController::class, 'index']);

// Autoryzacja
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Dashboard i app
Route::get('/app', function () {
    return view('app');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/instruktorzy', function () {
    $instructors = Instruktor::all(); // lub dowolna logika
    return view('instruktorzy', compact('instructors'));
});
