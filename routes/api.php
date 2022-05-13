<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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
Route::post('login', 'Auth\AuthController@login');
Route::post('register', 'Auth\AuthController@register');
Route::middleware('auth:api')->group(function () {
    Route::post('logout', 'Auth\AuthController@logout');
    Route::get('user-detail', 'Auth\AuthController@userDetail');
});
Route::resource('user', 'UserController');
Route::resource('brand', 'BrandController');
Route::resource('cart', 'CartController');
Route::resource('order', 'OrderController');
Route::resource('product', 'ProductController');
