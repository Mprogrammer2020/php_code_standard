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

	Route::post('user/list', 'Api\UserController@Allusers')->name('allusers');
	Route::post('user/update', 'Api\UserController@MyProfile')->name('profile');
	Route::post('user/view', 'Api\UserController@showProfile')->name('viewUser');
	Route::post('user/delete', 'Api\UserController@deleteUser')->name('delete');
	Route::post('user/update', 'Api\UserController@profileUpdate')->name('update');
	Route::post('user/logout', 'Api\UserController@logout')->name('logout');
	Route::post('user/change-password', 'Api\UserController@changePassword')->name('changepassword');
});

Route::post('login', 'Api\UserController@login')->name('login');
Route::post('register', 'Api\UserController@register')->name('register');
Route::post('reset-password-email', 'Api\UserController@resetPasswordMail');
Route::post('verify-password', 'Api\UserController@verifyPasswordtoken');
    