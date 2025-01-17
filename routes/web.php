<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\KoranController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
*/


//Route untuk dashboard
Route::get('/', function () {
    return view('pages.dashboard.index', ['type_menu' => '']);
});

Route::middleware(['auth'])->group(function () {

    Route::get('home', [KoleksiController::class, 'index'])->name('home');
    
});


// Route button back in login page
Route::get('beranda', function () {
         return view('pages.dashboard.index');
         })->name('masuk.beranda');


// Route koran 
Route::resource('cari', KoranController::class);        
Route::get('koran/{id}/show', [KoranController::class, 'show'])->name('koran.detail'); 

// Route Koleksi
Route::resource('koleksi', KoleksiController::class);

// Route user
Route::resource('user', UserController::class);

// Route rak
Route::resource('rak', RakController::class);


// Route PDF
Route::resource('PrintPdf', PdfController::class);
