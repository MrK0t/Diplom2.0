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

Route::resource('/adminka', App\Http\Controllers\AdminController::class);
Route::resource('/rooms', App\Http\Controllers\RoomController::class);
Route::resource('/buildings', App\Http\Controllers\BuildingController::class);
Route::resource('/orders', App\Http\Controllers\OrderController::class);
Route::resource('/rooms/categories', App\Http\Controllers\RoomController::class);
Route::resource('/rooms/types', App\Http\Controllers\RoomController::class);
// Route::resource('/rooms/types', App\Http\Controllers\RoomController::class)->except(['destroy','store']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');