<?php

use App\Http\Controllers\BarangInventarisController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OutletController; 
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PenjemputanController;
use App\Http\Controllers\SimulasiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [HomeController::class,'index']);
// route::resource('outlet',OutletController::class);
// route::resource('member',MemberController::class);
// route::resource('paket',PaketController::class);
// Route::resource('barang',BarangInventarisController::class);
// Route::resource('transaksi', TransaksiController::class);
Route::resource('test', TestController::class);
Route::middleware(['auth'])->group( function(){
    Route::get('home', [HomeController::class, 'index']);
});

Route::get('login', [LoginController::class, 'index'])->name('login');
// Route::get('login',[loginController::class, 'index']);
Route::post('login', [LoginController::class, 'authenticate']);
Route::post('logout',[LoginController::class,'logout']);    

Route::group(['prefix'=>'a','middleware'=>['isAdmin','auth']], function(){
    Route::get('home', [HomeController::class,'index'])->name('a.home');
    Route::resource('outlet',OutletController::class);
    Route::resource('member',MemberController::class);
    Route::resource('paket',PaketController::class);
    Route::get('export/paket', [PaketController::class, 'exportData'])->name('export-paket');
    Route::post('paket/import', [PaketController::class, 'importData'])->name('import-paket');
    Route::get('simulasi', [SimulasiController::class, 'index']);
    Route::resource('penjemputan', PenjemputanController::class);
    Route::get('export/penjemputan', [PenjemputanController::class, 'exportData'])->name('export-penjemputan');
    Route::post('penjemputan/import', [PenjemputanController::class, 'importData'])->name('import-penjemputan');
    Route::get('transaksi', [TransaksiController::class, 'index']);
    Route::get('laporan', [LaporanController::class, 'index']);
    
});
Route::group(['prefix'=>'k','middleware'=>['isKasir','auth']], function(){
    Route::get('home', [HomeController::class,'index'])->name('k.home');
    Route::resource('member',MemberController::class);
    Route::resource('paket',PaketController::class);
    Route::get('transaksi', [TransaksiController::class, 'index']);
    Route::get('laporan', [LaporanController::class, 'index']);
});
Route::group(['prefix'=>'o','middleware'=>['isOwner','auth']], function(){
    Route::get('home', [HomeController::class,'index'])->name('o.home');
    Route::get('laporan', [LaporanController::class, 'index']);
});