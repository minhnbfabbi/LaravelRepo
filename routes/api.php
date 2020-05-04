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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'api', 'namespace' => 'Api\Auth', 'as' => 'api.'], function () {
    // Route::resource('Login', 'LoginController', ['except' => []]);
    Route::post('authenticate', 'LoginController@authenticate')->name('authenticate');
    Route::post('register', 'RegisterController@create')->name('register');
});