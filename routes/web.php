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

Route::resource('/orders', App\Http\Controllers\OrderController::class);
Route::resource('/adminka/rooms', App\Http\Controllers\RoomController::class);
Route::resource('/adminka/categories', App\Http\Controllers\CategoryController::class);
Route::resource('/adminka/types', App\Http\Controllers\RoomTypeController::class);
Route::resource('/adminka/buildings', App\Http\Controllers\BuildingController::class);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/room/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('index.show');
Route::get('/profile', [App\Http\Controllers\OrderController::class, 'index'])->name('profile');
Route::get('/room', [App\Http\Controllers\RoomController::class, 'show'])->name('room');