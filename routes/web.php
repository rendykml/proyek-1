<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {   
    return view('index');
});

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('register', [RegisterController::class, 'register'])->middleware('guest');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'login'])->middleware('guest');

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Route untuk Pasien
Route::get('pasien/dashboard', [PasienController::class, 'dashboard'])->name('pasien.dashboard')->middleware('auth');

// Route untuk Admin
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');
Route::get('admin/dashboard/addpengguna', [AdminController::class, 'showAddPenggunaForm'])->name('admin.tambah-pengguna')->middleware('auth');
Route::post('admin/dashboard/addpengguna', [AdminController::class, 'addPengguna'])->name('addPengguna')->middleware('auth');
Route::get('admin/dashboard/pasien', [PasienController::class, 'getDataPasien'])->name('admin.pasien-dashboard')->middleware('auth');
Route::get('admin/dashboard/addpasien', [PasienController::class, 'showAddPasienForm'])->name('admin.tambah-pasien')->middleware('auth');
Route::post('admin/dashboard/addpasien', [PasienController::class, 'addPasien'])->name('addPasien')->middleware('auth');
Route::get('admin/dashboard/editpengguna/{id}', [AdminController::class, 'showEditPenggunaForm'])->name('admin.edit-pengguna')->middleware('auth');
Route::put('admin/dashboard/editpengguna/{id}', [AdminController::class, 'updatePengguna'])->name('updatePengguna')->middleware('auth');
Route::delete('admin/dashboard/deletepengguna/{id}', [AdminController::class, 'deletePengguna'])->name('deletePengguna')->middleware('auth');


// Route untuk Dokter
Route::get('dokter/dashboard', [DokterController::class, 'dashboard'])->name('dokter.dashboard')->middleware('auth');