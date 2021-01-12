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
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/home/index', [\App\Http\Controllers\HomeController::class, 'index']);

    Route::get('/user', [\App\Http\Controllers\UserController::class, 'index']);
    Route::get('/user/index', [\App\Http\Controllers\UserController::class, 'index']);

    Route::get('/logout', function() {
        session()->flush();
        if(!session()->has('token'))
        {
            return redirect("/connexion");
        }
    });

});
