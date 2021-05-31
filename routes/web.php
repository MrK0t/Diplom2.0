<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::resource('/adminka', App\Http\Controllers\AdminCntroller::class);
Route::resource('/rooms', App\Http\Controllers\RoomController::class);
Route::resource('/buildings', App\Http\Controllers\BuildingController::class);
Route::resource('/orders', App\Http\Controllers\OrderController::class);
Route::resource('/rooms/categories', App\Http\Controllers\RoomController::class);
Route::resource('/rooms/types', App\Http\Controllers\RoomController::class);
// Route::resource('/rooms/types', App\Http\Controllers\RoomController::class)->except(['destroy','store']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/profile', [App\Http\Controllers\OrderController::class, 'index'])->name('profile');
Route::get('/adminka', [App\Http\Controllers\AdminCntroller::class, 'index'])->name('adminka');
Route::get('/room', [App\Http\Controllers\RoomController::class, 'show'])->name('room');
Route::get('/adminka_rooms', [App\Http\Controllers\RoomController::class, 'index'])->name('adminka_rooms');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');