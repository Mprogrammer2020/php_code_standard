<?php

use Illuminate\Http\Request;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::group(['middleware' => 'auth:api'], function(){

	Route::post('allusers', 'Api\UserController@Allusers')->name('allusers');
	Route::post('profile', 'Api\UserController@MyProfile')->name('profile');
	Route::post('viewUser', 'Api\UserController@viewUser')->name('viewUser');
	Route::post('delete', 'Api\UserController@deleteUser')->name('delete');
	Route::post('update', 'Api\UserController@profileUpdate')->name('update');
	Route::post('logout', 'Api\UserController@logout')->name('logout');
	Route::post('changepassword', 'Api\UserController@changePassword')->name('changepassword');
});

Route::post('login', 'Api\UserController@login')->name('login');
Route::post('register', 'Api\UserController@register')->name('register');
Route::post('reset-password-email', 'Api\UserController@createToken');
Route::post('verify-password', 'Api\UserController@verifytoken');
    