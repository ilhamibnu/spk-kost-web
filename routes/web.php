<?php

use App\Http\Controllers\AksesJalanController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\JarakController;
use App\Http\Controllers\KeamananController;
use App\Http\Controllers\KostController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LokasiController;
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

# Auth Controller
Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

# Kost Controller
Route::get('/kost', [KostController::class, 'index']);
Route::post('/kost', [KostController::class, 'store']);
Route::put('/kost/{id}', [KostController::class, 'update']);
Route::delete('/kost/{id}', [KostController::class, 'destroy']);

# Alternatif Controller
Route::get('/alternatif', [AlternatifController::class, 'index']);

# Kriteria Controller
Route::get('/kriteria', [KriteriaController::class, 'index']);
Route::put('/kriteria/{id}', [KriteriaController::class, 'update']);

# Lokasi Controller
Route::get('/lokasi', [LokasiController::class, 'index']);
Route::post('/lokasi', [LokasiController::class, 'store']);
Route::put('/lokasi/{id}', [LokasiController::class, 'update']);
Route::delete('/lokasi/{id}', [LokasiController::class, 'destroy']);

# Fasilitas Controller
Route::get('/fasilitas', [FasilitasController::class, 'index']);
Route::post('/fasilitas', [FasilitasController::class, 'store']);
Route::put('/fasilitas/{id}', [FasilitasController::class, 'update']);
Route::delete('/fasilitas/{id}', [FasilitasController::class, 'destroy']);

# Keamanan Controller
Route::get('/keamanan', [KeamananController::class, 'index']);
Route::post('/keamanan', [KeamananController::class, 'store']);
Route::put('/keamanan/{id}', [KeamananController::class, 'update']);
Route::delete('/keamanan/{id}', [KeamananController::class, 'destroy']);

# Harga Controller
Route::get('/harga', [HargaController::class, 'index']);
Route::post('/harga', [HargaController::class, 'store']);
Route::put('/harga/{id}', [HargaController::class, 'update']);
Route::delete('/harga/{id}', [HargaController::class, 'destroy']);

# Jarak Controller
Route::get('/jarak', [JarakController::class, 'index']);
Route::post('/jarak', [JarakController::class, 'store']);
Route::put('/jarak/{id}', [JarakController::class, 'update']);
Route::delete('/jarak/{id}', [JarakController::class, 'destroy']);

# Akses Jalan Controller
Route::get('/aksesjalan', [AksesJalanController::class, 'index']);
Route::post('/aksesjalan', [AksesJalanController::class, 'store']);
Route::put('/aksesjalan/{id}', [AksesJalanController::class, 'update']);
Route::delete('/aksesjalan/{id}', [AksesJalanController::class, 'destroy']);
