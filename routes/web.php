<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

// Rutas de contacto
Route::get('contact','MessageContactController@index')->name('contact.index')->middleware('throttle:60,1');
Route::get('contact/create','MessageContactController@create')->name('contact.create')->middleware('throttle:60,1');
Route::post('contact','MessageContactController@store')->name('contact.store')->middleware('throttle:7,1');

// Rutas de usuario
Route::resource('user', 'UserController')->middleware('throttle:10,1');
Route::get('user/delete/{delete}','UserController@delete')->name('user.delete')->middleware('throttle:10,1');
