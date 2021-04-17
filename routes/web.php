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

Route::get('/', 'App\Http\Controllers\ContactController@index')->name('index');

Route::resource('/contacts', 'App\Http\Controllers\ContactController');

Route::any('/contacts/search', '\App\Http\Controllers\ContactController@search');

