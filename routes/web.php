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

Route::get('/', 'App\Http\Controllers\IndexController@index');
Route::get('/drops', 'App\Http\Controllers\DropsController@index');
Route::get('/drops/{id}', 'App\Http\Controllers\DropsController@drop');
Route::post('/drops/{id}', 'App\Http\Controllers\DropsController@dropRegistering');
Route::get('/actus', 'App\Http\Controllers\ActusController@index');
Route::get('/actus/{id}', 'App\Http\Controllers\ActusController@actu');
Route::get('/subs', 'App\Http\Controllers\SubsController@index');
Route::get('/subs/{id}', 'App\Http\Controllers\SubsController@sub');
Route::get('/contacts', 'App\Http\Controllers\ContactsController@index');
Route::get('/register', 'App\Http\Controllers\LoginController@register');
Route::get('/login', 'App\Http\Controllers\LoginController@login');
Route::get('/user', 'App\Http\Controllers\UserController@index');
Route::post('/user', 'App\Http\Controllers\UserController@update');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
