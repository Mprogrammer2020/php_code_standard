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
	Route::get('user/list', 'Api\UserController@Allusers');
	Route::get('user/view', 'Api\UserController@showProfile');
	Route::post('user/update', 'Api\UserController@profileUpdate');
	Route::post('user/change-password', 'Api\UserController@changePassword');
	Route::post('user/delete', 'Api\UserController@deleteUser');
	Route::get('user/logout', 'Api\UserController@logout');
});

Route::post('login', 'Api\UserController@login');
Route::post('register', 'Api\UserController@register');
Route::get('reset-password-email', 'Api\UserController@resetPasswordMail');
Route::post('verify-password', 'Api\UserController@verifyPasswordtoken');
    