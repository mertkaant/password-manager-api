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

Route::post('login', 'App\Http\Controllers\AuthController@login');
Route::post('register', 'App\Http\Controllers\AuthController@register');
Route::post('forgot', 'App\Http\Controllers\ForgotController@forgot');
Route::post('reset', 'App\Http\Controllers\ForgotController@reset');

Route::resource('passwords', 'App\Http\Controllers\PasswordController')
    ->except(['create', 'edit'])
    ->middleware('auth:api');

Route::get('user', 'App\Http\Controllers\AuthController@user')
    ->middleware('auth:api');

/*
 * Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
