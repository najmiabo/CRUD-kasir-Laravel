<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\BarangController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'home']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // CRUD user
    Route::get('/user', [UserController::class, 'home']);
    Route::post('/user/store', [UserController::class, 'store']);
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

    // CRUD Jenis Barang
    Route::get('/jenisbarang', [JenisBarangController::class, 'home']);
    Route::post('/jenisbarang/store', [JenisBarangController::class, 'store']);
    Route::post('/jenisbarang/update/{id}', [JenisBarangController::class, 'update'])->name('jenisbarang.update');
    Route::get('/jenisbarang/delete/{id}', [JenisBarangController::class, 'delete'])->name('jenisbarang.delete');

    // CRUD Jenis Barang
    Route::get('/barang', [BarangController::class, 'home']);
    Route::post('/barang/store', [BarangController::class, 'store']);
    Route::post('/barang/update/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::get('/barang/delete/{id}', [BarangController::class, 'delete'])->name('barang.delete');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});
