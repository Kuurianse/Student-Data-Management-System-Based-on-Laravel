<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('index');
});

Route::middleware('auth')->group(function (){
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('index');
    // create
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('create');
    Route::post('/mahasiswa/submit', [MahasiswaController::class, 'store'])->name('store');
    // update
    Route::get('/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('edit');
    Route::put('/mahasiswa/update/{id}', [MahasiswaController::class, 'update'])->name('update');
    // delete
    Route::delete('/mahasiswa/delete/{id}', [MahasiswaController::class, 'destroy'])->name('destroy');
    // search
    Route::get('/mahasiswa/search', [MahasiswaController::class, 'search'])->name('search');

});

Route::middleware('guest')->group(function (){
    // register
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register/submit', [AuthController::class, 'submitRegistration'])->name('submitRegistration');
    // login
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login/submit', [AuthController::class, 'submitLogin'])->name('submitLogin');

});

// logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');