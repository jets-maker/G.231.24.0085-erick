<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgdiController;   
use App\Http\Controllers\PribadiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/mahasiswa/search', [MahasiswaController::class, 'search'])->name('search');
Route::get('/mahasiswa/daftar/{id_pribadi}', [MahasiswaController::class, 'daftar'])->name('mahasiswa.daftar');
Route::get('/', function () {
    return view('welcome');
})->name('home.index');
route::resource('progdi', ProgdiController::class);
Route::resource('pribadi', PribadiController::class);
Route::resource('mahasiswa', MahasiswaController::class);
Route::get('/', [HomeController::class, 'index'])->name('home.index');
