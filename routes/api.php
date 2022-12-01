<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//public
Route::post('customer/register',[\App\Http\Controllers\customer\CustomerAuthController::class,'register']);
Route::post('customer/login',[\App\Http\Controllers\customer\CustomerAuthController::class,'login']);
Route::get('allcarts',[\App\Http\Controllers\customer\CustomerCartController::class,'getAllCart']);
Route::post('getcomments',[\App\Http\Controllers\comment\CommentController::class,'getComments']);
Route::get('carts/test',[\App\Http\Controllers\customer\CustomerCartController::class,'test']);

//protected
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('customer/addresses',[\App\Http\Controllers\customer\CustomerAddressController::class,'getAllAddresses']);
    Route::post('customer/addresses',[\App\Http\Controllers\customer\CustomerAddressController::class,'makeAddresses']);
    Route::patch('customer/addresses/{id}',[\App\Http\Controllers\customer\CustomerAddressController::class,'setActive']);
    Route::delete('customer/addresses/{id}',[\App\Http\Controllers\customer\CustomerAddressController::class,'deleteAddress']);
    Route::delete('customer/addresses/user/{id}',[\App\Http\Controllers\customer\CustomerAddressController::class,'deleteAllAddresses']);
    Route::patch('customer/update',[\App\Http\Controllers\customer\CustomerUpdateController::class,'updatePersonal']);
    Route::patch('customer/update/{id}',[\App\Http\Controllers\customer\CustomerUpdateController::class,'updateAddress']);


    Route::get('restaurant/{id}',[\App\Http\Controllers\seller\ApiController::class,'getRestaurantInfo']);
    Route::get('restaurant/{id}/food',[\App\Http\Controllers\seller\ApiController::class,'getFoodsOfRestaurant']);
    Route::get('restaurant',[\App\Http\Controllers\seller\ApiController::class,'getAllRestaurants']);


    Route::post('carts/add',[\App\Http\Controllers\customer\CustomerCartController::class,'store']);
    Route::patch('carts/add',[\App\Http\Controllers\customer\CustomerCartController::class,'updateCart']);
    Route::get('carts',[\App\Http\Controllers\customer\CustomerCartController::class,'getCart']);
    Route::post('carts/submit',[\App\Http\Controllers\customer\CustomerCartController::class,'submit']);
    Route::post('carts/pay/{id}',[\App\Http\Controllers\customer\CustomerCartController::class,'pay']);


    Route::post('comments',[\App\Http\Controllers\comment\CommentController::class,'post']);
    Route::get('bestLocation',[\App\Http\Controllers\customer\CustomerLocationController::class,'find']);

});
