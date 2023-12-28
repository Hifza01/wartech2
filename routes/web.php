<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::resource('surat', 'App\Http\Controllers\UserController');
Route::resource('laporan', 'App\Http\Controllers\UserController');
Route::resource('surat', 'App\Http\Controllers\HomeController');
Route::resource('users', 'App\Http\Controllers\HomeController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/laporan', [UserController::class, 'laporan'])->name('laporan');



Route::get('/surat_domisili', [UserController::class, 'surat_domisili'])->name('surat_domisili');
Route::patch('updateSuratDomisili/{key}', [UserController::class, 'updateSuratDomisili'])
    ->where('key', '.*')
    ->name('updateSuratDomisili');

Route::get('/surat_keterangan_nikah', [UserController::class, 'surat_keterangan_nikah'])->name('surat_keterangan_nikah');

Route::get('/surat_kematian', [UserController::class, 'surat_kematian'])->name('surat_kematian');
