<?php

use App\Http\Controllers\BukuAnakController;
use App\Http\Controllers\BukuIndukController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\pegawaiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberBioController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\transaksiController;
use App\Mail\EmailMember;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Facade;

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
    return view('welcome');
});


Route::resource('kategori', kategoriController::class);
Route::resource('user', UserController::class);

Auth::routes();
   
//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
   
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
   
//Pegawai Routes List
Route::middleware(['auth', 'user-access:pegawai'])->group(function () {
   
    Route::get('/pegawai/dashboard', [HomeController::class, 'pegawaiHome'])->name('pegawai.dashboard');
});
   
//Kepala Routes List
Route::middleware(['auth', 'user-access:kepala'])->group(function () {
   
    Route::get('/kepala/dashboard', [HomeController::class, 'kepalaHome'])->name('kepala.dashboard');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('biodata', MemberBioController::class);
Route::resource('member', MemberController::class);
Route::resource('rak', RakController::class);
Route::resource('bukuinduk', BukuIndukController::class);
Route::resource('bukuanak', BukuAnakController::class);
Route::resource('email',EmailController::class);
Route::resource('transaksi',transaksiController::class);
Route::get('/testroute', function () {
    $recipientEmail = 'wardiniayu310@gmail.com'; // Replace with your desired recipient
});
