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

Route::get('/admin/connexion', [\App\Http\Controllers\AuthenticationController::class, 'index']);
Route::post('/admin/connexion', [\App\Http\Controllers\AuthenticationController::class, 'login']);

Route::group(['middleware' => ['customAuth', 'tokenValidity']], function () {
    //Home -----------------------------------------------------
    Route::get('/admin', [\App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/admin/home', [\App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/admin/home/index', [\App\Http\Controllers\HomeController::class, 'index']);
    //End Home -----------------------------------------------------

    //User -----------------------------------------------------
    Route::get('/admin/user', [\App\Http\Controllers\UserController::class, 'index']);
    Route::get('/admin/user/index', [\App\Http\Controllers\UserController::class, 'index']);
    //End User -----------------------------------------------------

    //Product -----------------------------------------------------
    Route::get('/admin/product', [\App\Http\Controllers\ProductController::class, 'index']);
    Route::get('/admin/product/index', [\App\Http\Controllers\ProductController::class, 'index']);

    Route::post('/admin/product/delete', [\App\Http\Controllers\ProductController::class, 'dropProduct'])->name('dropProduct');
    Route::get('/admin/product/delete', function(){return redirect("/admin/product");});

    Route::post('/admin/product/update_form', [\App\Http\Controllers\ProductController::class, 'updateForm'])->name('updateForm');
    Route::get('/admin/product/update_form', function(){return redirect("/admin/product");});

    Route::post('/admin/product/update', [\App\Http\Controllers\ProductController::class, 'updateProduct'])->name('updateProduct');
    Route::get('/admin/product/update', function(){return redirect("/admin/product");});

    Route::match(array('GET','POST'),'/admin/product/new_product_form', [\App\Http\Controllers\ProductController::class, 'newProductForm'])->name('newProductForm');

    Route::post('/admin/product/new_product', [\App\Http\Controllers\ProductController::class, 'newProduct'])->name('newProduct');
    Route::get('/admin/product/new_product', function(){return redirect("/admin/product");});
    // End Product -----------------------------------------------------

    //Order -----------------------------------------------------
    Route::get('/admin/order', [\App\Http\Controllers\OrderController::class, 'index']);
    Route::get('/admin/order/index', [\App\Http\Controllers\OrderController::class, 'index']);

    Route::post('/admin/order/update_form', [\App\Http\Controllers\OrderController::class, 'updateForm'])->name('updateForm');
    Route::get('/admin/order/update_form', function(){return redirect("/admin/order");});

    Route::post('/admin/order/update', [\App\Http\Controllers\OrderController::class, 'updateOrder'])->name('updateOrder');
    Route::get('/admin/order/update', function(){return redirect("/admin/order");});

    Route::post('/admin/order/delete', [\App\Http\Controllers\OrderController::class, 'dropOrder'])->name('dropOrder');
    Route::get('/admin/order/delete', function(){return redirect("/admin/order");});

    Route::match(array('GET','POST'),'/admin/order/new_order_form', [\App\Http\Controllers\OrderController::class, 'newOrderForm'])->name('newOrderForm');

    Route::post('/admin/order/new_order', [\App\Http\Controllers\OrderController::class, 'newOrder'])->name('newOrder');
    Route::get('/admin/order/new_order', function(){return redirect("/admin/order");});

    //End Order -----------------------------------------------------

    //Logout -----------------------------------------------------
    Route::get('/admin/logout', function() {
        session()->flush();
        if(!session()->has('token'))
        {
            return redirect("/admin/connexion");
        }
    });

});
