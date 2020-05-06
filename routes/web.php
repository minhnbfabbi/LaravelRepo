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

Route::get('/{path}', function () {
    return view('index');
})->where('path', '(.*)');

Route::get('user/{name?}', function($name = 'Minh') {
	return $name;
});

// Route::get('/', 'HomeController@index')->name('index');
// Route::get('/login', 'Auth\LoginController@index')->name('Login');
