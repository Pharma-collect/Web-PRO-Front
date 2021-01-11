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

Route::get('/admin', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/admin/home', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/admin/home/index', [\App\Http\Controllers\HomeController::class, 'index']);

Route::get('/admin/user', [\App\Http\Controllers\UserController::class, 'index']);
Route::get('/admin/user/index', [\App\Http\Controllers\UserController::class, 'index']);

Route::get('/admin/product', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('/admin/product/index', [\App\Http\Controllers\ProductController::class, 'index']);

Route::get('/admin/order', [\App\Http\Controllers\OrderController::class, 'index']);
Route::get('/admin/order/index', [\App\Http\Controllers\OrderController::class, 'index']);
