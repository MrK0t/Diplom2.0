<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::resource('/profile', App\Http\Controllers\Profile::class);
Route::resource('/adminka/rooms', App\Http\Controllers\RoomController::class);
Route::resource('/adminka/categories', App\Http\Controllers\CategoryController::class);
Route::resource('/adminka/types', App\Http\Controllers\RoomTypeController::class);
Route::resource('/adminka/buildings', App\Http\Controllers\BuildingController::class);
Route::resource('/adminka/orders', App\Http\Controllers\OrderController::class);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/room/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('index.show');