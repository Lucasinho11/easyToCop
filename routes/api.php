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

Route::post('auth/register', 'App\Http\Controllers\API\RegisterController@register');
Route::post('auth/login', 'App\Http\Controllers\API\LoginController@login');
Route::middleware('auth:sanctum')->get('auth/user', 'App\Http\Controllers\API\UserController@me');
Route::middleware('auth:sanctum')->get('auth/logout', 'App\Http\Controllers\API\LoginController@logout');

Route::get('/drops', 'App\Http\Controllers\API\DropsController@index');
Route::get('/drops/{id}', 'App\Http\Controllers\API\DropsController@drop');
Route::get('/actus', 'App\Http\Controllers\API\ActusController@index');
Route::get('/actus/{id}', 'App\Http\Controllers\API\ActusController@actu');

Route::middleware('auth:sanctum')->post('stripe/intent', 'App\Http\Controllers\API\StripeController@intent');
Route::middleware('auth:sanctum')->post('stripe/subscribe', 'App\Http\Controllers\API\StripeController@subscribe');
