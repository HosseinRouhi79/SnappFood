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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [\App\Http\Controllers\FirstPageController::class, 'index'])->name('admin');
Route::get('/seller', [\App\Http\Controllers\FirstPageController::class, 'sellerForm'])->name('sellerForm');
Route::get('/seller/profile/show/{slug}', [\App\Http\Controllers\seller\SellerController::class, 'setting']);
Route::post('/seller', [\App\Http\Controllers\seller\SellerController::class, 'store']);
Route::resource('/admin/restaurantType',\App\Http\Controllers\admin\RestaurantTypeController::class);
Route::resource('/admin/foodType',\App\Http\Controllers\admin\FoodTypeController::class);
Route::resource('/seller/profile',\App\Http\Controllers\seller\SellerProfileController::class)->middleware('can:isSeller');

