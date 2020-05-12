<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'api', 'namespace' => 'Api', 'as' => 'api.'], function () {
	Route::group(['namespace' => 'Auth'], function() {
	    Route::post('authenticate', 'LoginController@authenticate')->name('authenticate');
	    Route::post('register', 'RegisterController@create')->name('register');
	    Route::get('logout', 'LoginController@logout')->name('logout');
	    Route::get('check-auth', 'LoginController@checkAuth')->name('check_auth');
		Route::get('home', 'LoginController@home')->name('home');
	});
	Route::group(['middleware' => 'auth:api', 'namespace' => 'Admin'], function() {
		Route::group(['prefix' => 'admin'], function() {
			Route::get('notifies/create', 'NotifyController@create')->name('admin.notify.create');
			Route::get('notifies/list', 'NotifyController@list')->name('admin.notify.list');
			Route::post('notifies/store', 'NotifyController@store')->name('admin.notify.store');
		});
		Route::get('notifies/{id}', 'NotifyController@show')->where('id', '[0-9]+')->name('notify.show');
	});
});

