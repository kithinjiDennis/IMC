<?php

use Illuminate\Http\Request;

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

Route::namespace('ADMIN')->group(function () {
    Route::post('login', 'UserController@login');
    Route::post('register', 'UserController@register');
    Route::post('forgotPassword', 'UserController@forgotPassword');
    Route::post('resetPassword', 'UserController@resetPassword');
});

Route::middleware('auth:api')->group(function () {
    Route::namespace('ADMIN')->group(function () {
       Route::post('changePassword', 'UserController@changePassword');
       Route::post('logout', 'UserController@logout');
      
    });
});
