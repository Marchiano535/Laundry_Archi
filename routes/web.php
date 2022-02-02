<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaketController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index']);
route::resource('Outlet',OutletController::class);
route::resource('Member',MemberController::class);
route::resource('Paket',PaketController::class);
