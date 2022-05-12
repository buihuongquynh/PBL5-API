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
Route::post('login', 'Auth\AuthController@login');
Route::post('register', 'Auth\AuthController@register');
Route::middleware('auth:api')->group(function () {
    Route::post('logout', 'Auth\AuthController@logout');
    Route::get('user-detail', 'Auth\AuthController@userDetail');
});
