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
Route::get('/', 'App\Http\Controllers\IndexController@index')->name('index');
Route::get('/drops', 'App\Http\Controllers\DropsController@index');
Route::get('/drops/{id}', 'App\Http\Controllers\DropsController@drop');
Route::post('/drops/{id}', 'App\Http\Controllers\DropsController@dropRegistering');
Route::get('/actus', 'App\Http\Controllers\ActusController@index');
Route::get('/actus/{id}', 'App\Http\Controllers\ActusController@actu');
Route::get('/subs', 'App\Http\Controllers\SubsController@index')->name('subs');
Route::get('/subs/{id}', 'App\Http\Controllers\SubsController@sub');
Route::get('/contacts', 'App\Http\Controllers\ContactsController@index');
Route::post('/contacts', 'App\Http\Controllers\ContactsController@sendEmail');
Route::get('/register', 'App\Http\Controllers\LoginController@register');
Route::get('/login', 'App\Http\Controllers\LoginController@login');
Route::get('/user', 'App\Http\Controllers\UserController@index')->name('user');
Route::post('/user', 'App\Http\Controllers\UserController@update');

Route::get('/admin', 'App\Http\Controllers\admin\IndexController@index');
Route::post('/admin/drops/create', 'App\Http\Controllers\admin\DropsController@create');
Route::get('/admin/drops/create', 'App\Http\Controllers\admin\DropsController@index');
Route::get('/admin/drops/list', 'App\Http\Controllers\admin\DropsController@list');
Route::get('/admin/drops/{id}/delete', 'App\Http\Controllers\admin\DropsController@delete');
Route::get('/admin/drops/{id}/edit', 'App\Http\Controllers\admin\DropsController@edit');
Route::post('/admin/drops/{id}/edit', 'App\Http\Controllers\admin\DropsController@editDrop');
Route::post('/admin/actus/create', 'App\Http\Controllers\admin\ActusController@create');
Route::get('/admin/actus/create', 'App\Http\Controllers\admin\ActusController@index');
Route::get('/admin/actus/list', 'App\Http\Controllers\admin\ActusController@list');
Route::get('/admin/actus/{id}/delete', 'App\Http\Controllers\admin\ActusController@delete');
Route::get('/admin/actus/{id}/edit', 'App\Http\Controllers\admin\ActusController@edit');
Route::post('/admin/actus/{id}/edit', 'App\Http\Controllers\admin\ActusController@editActu');

Route::get('/admin/users/list', 'App\Http\Controllers\admin\UsersController@list');
Route::post('/admin/users/create', 'App\Http\Controllers\admin\UsersController@create');
Route::get('/admin/users/create', 'App\Http\Controllers\admin\UsersController@index');
Route::get('/admin/users/{id}/delete', 'App\Http\Controllers\admin\UsersController@delete');
Route::get('/admin/users/{id}/edit', 'App\Http\Controllers\admin\UsersController@edit');
Route::post('/admin/users/{id}/edit', 'App\Http\Controllers\admin\UsersController@editUser');

Route::post('/subs', 'App\Http\Controllers\SubsController@store');

Route::view('/payment/error', 'payments.error')->name('payments.error');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
