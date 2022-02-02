<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaketController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index']);
route::resource('outlet',OutletController::class);
route::resource('member',MemberController::class);
route::resource('paket',PaketController::class);
