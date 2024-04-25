<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\JarakController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\KeamananController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\AksesJalanController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\PenghitunganController;

use App\Http\Controllers\DetailFotoKostController;
use App\Http\Controllers\SimulasiRekomendasiController;


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

# Landing Controller
Route::get('/', [LandingController::class, 'index']);
Route::get('/detail-kost/{id}', [LandingController::class, 'detailkost']);
Route::get('/whitelist', [LandingController::class, 'whitelist'])->middleware('IsLogin', 'IsUser');
Route::post('/simpanwhitelist', [LandingController::class, 'simpanwhitelist'])->middleware('IsLogin', 'IsUser');
Route::post('/deletewhitelist', [LandingController::class, 'deletewhitelist'])->middleware('IsLogin', 'IsUser');


Route::get('/about', [LandingController::class, 'about']);

# Auth Controller
Route::get('/loginuser', [AuthController::class, 'loginuser']);
Route::get('/registeruser', [AuthController::class, 'registeruser']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/myprofil', [AuthController::class, 'myprofil'])->middleware('IsLogin', 'IsUser');
Route::post('/updateprofil', [AuthController::class, 'updateprofil'])->middleware('IsLogin', 'IsUser');
Route::get('/resetpassword', [AuthController::class, 'resetpasswordindex']);
Route::post('/resetpassword', [AuthController::class, 'resetpassword']);

Route::get('/auth/google', [AuthController::class, 'redirect']);
Route::get('/auth/google/callback', [AuthController::class, 'GoogleCallback']);

route::get('/changepassword/{id}', [AuthController::class, 'changepassword']);
route::post('/updatepassword', [AuthController::class, 'updatepassword']);

Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('IsLogin');

# Dashboard Controller
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('IsLogin', 'IsAdmin');

# Kost Controller
Route::get('/kost', [KostController::class, 'index'])->middleware('IsLogin', 'IsAdmin');
Route::post('/kost', [KostController::class, 'store'])->middleware('IsLogin', 'IsAdmin');
Route::put('/kost/{id}', [KostController::class, 'update'])->middleware('IsLogin', 'IsAdmin');
Route::delete('/kost/{id}', [KostController::class, 'destroy'])->middleware('IsLogin', 'IsAdmin');

# Alternatif Controller
Route::get('/alternatif', [AlternatifController::class, 'index'])->middleware('IsLogin', 'IsAdmin');

# Kriteria Controller
Route::get('/kriteria', [KriteriaController::class, 'index'])->middleware('IsLogin', 'IsAdmin');
Route::put('/kriteria/{id}', [KriteriaController::class, 'update'])->middleware('IsLogin', 'IsAdmin');

# Sub Kriteria Controller
Route::get('/sub-kriteria', [SubKriteriaController::class, 'index'])->middleware('IsLogin', 'IsAdmin');

# Lokasi Controller
Route::get('/lokasi', [LokasiController::class, 'index'])->middleware('IsLogin', 'IsAdmin');
Route::post('/lokasi', [LokasiController::class, 'store'])->middleware('IsLogin', 'IsAdmin');
Route::put('/lokasi/{id}', [LokasiController::class, 'update'])->middleware('IsLogin', 'IsAdmin');
Route::delete('/lokasi/{id}', [LokasiController::class, 'destroy'])->middleware('IsLogin', 'IsAdmin');

# Fasilitas Controller
Route::get('/fasilitas', [FasilitasController::class, 'index'])->middleware('IsLogin', 'IsAdmin');
Route::post('/fasilitas', [FasilitasController::class, 'store'])->middleware('IsLogin', 'IsAdmin');
Route::put('/fasilitas/{id}', [FasilitasController::class, 'update'])->middleware('IsLogin', 'IsAdmin');
Route::delete('/fasilitas/{id}', [FasilitasController::class, 'destroy'])->middleware('IsLogin', 'IsAdmin');

# Keamanan Controller
Route::get('/keamanan', [KeamananController::class, 'index'])->middleware('IsLogin', 'IsAdmin');
Route::post('/keamanan', [KeamananController::class, 'store'])->middleware('IsLogin', 'IsAdmin');
Route::put('/keamanan/{id}', [KeamananController::class, 'update'])->middleware('IsLogin', 'IsAdmin');
Route::delete('/keamanan/{id}', [KeamananController::class, 'destroy'])->middleware('IsLogin', 'IsAdmin');

# Harga Controller
Route::get('/harga', [HargaController::class, 'index'])->middleware('IsLogin', 'IsAdmin');
Route::post('/harga', [HargaController::class, 'store'])->middleware('IsLogin', 'IsAdmin');
Route::put('/harga/{id}', [HargaController::class, 'update'])->middleware('IsLogin', 'IsAdmin');
Route::delete('/harga/{id}', [HargaController::class, 'destroy'])->middleware('IsLogin', 'IsAdmin');

# Jarak Controller
Route::get('/jarak', [JarakController::class, 'index'])->middleware('IsLogin', 'IsAdmin');
Route::post('/jarak', [JarakController::class, 'store'])->middleware('IsLogin', 'IsAdmin');
Route::put('/jarak/{id}', [JarakController::class, 'update'])->middleware('IsLogin', 'IsAdmin');
Route::delete('/jarak/{id}', [JarakController::class, 'destroy'])->middleware('IsLogin', 'IsAdmin');

# Akses Jalan Controller
Route::get('/aksesjalan', [AksesJalanController::class, 'index'])->middleware('IsLogin', 'IsAdmin');
Route::post('/aksesjalan', [AksesJalanController::class, 'store'])->middleware('IsLogin', 'IsAdmin');
Route::put('/aksesjalan/{id}', [AksesJalanController::class, 'update'])->middleware('IsLogin', 'IsAdmin');
Route::delete('/aksesjalan/{id}', [AksesJalanController::class, 'destroy'])->middleware('IsLogin', 'IsAdmin');

# Penghitungan Controller
Route::get('/penghitungan', [PenghitunganController::class, 'index'])->middleware('IsLogin', 'IsAdmin');

# Simulasi Rekomendasi Controller
Route::get('/simulasi-rekomendasi', [SimulasiRekomendasiController::class, 'index'])->middleware('IsLogin', 'IsAdmin');
Route::post('/simulasi-rekomendasi', [SimulasiRekomendasiController::class, 'cari'])->middleware('IsLogin', 'IsAdmin');

# User Controller
Route::get('/user', [UserController::class, 'index'])->middleware('IsLogin', 'IsAdmin');
Route::post('/user', [UserController::class, 'store'])->middleware('IsLogin', 'IsAdmin');
Route::put('/user/{id}', [UserController::class, 'update'])->middleware('IsLogin', 'IsAdmin');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->middleware('IsLogin', 'IsAdmin');

# Detail Foto Kost Controller
Route::get('/detail-foto-kost/{id}', [DetailFotoKostController::class, 'index'])->middleware('IsLogin', 'IsAdmin');
Route::post('/detail-foto-kost', [DetailFotoKostController::class, 'store'])->middleware('IsLogin', 'IsAdmin');
Route::put('/detail-foto-kost/{id}', [DetailFotoKostController::class, 'update'])->middleware('IsLogin', 'IsAdmin');
Route::delete('/detail-foto-kost/{id}', [DetailFotoKostController::class, 'destroy'])->middleware('IsLogin', 'IsAdmin');
