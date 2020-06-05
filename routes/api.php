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
		Route::group(['prefix' => 'admin/notifies', 'name' => 'admin.notify'], function() {
			Route::get('create', 'NotifyController@create')->name('create');
			Route::get('list', 'NotifyController@list')->name('list');
			Route::post('store', 'NotifyController@store')->name('store');
			Route::get('users/list', 'NotifyController@userList')->name('users.list');
		});
		Route::get('notifies/{id}', 'NotifyController@show')->where('id', '[0-9]+')->name('notify.show');
	});
});

Route::get('search', function() {
    $query = 'title'; // <-- Change the query for testing.

    $posts = App\Models\PostElasticsearch::search($query)->rule(App\Modules\Elasticsearch\Rules\SearchTitleRule::class)->explain();

    return $posts;
});