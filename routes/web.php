<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Route
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home/index', [\App\Http\Controllers\HomeController::class, 'index']);

Route::get('/user', [\App\Http\Controllers\UserController::class, 'index']);
Route::get('/user/index', [\App\Http\Controllers\UserController::class, 'index']);

Route::get('/product', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('/product/index', [\App\Http\Controllers\ProductController::class, 'index']);

Route::get('/order', [\App\Http\Controllers\OrderController::class, 'index']);
Route::get('/order/index', [\App\Http\Controllers\OrderController::class, 'index']);
