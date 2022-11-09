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

//private
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('customer/addresses',[\App\Http\Controllers\customer\CustomerAddressController::class,'getAllAddresses']);
    Route::post('customer/addresses',[\App\Http\Controllers\customer\CustomerAddressController::class,'makeAddresses']);
});
