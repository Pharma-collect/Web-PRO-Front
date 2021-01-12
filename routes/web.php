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

Route::get('/connexion', [\App\Http\Controllers\AuthenticationController::class, 'index']);
Route::post('/connexion', [\App\Http\Controllers\AuthenticationController::class, 'login']);

Route::group(['middleware' => ['customAuth', 'tokenValidity']], function () {
    Route::get('/admin', [\App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/admin/home', [\App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/admin/home/index', [\App\Http\Controllers\HomeController::class, 'index']);

    Route::get('/admin/user', [\App\Http\Controllers\UserController::class, 'index']);
    Route::get('/admin/user/index', [\App\Http\Controllers\UserController::class, 'index']);

    Route::get('/admin/product', [\App\Http\Controllers\ProductController::class, 'index']);
    Route::get('/admin/product/index', [\App\Http\Controllers\ProductController::class, 'index']);
    Route::post('/admin/product/delete/{id}', [\App\Http\Controllers\ProductController::class, 'dropProduct'])->name('dropProduct');
    Route::post('/admin/product/update_form/{id}', [\App\Http\Controllers\ProductController::class, 'updateForm'])->name('updateForm');
    Route::post('/admin/product/update/{id}', [\App\Http\Controllers\ProductController::class, 'updateProduct'])->name('updateProduct');

    Route::get('/admin/order', [\App\Http\Controllers\OrderController::class, 'index']);
    Route::get('/admin/order/index', [\App\Http\Controllers\OrderController::class, 'index']);

    Route::get('/admin/logout', function() {
        session()->flush();
        if(!session()->has('token'))
        {
            return redirect("/connexion");
        }
    });

});
